<?php

namespace App\Admin\Http\Controllers\Blog\Post;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Blog\Post\PostRequest;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Services\Blog\Post\PostServiceInterface;
use App\Admin\DataTables\Blog\Post\PostDataTable;
use App\Admin\Repositories\Tag\TagRepositoryInterface;
use App\Enums\DefaultStatus;

class PostController extends Controller
{
    protected $repoCat;

    protected $repoTag;

    public function __construct(
        PostRepositoryInterface $repository,
        CategoryRepositoryInterface $repoCat,
        TagRepositoryInterface $repoTag,
        PostServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->repoCat = $repoCat;
        $this->repoTag = $repoTag;

        $this->service = $service;

    }

    public function getView(){

        return [
            'index' => 'admin.blog.posts.index',
            'create' => 'admin.blog.posts.create',
            'edit' => 'admin.blog.posts.edit'
        ];
    }

    public function getRoute(){

        return [
            'index' => 'admin.blog.post.index',
            'create' => 'admin.blog.post.create',
            'edit' => 'admin.blog.post.edit',
            'delete' => 'admin.blog.post.delete'
        ];
    }
    public function index(PostDataTable $dataTable){

        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('blog'))->add(__('post'))
        ]);
    }

    public function create(){

        $categories = $this->repoCat->getFlatTree();

        return view($this->view['create'], [
            'categories' => $categories,
            'status' => DefaultStatus::asSelectArray(),
            'breadcrums' => $this->crums->add(__('blog'))->add(__('post'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(PostRequest $request){

        $instance = $this->service->store($request);

        if($instance){

            return to_route($this->route['edit'], $instance->id);
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){

        $categories = $this->repoCat->getFlatTree();

        $post = $this->repository->findOrFail($id, ['categories', 'tags']);

        return view(
            $this->view['edit'],
            [
                'categories' => $categories,
                'post' => $post,
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('blog'))->add(__('post'), route($this->route['index']))->add(__('edit'))
            ],
        );

    }

    public function update(PostRequest $request){

        $respone = $this->service->update($request);

        if($respone){
            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));
    }

    public function delete($id){

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
