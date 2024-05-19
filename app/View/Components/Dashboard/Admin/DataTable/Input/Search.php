<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    public function __construct(){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.input.search');

    }//end of render

}//end pf class