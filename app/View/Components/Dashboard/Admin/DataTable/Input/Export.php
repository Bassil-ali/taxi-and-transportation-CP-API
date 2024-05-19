<?php

namespace App\View\Components\Dashboard\Admin\DataTable\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Export extends Component
{
    public function __construct(
        public $items = [],
    ){
    	$this->items = ['pdf', 'copy', 'excel', 'csv', 'print'];
    }

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.data-table.input.export');

    }//end of render

}//end pf class