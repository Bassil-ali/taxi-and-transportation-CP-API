<?php

namespace App\View\Components\Dashboard\Admin\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    public function __construct(
        public $id       = '',
        public $col      = '',
        public $name     = '',
        public $type     = 'text',
        public $value    = '',
        public $label    = '',
        public $required = false,
        public $disabled = false,
        public $hidden   = false,
        public $readonly = false,
        public $invalid  = '',
    ){
        $this->id = str_replace('.', '-', !empty($invalid) ? $invalid : $name);
    }

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.input.text');

    }//end of render

}//end of class