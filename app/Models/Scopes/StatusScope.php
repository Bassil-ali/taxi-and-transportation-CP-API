<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
    	$builder->where('status', 1);

    }//end of fun

}//end of class