<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Rule_flow extends Eloquent{
    protected $table = 'rule_flows';
    // use SoftDeletes;
    public $timestamps = false;

    public function parent()
    {
        return $this->hasOne(Rule_flow::class, 'id' ,'parent_id')->with('symptom');
    }

    public function symptom()
    {
        return $this->hasOne(Symptom::class, 'id','symptom_id');
    }

    public function next_yes()
    {
        return $this->hasOne(Symptom::class, 'id','yes');
    }

    public function next_no()
    {
        return $this->hasOne(Symptom::class, 'id','no');
    }

    public function disease()
    {
        return $this->hasOne(disease::class, 'id','disease_id');
    }

    public function child()
    {
        return $this->hasMany(Rule_flow::class, 'parent_id')->with(['child', 'symptom', 'disease']);
    }

}
