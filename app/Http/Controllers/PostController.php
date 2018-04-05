<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PostItemsRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CustomPostTypeRepository;
use App\Repositories\CustomPostTypeItemsRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Overtrue\Pinyin\Pinyin;
use App\Models\Post;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;
    private $categoryRepository;
    private $customPostTypeRepository;
    private $customPostTypeItemsRepository;
    private $postItemsRepository;
    public function __construct(PostRepository $postRepo,PostItemsRepository $postItemsRepo, CategoryRepository $categoryRepo,CustomPostTypeRepository $customPostTypeRepo,CustomPostTypeItemsRepository $customPostTypeItemsRepo)
    {
        $this->postRepository = $postRepo;
        $this->postItemsRepository=$postItemsRepo;
        $this->categoryRepository = $categoryRepo;
        $this->customPostTypeRepository=$customPostTypeRepo;
        $this->customPostTypeItemsRepository=$customPostTypeItemsRepo;
    }


    public function getCustomType(){
        $customPostTypes = $this->customPostTypeRepository->all();
        return ['status'=>true,'msg'=>$customPostTypes];
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$this->postRepository->pushCriteria(new RequestCriteria($request));
        //$posts = $this->postRepository->all();
        $input=$request->all();

        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        if (!array_key_exists('cat', $input) || (array_key_exists('cat', $input) && $input['cat'] == '全部')) {
            $posts = Post::orderBy('updated_at', 'desc');
        }else{
            $cat = $this->categoryRepository->getCacheCategory($input['cat']);
            $posts = $cat->posts()->orderBy('updated_at', 'desc');
        }
        
        if (array_key_exists('name', $input)) {
            $posts=  $posts->where('name', 'like', '%'.$input['name'].'%');
        }
        if (array_key_exists('status', $input) && $input['status'] != '全部') {
            $posts=  $posts->where('status', $input['status']);
        }

        $posts = $posts->paginate(15);

        $categories = $this->categoryRepository->getCascadeCategories();

        $baseurl = $request->root();

        return view('admin.posts.index')
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('baseurl', $baseurl)->withInput($input);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $input=$request->all();
        $all=$this->customPostTypeRepository->getAll();

       // return $attach;
        $categories = $this->categoryRepository->getCascadeCategories();
        return view('admin.posts.create')
            ->with('categories', $categories)
            ->with('all',$all)
            ->withInput($input);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();

        if (!array_key_exists('slug', $input) || $input['slug'] == '') {
            $pinyin = new Pinyin();
            $input['slug'] = $pinyin->permalink($input['name']);
        }

        //清除空字符串
        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        //摘要
        if (!array_key_exists('brief', $input) || $input['brief'] == '') {
            $input['brief'] = $this->des($input['content'], 120);
        }  

        if (array_key_exists('content', $input)) {
            $input['content'] = str_replace("../../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
            $input['content'] = str_replace("../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
        }

        $post = $this->postRepository->create($input);

        if($input['type']!='post' && !empty($post)) {
            foreach ($input as $key => $v) {
                if (is_array($v) && $key != 'categories' && $input['type']==$this->customPostTypeItemsRepository->getOneSlugByName($key)) {
                    $this->postItemsRepository->create(['key'=>$key,'name'=>$this->customPostTypeItemsRepository->getOneByName($key)->des,'value'=>$v[0],'post_id'=>$post->id]);
                }
            }
        }


        if ( array_key_exists('categories', $input) ) {
            $post->cats()->sync($input['categories']);
        }

        Flash::success('保存成功');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('信息不存在');

            return redirect(route('posts.index'));
        }

        return view('admin.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $input=$request->all();
        $post = $this->postRepository->findWithoutFail($id);
        if (empty($post)) {
            Flash::error('信息不存在');

            return redirect(route('posts.index'));
        }

        $attach='';
        $all=$this->customPostTypeRepository->getAll();
        if (array_key_exists('post_type', $input)) {

            $attach=$this->customPostTypeRepository->getNameBySlug($input['post_type']);
            $attach_items=$post->items()->get();


        }

        $selectedCategories = [];
        $tmparray = $post->cats()->get()->toArray();
        while (list($key, $val) = each($tmparray)) {
            array_push($selectedCategories, $val['id']);
        }

        $categories = $this->categoryRepository->getCascadeCategories();

        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('selectedCategories', $selectedCategories)
            ->with('all',$all)
            ->with('attach',$attach)
            ->with('attach_items',$attach_items)
            ->with('categories', $categories)
            ->withInput($input);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('信息不存在');

            return redirect(route('posts.index'));
        }

        $input = $request->all();

        if (!array_key_exists('slug', $input) || $input['slug'] == '') {
            $pinyin = new Pinyin();
            $input['slug'] = $pinyin->permalink($input['name']);
        }

        if ( !array_key_exists('status', $input) ) {
            $input['status'] = 0;
        }

        if (array_key_exists('content', $input)) {
            $input['content'] = str_replace("../../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
            $input['content'] = str_replace("../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
        }

        $post = $this->postRepository->update($input, $id);
        if($input['type']!='post' && !empty($post)) {
            foreach ($input as $key => $v) {
                if (is_array($v) && $key != 'categories') {
                    $this->postItemsRepository->updateByPostIdAndKey($id,$key,['key'=>$key,'name'=>$this->customPostTypeItemsRepository->getOneByName($key)->des,'value'=>$v[0]]);
                }
            }
        }

        if ( array_key_exists('categories', $input) ) {
            $post->cats()->sync($input['categories']);
        }else{
            $post->cats()->sync([]);
        }

        Flash::success('信息更新成功');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('信息不存在');

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        Flash::success('Post deleted successfully.');

        return redirect(route('posts.index'));
    }

    public function customGet(){
        return view('admin.post.custom.index');
    }

    private function des($str, $num){
        global $Briefing_Length; 
        mb_regex_encoding("UTF-8");     
        $Foremost = mb_substr($str, 0, $num); 
        $re = "<(\/?) 
    (P|DIV|H1|H2|H3|H4|H5|H6|ADDRESS|PRE|TABLE|TR|TD|TH|INPUT|SELECT|TEXTAREA|OBJECT|A|UL|OL|LI| 
    BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|SPAN)[^>]*(>?)"; 
        $Single = "/BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|BR/i";     

        $Stack = array(); $posStack = array(); 

        mb_ereg_search_init($Foremost, $re, 'i'); 

        while($pos = mb_ereg_search_pos()){ 
            $match = mb_ereg_search_getregs(); 

            if($match[1]==""){ 
                $Elem = $match[2]; 
                if(mb_eregi($Single, $Elem) && $match[3] !=""){ 
                    continue; 
                } 
                array_push($Stack, mb_strtoupper($Elem)); 
                array_push($posStack, $pos[0]);             
            }else{ 
                $StackTop = $Stack[count($Stack)-1]; 
                $End = mb_strtoupper($match[2]); 
                if(strcasecmp($StackTop,$End)==0){ 
                    array_pop($Stack); 
                    array_pop($posStack); 
                    if($match[3] ==""){ 
                        $Foremost = $Foremost.">"; 
                    } 
                } 
            } 
        } 

        $cutpos = array_shift($posStack) - 1;     
        $Foremost =  mb_substr($Foremost,0,$cutpos,"UTF-8"); 
        return strip_tags($Foremost); 

    }
}
