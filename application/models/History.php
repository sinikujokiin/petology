<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class History extends Eloquent{
    protected $table = 'histories';

    public function disease()
    {
        return $this->hasOne(disease::class, 'id','disease_id');
    }
    
}
