<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Symptom extends Eloquent{
    protected $table = 'symptoms';
    use SoftDeletes;


    public function rules()
    {
        return $this->hasMany(Rule::class, 'symptom_id')->with('diseases');
        // ->select('rules.id', 'rules.disease_id' ,'rules.symptom_id', 'code','name')->join('diseases', 'diseases.id', '=', 'rules.symptom_id')->where('rules.deleted_at', null);
    }


}
