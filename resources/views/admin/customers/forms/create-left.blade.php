<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <div class="mb-3">
                <label class="control-label">@lang('fullname'):</label>
                <x-input name="fullname" :value="old('fullname')" :required="true" placeholder="Họ và tên" />
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('phone'):</label>
                    <x-input-phone name="phone" :value="old('phone')" :required="true" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">@lang('type'):</label>
                    <x-select name="type" :required="true">
                        <x-select-option value="" :title="__('choose')" />
                        @foreach ($type as $key => $value)
                        <x-select-option :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('Tỉnh/TP') }}:</label>
                    <x-select class="select2-bs5-ajax-many select2-condition" name="province_code"
                        :data-url="route('admin.search.select.province')" data-condition="select[name='district_code']"
                        data-param="province_code">
                    </x-select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('Quận/Huyện') }}:</label>
                    <x-select class="select2-bs5-ajax-many select2-condition" name="district_code"
                        :data-url="route('admin.search.select.district')" data-condition="select[name='ward_code']"
                        data-param="district_code">
                    </x-select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('Phường/Xã') }}:</label>
                    <x-select class="select2-bs5-ajax-many" name="ward_code"
                        :data-url="route('admin.search.select.ward', ['district_code' => 0])">
                    </x-select>
                </div>
            </div>
            <div class="mb-3">
                <label class="control-label">@lang('Address'):</label>
                <x-input id="address" name="address" class="form-control" :value="old('address')" :required="true"
                    placeholder="Ví dụ: 998/42/15 Quang Trung" />
            </div>
        </div>
    </div>
</div>