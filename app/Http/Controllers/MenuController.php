<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Repositories\MenuRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Overtrue\Pinyin\Pinyin;

class MenuController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;
    private $categoryRepository;
    private $pageRepository;

    public function __construct(MenuRepository $menuRepo, CategoryRepository $categoryRepo, PageRepository $pageRepo)
    {
        $this->menuRepository = $menuRepo;
        $this->categoryRepository = $categoryRepo;
        $this->pageRepository = $pageRepo;
    }
    
    /**
     * Display a listing of the Menu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuRepository->pushCriteria(new RequestCriteria($request));
        $menus = $this->menuRepository->all();

        return view('admin.menus.index')
            ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new Menu.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created Menu in storage.
     *
     * @param CreateMenuRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRequest $request)
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
        $menu = $this->menuRepository->create($input);

        Flash::success('菜单保存成功');

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);
        $cats = $this->categoryRepository->all();
        $pages = $this->pageRepository->all();
      
        if (empty($menu)) {
            Flash::error('菜单不存在');

            return redirect(route('menus.index'));
        }

        return view('admin.menus.show')->with('menu', $menu)->with('cats', $cats)->with('pages', $pages);
    }

    /**
     * Show the form for editing the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('菜单不存在');

            return redirect(route('menus.index'));
        }

        return view('admin.menus.edit')->with('menu', $menu);
    }

    /**
     * Update the specified Menu in storage.
     *
     * @param  int              $id
     * @param UpdateMenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRequest $request)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('菜单不存在');

            return redirect(route('menus.index'));
        }
        $input = $request->all();
        //清除空字符串
        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        if (!array_key_exists('slug', $input) || $input['slug'] == '') {
            $pinyin = new Pinyin();
            $input['slug'] = $pinyin->permalink($input['name']);
        }

        $menu = $this->menuRepository->update($input, $id);

        Flash::success('菜单更新成功');

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified Menu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('菜单不存在');

            return redirect(route('menus.index'));
        }

        $this->menuRepository->delete($id);

        Flash::success('菜单删除成功');

        return redirect(route('menus.index'));
    }
}
