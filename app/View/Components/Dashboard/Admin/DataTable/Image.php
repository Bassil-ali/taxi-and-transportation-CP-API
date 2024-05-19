<?php

namespace App\View\Components\Dashboard\Admin\DataTable;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    public function __construct(
        public $models = []
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.image');

    }//end of render 

}//end of class