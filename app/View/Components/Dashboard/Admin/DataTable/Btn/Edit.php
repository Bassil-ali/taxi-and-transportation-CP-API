<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Edit extends Component
{
    public function __construct(){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.btn.edit');

    }//end of render

}//end pf class