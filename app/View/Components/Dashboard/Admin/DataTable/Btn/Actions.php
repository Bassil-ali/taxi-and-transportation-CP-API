<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Btn;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Actions extends Component
{
    public function __construct(
        public $actions,
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.btn.actions');

    }//end of render

}//end of class