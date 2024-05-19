<?php

namespace App\View\Components\Dashboard\Admin\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImagePreview extends Component
{
    public function __construct(
        public $col      = '',
        public $name     = '',
        public $image    = '',
        public $label    = '',
        public $accept   = '.png, .jpg, .jpeg',
        public $value    = false,
        public $required = false,
        public $disabled = false,
        public $hidden   = false,
        public $readonly = false,
    ){
        $this->image = $this->getDefaultImage($this->image);
    }

    public function render(): View | Closure | string
    {
        return view('components.dashboard.admin.input.image-preview');

    }//end of render

    public function getDefaultImage($image)
    {
        if (empty($image)) {

            return asset('assets/images/default.png');
            
        } elseif ($image == asset('assets/images/default.png')) {

            return asset('assets/images/default.png');

        } elseif ($image == 'default.png') {

            return asset('assets/images/default.png');

        } else {
            
            return $image;

        }//end of check image

    }//end of fun

}//end of class