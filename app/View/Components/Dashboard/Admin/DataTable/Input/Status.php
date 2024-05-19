<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    public function __construct(
        public $models = [],
        public $permissions = false,
        public $dataType    = 'status',
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.input.status');

    }//end of render

}//end pf class