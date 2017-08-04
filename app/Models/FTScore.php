<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FTScore extends Model {

    protected $table = 'ft_score';

	protected $fillable = ['id', 'name', 'level', 'score', 'duration', 'speed'];

	use UuidTrait;

	use SoftDeletes;



}
