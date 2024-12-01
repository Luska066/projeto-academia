<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoricosAluno
 * 
 * @property int|null $id
 * @property int|null $id_user
 * @property string $tratamento_medico
 * @property string $antecedentes_oncologicos
 * @property string $problemas_ortopedicos
 * @property int $hipertensao
 * @property int $diabetes
 * @property string $queixa
 * @property string $ultima_visita_clinico
 * @property string $relizou_teste_esforco
 *
 * @package App\Models\Base
 */
class HistoricosAluno extends Model
{
	protected $table = 'historicos_alunos';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int',
		'hipertensao' => 'int',
		'diabetes' => 'int'
	];

	protected $fillable = [
		'id_user',
		'tratamento_medico',
		'antecedentes_oncologicos',
		'problemas_ortopedicos',
		'hipertensao',
		'diabetes',
		'queixa',
		'ultima_visita_clinico',
		'relizou_teste_esforco'
	];
}
