<?php

namespace App\Admin\Services\Blog\Post;

use App\Admin\Services\Blog\Post\PostServiceInterface;
use  App\Admin\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostService implements PostServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(PostRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();
        $this->data['posted_at'] = now();
        $categoriesId = $this->data['categories_id'];
        $tagId = [];
        
        if(isset($this->data['tag_id'])){

            $tagId = $this->data['tag_id'];

            unset($this->data['tag_id']);
        }

        unset($this->data['categories_id']);

        DB::beginTransaction();
        try {
            $post = $this->repository->create($this->data);

            $this->repository->attachCategories($post, $categoriesId);

            $this->repository->attachTag($post, $tagId);

            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        $categoriesId = $this->data['categories_id'];
        $tagId = [];
        
        if(isset($this->data['tag_id'])){

            $tagId = $this->data['tag_id'];

            unset($this->data['tag_id']);
        }

        unset($this->data['categories_id']);

        DB::beginTransaction();
        try {
            $post = $this->repository->update($this->data['id'], $this->data);

            $this->repository->syncCategories($post, $categoriesId);

            $this->repository->syncTag($post, $tagId);

            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}