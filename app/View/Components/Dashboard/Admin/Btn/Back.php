<?php

namespace App\View\Components\Dashboard\Admin\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public function __construct(
        public $route = '',
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.btn.back');

    }//end of render

}//end of class