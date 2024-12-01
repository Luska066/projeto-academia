<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AvaliacoesCorporai
 * 
 * @property int|null $id
 * @property int|null $id_user
 * @property int $biceps_d
 * @property int $biceps_e
 * @property int $antebraco_d
 * @property int $antebraco_e
 * @property int $ombros
 * @property int $peitoral_e_dorsal
 * @property int $abaixo_peitoral
 * @property int $cintura
 * @property int $acima_umbigo
 * @property int $abdomen
 * @property int $gluteos
 * @property int $coxa_circular_maior_d
 * @property int $coxa_circular_maior_e
 * @property int $coxa_circular_menor_d
 * @property int $coxa_circular_menor_e
 * @property int $panturrilha_d
 * @property int|null $panturrilha_e
 *
 * @package App\Models\Base
 */
class AvaliacoesCorporai extends Model
{
	protected $table = 'avaliacoes_corporais';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int',
		'biceps_d' => 'int',
		'biceps_e' => 'int',
		'antebraco_d' => 'int',
		'antebraco_e' => 'int',
		'ombros' => 'int',
		'peitoral_e_dorsal' => 'int',
		'abaixo_peitoral' => 'int',
		'cintura' => 'int',
		'acima_umbigo' => 'int',
		'abdomen' => 'int',
		'gluteos' => 'int',
		'coxa_circular_maior_d' => 'int',
		'coxa_circular_maior_e' => 'int',
		'coxa_circular_menor_d' => 'int',
		'coxa_circular_menor_e' => 'int',
		'panturrilha_d' => 'int',
		'panturrilha_e' => 'int'
	];

	protected $fillable = [
		'id_user',
		'biceps_d',
		'biceps_e',
		'antebraco_d',
		'antebraco_e',
		'ombros',
		'peitoral_e_dorsal',
		'abaixo_peitoral',
		'cintura',
		'acima_umbigo',
		'abdomen',
		'gluteos',
		'coxa_circular_maior_d',
		'coxa_circular_maior_e',
		'coxa_circular_menor_d',
		'coxa_circular_menor_e',
		'panturrilha_d',
		'panturrilha_e'
	];
}
