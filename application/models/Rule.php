<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Eloquent{
    protected $table = 'rules';
    use SoftDeletes;
    
    public function symptoms()
    {
        return $this->hasMany(Symptom::class, 'id' ,'symptom_id');
    }

    public function diseases()
    {
        return $this->hasOne(Disease::class, 'id' ,'disease_id');
    }
    

}
