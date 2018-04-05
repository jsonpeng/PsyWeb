<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomPageTypeRequest;
use App\Http\Requests\UpdateCustomPageTypeRequest;
use App\Repositories\CustomPageTypeRepository;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomPageTypeController extends AppBaseController
{
    /** @var  CustomPageTypeRepository */
    private $customPageTypeRepository;
    private $pageRepository;

    public function __construct(CustomPageTypeRepository $customPageTypeRepo,PageRepository $pageRepo)
    {
        $this->customPageTypeRepository = $customPageTypeRepo;
        $this->pageRepository=$pageRepo;
    }

    /**
     * Display a listing of the CustomPageType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->customPageTypeRepository->pushCriteria(new RequestCriteria($request));
        $customPageTypes = $this->customPageTypeRepository->all();

        return view('admin.custom_page_types.index')
            ->with('customPageTypes', $customPageTypes);
    }

    /**
     * Show the form for creating a new CustomPageType.
     *
     * @return Response
     */
    public function create()
    {
        $all=$this->pageRepository->all();
        return view('admin.custom_page_types.create')
                ->with('all',$all);
    }

    /**
     * Store a newly created CustomPageType in storage.
     *
     * @param CreateCustomPageTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomPageTypeRequest $request)
    {
        $input = $request->all();
        $input['name']=$this->pageRepository->getCachePageBySlug($input['slug'])->name;
        $customPageType = $this->customPageTypeRepository->create($input);

        Flash::success('添加成功.');

        return redirect(route('customPageTypes.index'));
    }

    /**
     * Display the specified CustomPageType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customPageType = $this->customPageTypeRepository->findWithoutFail($id);

        if (empty($customPageType)) {
            Flash::error('Custom Page Type not found');

            return redirect(route('customPageTypes.index'));
        }

        return view('admin.custom_page_types.show')->with('customPageType', $customPageType);
    }

    /**
     * Show the form for editing the specified CustomPageType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customPageType = $this->customPageTypeRepository->findWithoutFail($id);
        $all=$this->pageRepository->all();
        if (empty($customPageType)) {
            Flash::error('Custom Page Type not found');

            return redirect(route('customPageTypes.index'));
        }

        return view('admin.custom_page_types.edit')
                ->with('customPageType', $customPageType)
                ->with('all',$all);
    }

    /**
     * Update the specified CustomPageType in storage.
     *
     * @param  int              $id
     * @param UpdateCustomPageTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomPageTypeRequest $request)
    {
        $customPageType = $this->customPageTypeRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($customPageType)) {
            Flash::error('Custom Page Type not found');

            return redirect(route('customPageTypes.index'));
        }
        $input['name']=$this->pageRepository->getCachePageBySlug($input['slug'])->name;
        $customPageType = $this->customPageTypeRepository->update($input, $id);

        Flash::success('保存成功.');

        return redirect(route('customPageTypes.index'));
    }

    /**
     * Remove the specified CustomPageType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customPageType = $this->customPageTypeRepository->findWithoutFail($id);

        if (empty($customPageType)) {
            Flash::error('Custom Page Type not found');

            return redirect(route('customPageTypes.index'));
        }

        $this->customPageTypeRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('customPageTypes.index'));
    }
}
