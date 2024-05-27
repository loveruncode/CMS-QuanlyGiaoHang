<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            @lang('action')
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('add')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('payment_method')}}:</label>
        </div>
        <div class="card-body p-2">
            <x-select name="payment_method" :required="true">
                @foreach ($payment_method as $key => $value)
                <x-select-option :value="$key" :title="__($value)" :selected="$key == 1" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>