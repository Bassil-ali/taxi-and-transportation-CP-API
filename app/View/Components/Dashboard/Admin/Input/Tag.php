<?php

namespace App\View\Components\Dashboard\Admin\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tag extends Component
{
    public function __construct(
        public $index    = '',
        public $lang     = false,
        public $id       = '',
        public $idname   = '',
        public $col      = '',
        public $name     = '',
        public $type     = 'text',
        public $value    = '',
        public $label    = '',
        public $required = false,
        public $disabled = false,
        public $hidden   = false,
        public $multiple = false,
        public $readonly = false,
        public $invalid  = '',
        public $lists    = [],
    ){
        $this->id = $this->newId();
    }

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.input.tag');

    }//end of render

    public function newId()
    {
        if ($this->lang) {
            return $this->idname . '_' . $this->lang;
        }
        return $this->idname;
    }

}//end of class