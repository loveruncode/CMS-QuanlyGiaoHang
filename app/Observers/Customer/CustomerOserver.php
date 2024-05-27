<?php

namespace App\Observers\Customer;

use App\Models\Customer;

class CustomerOserver
{
    /**
     * Handle the Customer "created" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        //
    }

    public function saving(Customer $customer)
    {
        if (
            count($customer->getOriginal()) == 0
            || (count($customer->getOriginal()) > 0
                && ($customer->getOriginal('province_code') != $customer->province_code
                    || $customer->getOriginal('district_code') != $customer->district_code)
                || ($customer->getOriginal('ward_code') != $customer->ward_code))
        ) {
            $customer->fulladdress = $customer->address . ',' . $customer->ward->name . ', ' . $customer->district->name . ', ' . $customer->province->name;
        }
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}