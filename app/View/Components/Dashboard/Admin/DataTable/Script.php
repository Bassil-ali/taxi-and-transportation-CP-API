<?php

namespace App\View\Components\Dashboard\Admin\DataTable;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Script extends Component
{
    public function __construct(
        public $datatables = [],
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.script');

    }//end of render

}//end of class