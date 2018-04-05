<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomPostTypeRequest;
use App\Http\Requests\UpdateCustomPostTypeRequest;
use App\Repositories\CustomPostTypeRepository;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomPostTypeController extends AppBaseController
{
    /** @var  CustomPostTypeRepository */
    private $customPostTypeRepository;
    private $categoryRepository;
    public function __construct(CustomPostTypeRepository $customPostTypeRepo,CategoryRepository $categoryRepo)
    {
        $this->customPostTypeRepository = $customPostTypeRepo;
        $this->categoryRepository=$categoryRepo;
    }

    /**
     * Display a listing of the CustomPostType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->customPostTypeRepository->pushCriteria(new RequestCriteria($request));
        $customPostTypes = $this->customPostTypeRepository->all();

        return view('admin.custom_post_types.index')
            ->with('customPostTypes', $customPostTypes);
    }

    /**
     * Show the form for creating a new CustomPostType.
     *
     * @return Response
     */
    public function create()
    {
        $cats=$this->categoryRepository->getCascadeCategories();
        return view('admin.custom_post_types.create')
                ->with('cats',$cats);
    }

    /**
     * Store a newly created CustomPostType in storage.
     *
     * @param CreateCustomPostTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomPostTypeRequest $request)
    {
        $input = $request->all();
        $input['name']=$this->categoryRepository->getCacheCategoryBySlug($input['slug'])->name;
        $customPostType = $this->customPostTypeRepository->create($input);

        Flash::success('添加成功.');

        return redirect(route('customPostTypes.index'));
    }

    /**
     * Display the specified CustomPostType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customPostType = $this->customPostTypeRepository->findWithoutFail($id);

        if (empty($customPostType)) {
            Flash::error('Custom Post Type not found');

            return redirect(route('customPostTypes.index'));
        }

        return view('admin.custom_post_types.show')->with('customPostType', $customPostType);
    }

    /**
     * Show the form for editing the specified CustomPostType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customPostType = $this->customPostTypeRepository->findWithoutFail($id);
        $cats=$this->categoryRepository->getCascadeCategories();

        if (empty($customPostType)) {
            Flash::error('Custom Post Type not found');

            return redirect(route('customPostTypes.index'));
        }

        return view('admin.custom_post_types.edit')
                ->with('customPostType', $customPostType)
                ->with('cats',$cats);
    }

    /**
     * Update the specified CustomPostType in storage.
     *
     * @param  int              $id
     * @param UpdateCustomPostTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomPostTypeRequest $request)
    {
        $customPostType = $this->customPostTypeRepository->findWithoutFail($id);
        $input=$request->all();
        if (empty($customPostType)) {
            Flash::error('Custom Post Type not found');

            return redirect(route('customPostTypes.index'));
        }
        $input['name']=$this->categoryRepository->getCacheCategoryBySlug($input['slug'])->name;
        $customPostType = $this->customPostTypeRepository->update($input, $id);

        Flash::success('保存成功.');

        return redirect(route('customPostTypes.index'));
    }

    /**
     * Remove the specified CustomPostType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customPostType = $this->customPostTypeRepository->findWithoutFail($id);

        if (empty($customPostType)) {
            Flash::error('Custom Post Type not found');

            return redirect(route('customPostTypes.index'));
        }

        $this->customPostTypeRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('customPostTypes.index'));
    }
}
