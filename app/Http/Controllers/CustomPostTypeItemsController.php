<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomPostTypeItemsRequest;
use App\Http\Requests\UpdateCustomPostTypeItemsRequest;
use App\Repositories\CustomPostTypeItemsRepository;
use App\Repositories\CustomPostTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomPostTypeItemsController extends AppBaseController
{
    /** @var  CustomPostTypeItemsRepository */
    private $customPostTypeItemsRepository;
    private $customPostTypeRepository;

    public function __construct(CustomPostTypeItemsRepository $customPostTypeItemsRepo,CustomPostTypeRepository $customPostTypeRepo)
    {
        $this->customPostTypeRepository=$customPostTypeRepo;
        $this->customPostTypeItemsRepository = $customPostTypeItemsRepo;
    }

    /**
     * Display a listing of the CustomPostTypeItems.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$customposttype_id)
    {
        $this->customPostTypeItemsRepository->pushCriteria(new RequestCriteria($request));
        $customPostType=$this->customPostTypeRepository->findWithoutFail($customposttype_id);
        $customPostTypeItems = $this->customPostTypeItemsRepository->getItemsFoParentId($customposttype_id);

        return view('admin.custom_post_type_items.index')
            ->with('customPostType',$customPostType)
            ->with('customPostTypeItems', $customPostTypeItems);
    }

    /**
     * Show the form for creating a new CustomPostTypeItems.
     *
     * @return Response
     */
    public function create($customposttype_id)
    {
        $customPostType=$this->customPostTypeRepository->findWithoutFail($customposttype_id);
        if (empty($customPostType)) {
            return redirect(route('customPostType.index'));
        }
        return view('admin.custom_post_type_items.create')
            ->with('customPostType',$customPostType);
    }

    /**
     * Store a newly created CustomPostTypeItems in storage.
     *
     * @param CreateCustomPostTypeItemsRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomPostTypeItemsRequest $request,$customposttype_id)
    {
        $input = $request->all();

        $customPostTypeItems = $this->customPostTypeItemsRepository->create($input);

        Flash::success('字段添加成功.');

        return redirect(route('customPostTypeItems.index',$customposttype_id));
    }

    /**
     * Display the specified CustomPostTypeItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($customposttype_id,$id)
    {
        $customPostTypeItems = $this->customPostTypeItemsRepository->findWithoutFail($id);

        if (empty($customPostTypeItems)) {
            Flash::error('Custom Post Type Items not found');

            return redirect(route('customPostTypeItems.index'));
        }

        return view('admin.custom_post_type_items.show')->with('customPostTypeItems', $customPostTypeItems);
    }

    /**
     * Show the form for editing the specified CustomPostTypeItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($customposttype_id,$id)
    {
        $customPostType=$this->customPostTypeRepository->findWithoutFail($customposttype_id);
        if (empty($customPostType)) {
            return redirect(route('customPostType.index'));
        }
        $customPostTypeItems = $this->customPostTypeItemsRepository->findWithoutFail($id);

        if (empty($customPostTypeItems)) {
            Flash::error('Custom Post Type Items not found');

            return redirect(route('customPostTypeItems.index',$customposttype_id));
        }

        return view('admin.custom_post_type_items.edit')
                ->with('customPostType',$customPostType)
                ->with('customPostTypeItems', $customPostTypeItems);
    }

    /**
     * Update the specified CustomPostTypeItems in storage.
     *
     * @param  int              $id
     * @param UpdateCustomPostTypeItemsRequest $request
     *
     * @return Response
     */
    public function update($customposttype_id,$id,UpdateCustomPostTypeItemsRequest $request)
    {


        $customPostTypeItems = $this->customPostTypeItemsRepository->update($request->all(), $id);

        Flash::success('字段保存成功.');

        return redirect(route('customPostTypeItems.index',$customposttype_id));
    }

    /**
     * Remove the specified CustomPostTypeItems from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($customposttype_id,$id)
    {
        $customPostTypeItems = $this->customPostTypeItemsRepository->findWithoutFail($id);

        if (empty($customPostTypeItems)) {
            Flash::error('Custom Post Type Items not found');

            return redirect(route('customPostTypeItems.index'));
        }

        $this->customPostTypeItemsRepository->delete($id);

        Flash::success('字段删除成功.');

        return redirect(route('customPostTypeItems.index',$customposttype_id));
    }
}
