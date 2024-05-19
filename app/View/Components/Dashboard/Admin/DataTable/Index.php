<?php

namespace App\View\Components\Dashboard\Admin\DataTable;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Index extends Component
{
    public function __construct(){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.index');

    }//end of render

}//end pf class