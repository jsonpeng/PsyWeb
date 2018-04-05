<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageItemsRequest;
use App\Http\Requests\UpdatePageItemsRequest;
use App\Repositories\PageItemsRepository;
use App\Repositories\CustomPageTypeRepository;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PageItemsController extends AppBaseController
{
    /** @var  PageItemsRepository */
    private $pageItemsRepository;
    private $pageRepository;
    private $onePageRepository;

    public function __construct(PageItemsRepository $pageItemsRepo,CustomPageTypeRepository $pageRepo,PageRepository $onePageRepo)
    {
        $this->pageItemsRepository = $pageItemsRepo;
        $this->pageRepository=$pageRepo;
        $this->onePageRepository=$onePageRepo;
    }

    /**
     * Display a listing of the PageItems.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$page_id)
    {
        $this->pageItemsRepository->pushCriteria(new RequestCriteria($request));
        $page=$this->pageRepository->findWithoutFail($page_id);
        $pageItems = $this->pageItemsRepository->getItemsFoParentId($page_id);

        return view('admin.page_items.index')
            ->with('page',$page)
            ->with('pageItems', $pageItems);
    }

    /**
     * Show the form for creating a new PageItems.
     *
     * @return Response
     */
    public function create($page_id)
    {
        $page=$this->pageRepository->findWithoutFail($page_id);
        if (empty($page)) {
            return redirect(route('customPageTypes.index'));
        }
        return view('admin.page_items.create')
                ->with('page',$page);
    }

    /**
     * Store a newly created PageItems in storage.
     *
     * @param CreatePageItemsRequest $request
     *
     * @return Response
     */
    public function store(CreatePageItemsRequest $request,$page_id)
    {
        $input = $request->all();
        $input['custom_page_types_id']=$page_id;
        $page=$this->pageRepository->findWithoutFail($page_id);
        $input['page_id']=$this->onePageRepository->getCachePageBySlug($page->slug)->id;
        $pageItems = $this->pageItemsRepository->create($input);

        Flash::success('保存成功.');

        return redirect(route('pageItems.index',$page_id));
    }

    /**
     * Display the specified PageItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pageItems = $this->pageItemsRepository->findWithoutFail($id);

        if (empty($pageItems)) {
            Flash::error('Page Items not found');

            return redirect(route('pageItems.index'));
        }

        return view('admin.page_items.show')->with('pageItems', $pageItems);
    }

    /**
     * Show the form for editing the specified PageItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($page_id,$id)
    {
        $page=$this->pageRepository->findWithoutFail($page_id);
        $pageItems = $this->pageItemsRepository->findWithoutFail($id);
        if (empty($pageItems)) {
            Flash::error('Page Items not found');

            return redirect(route('pageItems.index'));
        }

        return view('admin.page_items.edit')
                ->with('page',$page)
                ->with('pageItems', $pageItems);
    }

    /**
     * Update the specified PageItems in storage.
     *
     * @param  int              $id
     * @param UpdatePageItemsRequest $request
     *
     * @return Response
     */
    public function update($page_id,$id, UpdatePageItemsRequest $request)
    {

        $pageItems = $this->pageItemsRepository->findWithoutFail($id);

        if (empty($pageItems)) {
            Flash::error('Page Items not found');

            return redirect(route('pageItems.index'));
        }

        $pageItems = $this->pageItemsRepository->update($request->all(), $id);

        Flash::success('更新成功.');

        return redirect(route('pageItems.index',$page_id));
    }

    /**
     * Remove the specified PageItems from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($page_id,$id)
    {
        $pageItems = $this->pageItemsRepository->findWithoutFail($id);

        if (empty($pageItems)) {
            Flash::error('Page Items not found');

            return redirect(route('pageItems.index'));
        }

        $this->pageItemsRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('pageItems.index',$page_id));
    }
}
