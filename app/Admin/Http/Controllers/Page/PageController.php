<?php

namespace App\Admin\Http\Controllers\Page;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Page\PageRequest;
use App\Admin\Repositories\Page\PageRepositoryInterface;
use App\Admin\Services\Page\PageServiceInterface;
use App\Admin\DataTables\Page\PageDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{
    protected $repositoryCategory;
    public function __construct(
        PageRepositoryInterfz
        ace $repository,
        PageServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {

        return [
            'index' => 'admin.pages.index',
            'create' => 'admin.pages.create',
            'edit' => 'admin.pages.edit',
            'intro' => 'admin.pages.intro',
            'terms' => 'admin.pages.terms'
        ];
    }

    public function getRoute()
    {

        return [
            'index' => 'admin.page.index',
            'create' => 'admin.page.create',
            'edit' => 'admin.page.edit',
            'delete' => 'admin.page.delete',
            'intro' => 'admin.page.intro',
            'terms' => 'admin.page.terms'
        ];
    }
    public function index(PageDataTable $dataTable)
    {

        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('page'))
        ]);
    }

    public function create()
    {

        return view($this->view['create'], [
            'breadcrums' => $this->crums->add(__('page'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(PageRequest $request)
    {

        $instance = $this->service->store($request);

        if ($instance) {
            return to_route($this->route['edit'], $instance->id);
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id)
    {

        $page = $this->repository->findOrFail($id);

        return view(
            $this->view['edit'],
            [
                'page' => $page,
                'breadcrums' => $this->crums->add(__('page'), route($this->route['index']))->add(__('edit'))
            ],
        );
    }

    public function update(PageRequest $request)
    {

        $respone = $this->service->update($request);

        if ($respone) {

            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));
    }

    public function delete($id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }

    // Introduction
    public function intro($slug)
    {
        $page = $this->repository->findBy(['slug' => $slug]);
        if ($page) {
            return view($this->view['intro'], [
                'page' => $page,
                'breadcrums' => $this->crums->add(__('page'), route($this->route['index']))->add(__('introduction'))
            ]);
        } else {
            return redirect()->route($this->route['index'])->with('warning', __('errorPageIntroduction'));
        }
    }

    // Terms
    public function terms($slug)
    {
        $page = $this->repository->findBy(['slug' => $slug]);
        if ($page) {
            return view($this->view['terms'], [
                'page' => $page,
                'breadcrums' => $this->crums->add(__('page'), route($this->route['index']))->add(__('termsOfUse'))
            ]);
        } else {
            return redirect()->route($this->route['index'])->with('warning', __('errorPageTermsOfUse'));
        }
    }
}
