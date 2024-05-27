<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- Email Address -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('email'):</label>
                    <x-input-email name="email" :value="$admin->email" :required="true" />
                </div>
            </div>
            <!-- Fullname -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('fullname'):</label>
                    <x-input name="fullname" :value="$admin->fullname" :required="true"
                        :placeholder="__('fullname')" />
                </div>
            </div>
            <!-- new password -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('password'):</label>
                    <x-input-password name="password" />
                </div>
            </div>
            <!-- new password confirmation-->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('passwordConfirm'):</label>
                    <x-input-password name="password_confirmation"
                        data-parsley-equalto="input[name='password']"
                        data-parsley-equalto-message="{{ __('passwordMismatch') }}" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('phone'):</label>
                    <x-input-phone name="phone" :value="$admin->phone" :required="true" />
                </div>
            </div>
            <!-- Role -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('role'):</label>
                    <x-select name="roles" :required="true">
                        <x-select-option value="" :title="__('choose')" />
                        @foreach ($roles as $key => $value)
                            <x-select-option :option="$admin->roles->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>
    </div>
</div>