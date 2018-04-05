<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoorperatorRequest;
use App\Http\Requests\UpdateCoorperatorRequest;
use App\Repositories\CoorperatorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CoorperatorController extends AppBaseController
{
    /** @var  CoorperatorRepository */
    private $coorperatorRepository;

    public function __construct(CoorperatorRepository $coorperatorRepo)
    {
        $this->coorperatorRepository = $coorperatorRepo;
    }

    /**
     * Display a listing of the Coorperator.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->coorperatorRepository->pushCriteria(new RequestCriteria($request));
        $coorperators = $this->coorperatorRepository->all();

        return view('admin.coorperators.index')
            ->with('coorperators', $coorperators);
    }

    /**
     * Show the form for creating a new Coorperator.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.coorperators.create');
    }

    /**
     * Store a newly created Coorperator in storage.
     *
     * @param CreateCoorperatorRequest $request
     *
     * @return Response
     */
    public function store(CreateCoorperatorRequest $request)
    {
        $input = $request->all();

        $coorperator = $this->coorperatorRepository->create($input);

        Flash::success('保存成功');

        return redirect(route('coorperators.index'));
    }

    /**
     * Display the specified Coorperator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $coorperator = $this->coorperatorRepository->findWithoutFail($id);

        if (empty($coorperator)) {
            Flash::error('信息不存在');

            return redirect(route('coorperators.index'));
        }

        return view('admin.coorperators.show')->with('coorperator', $coorperator);
    }

    /**
     * Show the form for editing the specified Coorperator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $coorperator = $this->coorperatorRepository->findWithoutFail($id);

        if (empty($coorperator)) {
            Flash::error('信息不存在');

            return redirect(route('coorperators.index'));
        }

        return view('admin.coorperators.edit')->with('coorperator', $coorperator);
    }

    /**
     * Update the specified Coorperator in storage.
     *
     * @param  int              $id
     * @param UpdateCoorperatorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoorperatorRequest $request)
    {
        $coorperator = $this->coorperatorRepository->findWithoutFail($id);

        if (empty($coorperator)) {
            Flash::error('信息不存在');

            return redirect(route('coorperators.index'));
        }

        $coorperator = $this->coorperatorRepository->update($request->all(), $id);

        Flash::success('信息更新成功');

        return redirect(route('coorperators.index'));
    }

    /**
     * Remove the specified Coorperator from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $coorperator = $this->coorperatorRepository->findWithoutFail($id);

        if (empty($coorperator)) {
            Flash::error('信息不存在');

            return redirect(route('coorperators.index'));
        }

        $this->coorperatorRepository->delete($id);

        Flash::success('信息删除成功');

        return redirect(route('coorperators.index'));
    }
}
