<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBannerItemRequest;
use App\Http\Requests\UpdateBannerItemRequest;
use App\Repositories\BannerItemRepository;
use App\Repositories\BannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BannerItemController extends AppBaseController
{
    /** @var  BannerItemRepository */
    private $bannerItemRepository;
    private $bannerRepository;

    public function __construct(BannerItemRepository $bannerItemRepo, BannerRepository $bannerRepo)
    {
        $this->bannerItemRepository = $bannerItemRepo;
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the BannerItem.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $banner_id)
    {
        $banner = $this->bannerRepository->findWithoutFail($banner_id);
        if (empty($banner)) {
            return redirect(route('banners.index'));
        }

        $bannerItems = $this->bannerItemRepository->getBannerItemsFoParent($banner_id);

        return view('admin.banner_items.index')
            ->with('bannerItems', $bannerItems)
            ->with('banner_id', $banner_id)
            ->with('banner', $banner);
    }

    /**
     * Show the form for creating a new BannerItem.
     *
     * @return Response
     */
    public function create($banner_id)
    {
        $banner = $this->bannerRepository->findWithoutFail($banner_id);
        if (empty($banner)) {
            return redirect(route('banners.index'));
        }
        return view('admin.banner_items.create')->with('banner_id', $banner_id)->with('banner', $banner);
    }

    /**
     * Store a newly created BannerItem in storage.
     *
     * @param CreateBannerItemRequest $request
     *
     * @return Response
     */
    public function store(Request $request, $banner_id)
    {

        $input = $request->all();
        if (array_key_exists('link', $input) && $input['link'] != '') {
            if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $input['link'])){
                $input['link'] = 'http://'.$input['link'];
            }
        }

        $bannerItem = $this->bannerItemRepository->create($input);

        Flash::success('保存成功');

        return redirect(route('bannerItems.index', $banner_id));
    }

    /**
     * Show the form for editing the specified BannerItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($banner_id, $id)
    {
        $banner = $this->bannerRepository->findWithoutFail($banner_id);
        if (empty($banner)) {
            return redirect(route('banners.index'));
        }

        $bannerItem = $this->bannerItemRepository->findWithoutFail($id);

        if (empty($bannerItem)) {
            Flash::error('Banner不存在');

            return redirect(route('bannerItems.index', $banner_id));
        }

        return view('admin.banner_items.edit')->with('bannerItem', $bannerItem)->with('banner_id', $banner_id)->with('banner', $banner);
    }

    /**
     * Update the specified BannerItem in storage.
     *
     * @param  int              $id
     * @param UpdateBannerItemRequest $request
     *
     * @return Response
     */
    public function update($banner_id, $id, Request $request)
    {

        $bannerItem = $this->bannerItemRepository->findWithoutFail($id);

        if (empty($bannerItem)) {
            Flash::error('Banner不存在');

            return redirect(route('bannerItems.index', $banner_id));
        }

        $input = $request->all();
        if (array_key_exists('link', $input) && $input['link'] != '') {
            if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $input['link'])){
                $input['link'] = 'http://'.$input['link'];
            }
        }

        $bannerItem = $this->bannerItemRepository->update($input, $id);

        Flash::success('更新成功');

        return redirect(route('bannerItems.index', $banner_id));
    }

    /**
     * Remove the specified BannerItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($banner_id, $id)
    {
        $bannerItem = $this->bannerItemRepository->findWithoutFail($id);

        if (empty($bannerItem)) {
            Flash::error('Banner不存在');

            return redirect(route('bannerItems.index', $banner_id));
        }

        $this->bannerItemRepository->delete($id);

        Flash::success('删除成功');

        return redirect(route('bannerItems.index', $banner_id));
    }
}
