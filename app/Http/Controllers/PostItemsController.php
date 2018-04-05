<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostItemsRequest;
use App\Http\Requests\UpdatePostItemsRequest;
use App\Repositories\PostItemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PostItemsController extends AppBaseController
{
    /** @var  PostItemsRepository */
    private $postItemsRepository;

    public function __construct(PostItemsRepository $postItemsRepo)
    {
        $this->postItemsRepository = $postItemsRepo;
    }

    /**
     * Display a listing of the PostItems.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postItemsRepository->pushCriteria(new RequestCriteria($request));
        $postItems = $this->postItemsRepository->all();

        return view('post_items.index')
            ->with('postItems', $postItems);
    }

    /**
     * Show the form for creating a new PostItems.
     *
     * @return Response
     */
    public function create()
    {
        return view('post_items.create');
    }

    /**
     * Store a newly created PostItems in storage.
     *
     * @param CreatePostItemsRequest $request
     *
     * @return Response
     */
    public function store(CreatePostItemsRequest $request)
    {
        $input = $request->all();

        $postItems = $this->postItemsRepository->create($input);

        Flash::success('Post Items saved successfully.');

        return redirect(route('postItems.index'));
    }

    /**
     * Display the specified PostItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postItems = $this->postItemsRepository->findWithoutFail($id);

        if (empty($postItems)) {
            Flash::error('Post Items not found');

            return redirect(route('postItems.index'));
        }

        return view('post_items.show')->with('postItems', $postItems);
    }

    /**
     * Show the form for editing the specified PostItems.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postItems = $this->postItemsRepository->findWithoutFail($id);

        if (empty($postItems)) {
            Flash::error('Post Items not found');

            return redirect(route('postItems.index'));
        }

        return view('post_items.edit')->with('postItems', $postItems);
    }

    /**
     * Update the specified PostItems in storage.
     *
     * @param  int              $id
     * @param UpdatePostItemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostItemsRequest $request)
    {
        $postItems = $this->postItemsRepository->findWithoutFail($id);

        if (empty($postItems)) {
            Flash::error('Post Items not found');

            return redirect(route('postItems.index'));
        }

        $postItems = $this->postItemsRepository->update($request->all(), $id);

        Flash::success('Post Items updated successfully.');

        return redirect(route('postItems.index'));
    }

    /**
     * Remove the specified PostItems from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postItems = $this->postItemsRepository->findWithoutFail($id);

        if (empty($postItems)) {
            Flash::error('Post Items not found');

            return redirect(route('postItems.index'));
        }

        $this->postItemsRepository->delete($id);

        Flash::success('Post Items deleted successfully.');

        return redirect(route('postItems.index'));
    }
}
