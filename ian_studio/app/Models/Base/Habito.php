<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habito
 * 
 * @property int|null $id
 * @property string|null $id_user
 * @property int $exercicio_fisico
 * @property string $medicamento
 * @property string $ingestao_bebida_alcoolica
 * @property int $fuma
 * @property string $qualidade_sono
 * @property int $horas_sono
 * @property string $apetite
 * @property string $ingestao_agua
 * @property int $ingestao_agua_qtd
 * @property string $frequencia_urina
 * @property string $coloracao_urina
 *
 * @package App\Models\Base
 */
class Habito extends Model
{
	protected $table = 'habitos';
	public $timestamps = false;

	protected $casts = [
		'exercicio_fisico' => 'int',
		'fuma' => 'int',
		'horas_sono' => 'int',
		'ingestao_agua_qtd' => 'int'
	];

	protected $fillable = [
		'id_user',
		'exercicio_fisico',
		'medicamento',
		'ingestao_bebida_alcoolica',
		'fuma',
		'qualidade_sono',
		'horas_sono',
		'apetite',
		'ingestao_agua',
		'ingestao_agua_qtd',
		'frequencia_urina',
		'coloracao_urina'
	];
}
