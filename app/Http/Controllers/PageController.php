<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Repositories\PageRepository;
use App\Repositories\PageItemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Overtrue\Pinyin\Pinyin;
use App\Models\Page;

class PageController extends AppBaseController
{
    /** @var  PageRepository */
    private $pageRepository;
    private $pageItemsRepository;
    public function __construct(PageRepository $pageRepo,PageItemsRepository $pageItemsRepo)
    {
        $this->pageRepository = $pageRepo;
        $this->pageItemsRepository=$pageItemsRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*
        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $pages = $this->pageRepository->all();
        */
        $input=$request->all();
        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        $pages = Page::orderBy('updated_at', 'desc');

        if (array_key_exists('name', $input)) {
            $pages=  $pages->where('name', 'like', '%'.$input['name'].'%');
        }
        if (array_key_exists('status', $input) && $input['status'] != '全部') {
            $pages=  $pages->where('status', $input['status']);
        }

        $pages = $pages->paginate(15);

        $baseurl = $request->root();

        return view('admin.pages.index')
            ->with('pages', $pages)
            ->with('baseurl', $baseurl)
            ->withInput($input);
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        //清除空字符串
        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        if (!array_key_exists('slug', $input) || $input['slug'] == '') {
            $pinyin = new Pinyin();
            $input['slug'] = $pinyin->permalink($input['name']);
        }

        if (!array_key_exists('status', $input)) {
            $input['status'] = 0;
        }

        if (array_key_exists('content', $input)) {
            $input['content'] = str_replace("../../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
            $input['content'] = str_replace("../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
        }

        $page = $this->pageRepository->create($input);



        Flash::success('页面保存成功');

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('页面不存在');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);
      //  return get_page_custom_value_by_name($page,'联系方式');
//        return $page->pageItems()->where('name','地址')->first()->value;
        if (empty($page)) {
            Flash::error('页面不存在');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int              $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('页面不存在');

            return redirect(route('pages.index'));
        }

        $input = $request->all();
        if (!array_key_exists('slug', $input) || $input['slug'] == '') {
            $pinyin = new Pinyin();
            $input['slug'] = $pinyin->permalink($input['name']);
        }
       if (!array_key_exists('status', $input)) {
            $input['status'] = 0;
        }

        if (array_key_exists('content', $input)) {
            $input['content'] = str_replace("../../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
            $input['content'] = str_replace("../../", $request->getSchemeAndHttpHost().'/' ,$input['content']);
        }

        $page = $this->pageRepository->update($input, $id);
        $items=$page->pageItems()->get();
        if(!empty($items)){
            foreach ($input as $key => $v) {
                if (is_array($v)) {
                    $this->pageItemsRepository->updateValueByKey($key,$v[0]);
                }
            }
        }
        Flash::success('页面更新成功');

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('页面不存在');

            return redirect(route('pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success('Page deleted successfully.');

        return redirect(route('pages.index'));
    }
}
