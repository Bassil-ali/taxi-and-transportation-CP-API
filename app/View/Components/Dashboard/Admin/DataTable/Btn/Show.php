<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    public function __construct(){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.btn.show');

    }//end of render

}//end pf class