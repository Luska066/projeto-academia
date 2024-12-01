<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionariosMulhere
 * 
 * @property int|null $id
 * @property int|null $id_user
 * @property string $ciclo_mestrual
 * @property int $gravida
 * @property int $pretende_engravidar
 * @property string $metodo_contraceptivo
 * @property string $ovario_policisticos
 *
 * @package App\Models\Base
 */
class QuestionariosMulhere extends Model
{
	protected $table = 'questionarios_mulheres';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int',
		'gravida' => 'int',
		'pretende_engravidar' => 'int'
	];

	protected $fillable = [
		'id_user',
		'ciclo_mestrual',
		'gravida',
		'pretende_engravidar',
		'metodo_contraceptivo',
		'ovario_policisticos'
	];
}
