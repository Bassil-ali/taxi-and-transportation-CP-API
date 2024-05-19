<?php

namespace App\View\Components\Dashboard\Admin\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Edit extends Component
{
    public function __construct(
        public $route = '',
    ){}

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.btn.edit');
    
    }//end of render

}//end of class