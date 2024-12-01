<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exercicio
 * 
 * @property int|null $id
 * @property string $nome
 *
 * @package App\Models\Base
 */
class Exercicio extends Model
{
	protected $table = 'exercicios';
	public $timestamps = false;

	protected $fillable = [
		'nome'
	];
}
