<?php

namespace App\View\Components\Dashboard\Admin\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
 
    public function __construct(
        public $col      = '',
        public $name     = '',
        public $label    = '',
        public $value    = false,
        public $required = false,
        public $disabled = false,
        public $hidden   = false,
        public $readonly = false,
    ){}

    
    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.input.checkbox');

    }//end of render

}//end of class