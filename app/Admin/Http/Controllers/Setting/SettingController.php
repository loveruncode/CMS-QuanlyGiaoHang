<?php

namespace App\Admin\Http\Controllers\Setting;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Setting\SettingRepositoryInterface;
use App\Enums\Setting\SettingGroup;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(
        SettingRepositoryInterface $repository
    ) {
        parent::__construct();
        $this->repository = $repository;
    }
    public function getView()
    {
        return [
            'general' => 'admin.settings.general',
            'job' => 'admin.settings.job',
            'bank' => 'admin.settings.bank',
            'social-network' => 'admin.settings.social-network',
            'intro' => 'admin.settings.intro',
        ];
    }
    public function general()
    {
        $settings = $this->repository->getByGroup([SettingGroup::General]);
        return view($this->view['general'], [
            'settings' => $settings,
            'breadcrums' => $this->crums->add(__('general'))->add(__('generateSetting'))
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');
        $this->repository->updateMultipleRecord($data);
        return back()->with('success', __('notifySuccess'));
    }

    // BANK ACCOUNT
    public function bankAccount()
    {
        $settings = $this->repository->getByGroup([SettingGroup::Bank]);
        return view($this->view['bank'], [
            'settings' => $settings,
            'breadcrums' => $this->crums->add(__('general'))->add(__('bankAccount'))
        ]);
    }

    // Social Network
    public function socialNetwork()
    {
        $settings = $this->repository->getByGroup([SettingGroup::SocialNetwork]);
        return view($this->view['social-network'], [
            'settings' => $settings,
            'breadcrums' => $this->crums->add(__('general'))->add(__('socialNetwork'))
        ]);
    }
}
