<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Visible extends Component
{
    public function __construct(
    	public $datatable= [],
        public $lists    = [],
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
    ){
    	$this->lists = $this->getItems();
    }

    public function getItems(): array
    {
    	$items = array_keys($this->datatable['columns'] ?? []);
		array_unshift($items, 'record_select');
		array_push($items, 'created_at');
		array_push($items, 'actions');

    	return (array) $items;

    }//en of items

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.input.visible');

    }//end of render

}//end pf class