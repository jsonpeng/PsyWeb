<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Repositories\LinkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LinkController extends AppBaseController
{
    /** @var  LinkRepository */
    private $linkRepository;

    public function __construct(LinkRepository $linkRepo)
    {
        $this->linkRepository = $linkRepo;
    }

    /**
     * Display a listing of the Link.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->linkRepository->pushCriteria(new RequestCriteria($request));
        $links = $this->linkRepository->all();

        return view('admin.links.index')
            ->with('links', $links);
    }

    /**
     * Show the form for creating a new Link.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created Link in storage.
     *
     * @param CreateLinkRequest $request
     *
     * @return Response
     */
    public function store(CreateLinkRequest $request)
    {
        $input = $request->all();

        if (array_key_exists('link', $input) && $input['link'] != '') {
            if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $input['link'])){
                $input['link'] = 'http://'.$input['link'];
            }
        }

        $link = $this->linkRepository->create($input);

        Flash::success('保存成功');

        return redirect(route('links.index'));
    }

    /**
     * Display the specified Link.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $link = $this->linkRepository->findWithoutFail($id);

        if (empty($link)) {
            Flash::error('信息不存在');

            return redirect(route('links.index'));
        }

        return view('admin.links.show')->with('link', $link);
    }

    /**
     * Show the form for editing the specified Link.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $link = $this->linkRepository->findWithoutFail($id);

        if (empty($link)) {
            Flash::error('信息不存在');

            return redirect(route('links.index'));
        }

        return view('admin.links.edit')->with('link', $link);
    }

    /**
     * Update the specified Link in storage.
     *
     * @param  int              $id
     * @param UpdateLinkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkRequest $request)
    {
        $link = $this->linkRepository->findWithoutFail($id);

        if (empty($link)) {
            Flash::error('信息不存在');

            return redirect(route('links.index'));
        }

        $input = $request->all();
        if (array_key_exists('link', $input) && $input['link'] != '') {
            if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $input['link'])){
                $input['link'] = 'http://'.$input['link'];
            }
        }

        $link = $this->linkRepository->update($input, $id);

        Flash::success('更新成功');

        return redirect(route('links.index'));
    }

    /**
     * Remove the specified Link from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $link = $this->linkRepository->findWithoutFail($id);

        if (empty($link)) {
            Flash::error('信息不存在');

            return redirect(route('links.index'));
        }

        $this->linkRepository->delete($id);

        Flash::success('删除成功');

        return redirect(route('links.index'));
    }
}
