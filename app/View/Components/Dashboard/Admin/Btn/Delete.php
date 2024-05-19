<?php

namespace App\View\Components\Dashboard\Admin\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    public function __construct(
        public $id = '',
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.btn.delete');

   }//end of render

}//end of class