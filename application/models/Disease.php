<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Disease extends Eloquent{
    protected $table = 'diseases';
    use SoftDeletes;

    public function symptoms()
    {
        return $this->hasMany(Rule::class, 'disease_id')->select('rules.id', 'rules.disease_id' ,'rules.symptom_id', 'code','name')->join('symptoms', 'symptoms.id', '=', 'rules.symptom_id')->where('rules.deleted_at', null);
    }
}
