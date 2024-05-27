<?php

namespace App\Admin\Http\Requests\Customer;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Customer\CustomerType;
use Illuminate\Validation\Rules\Enum;

class CustomerRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'type' => ['required', new Enum(CustomerType::class)],
            'fullname' => ['nullable', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\Customer,phone'],
            'address' => ['nullable', 'string'],
            'province_code' => ['required', 'exists:App\Models\Province,code'],
            'district_code' => ['required', 'exists:App\Models\District,code'],
            'ward_code' => ['required', 'exists:App\Models\Ward,code'],
            'fulladdress' => ['nullable', 'string'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Customer,id'],
            'type' => ['required', new Enum(CustomerType::class)],
            'fullname' => ['nullable', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\Customer,phone,' . $this->id],
            'address' => ['nullable', 'string'],
            'province_code' => ['required', 'exists:App\Models\Province,code'],
            'district_code' => ['required', 'exists:App\Models\District,code'],
            'ward_code' => ['required', 'exists:App\Models\Ward,code'],
            'fulladdress' => ['nullable', 'string'],
        ];
    }
}