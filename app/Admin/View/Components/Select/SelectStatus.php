<?php

namespace App\Admin\View\Components\Select;

use App\Admin\View\Components\Input\Input;

class SelectStatus extends Input
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-status');
    }
}
