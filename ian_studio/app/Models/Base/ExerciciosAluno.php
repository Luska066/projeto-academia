<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Exercicio;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExerciciosAluno
 *
 * @property int|null $id
 * @property int|null $id_exercicio
 * @property int|null $id_aluno
 * @property int $series
 * @property int $repeticoes
 * @property string $observacao
 *
 * @property Exercicio|null $exercicio
 * @property User|null $user
 *
 * @package App\Models\Base
 */
class ExerciciosAluno extends Model
{
	protected $table = 'exercicios_alunos';
	public $timestamps = false;

	protected $casts = [
		'id_exercicio' => 'int',
		'id_aluno' => 'int',
		'series' => 'int',
		'repeticoes' => 'int'
	];

	protected $fillable = [
		'id_exercicio',
		'id_aluno',
		'series',
		'repeticoes',
		'observacao'
	];

	public function exercicio()
	{
		return $this->belongsTo(Exercicio::class, 'id_exercicio');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_aluno');
	}
}
