<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Objetivo
 * 
 * @property int|null $id
 * @property string $nome
 *
 * @package App\Models\Base
 */
class Objetivo extends Model
{
	protected $table = 'objetivos';
	public $timestamps = false;

	protected $fillable = [
		'nome'
	];
}
