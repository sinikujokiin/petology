<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Suggestion extends Eloquent{
    protected $table = 'suggestion';
    use SoftDeletes;
}
