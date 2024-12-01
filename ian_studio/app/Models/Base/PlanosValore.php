<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Plano;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanosValore
 * 
 * @property int|null $id
 * @property int $periodo
 * @property float $valor
 * @property float $desconto
 * @property int $qnt_vezes
 * @property int $id_plano
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Plano $plano
 *
 * @package App\Models\Base
 */
class PlanosValore extends Model
{
	protected $table = 'planos_valores';

	protected $casts = [
		'periodo' => 'int',
		'valor' => 'float',
		'desconto' => 'float',
		'qnt_vezes' => 'int',
		'id_plano' => 'int'
	];

	protected $fillable = [
		'periodo',
		'valor',
		'desconto',
		'qnt_vezes',
		'id_plano'
	];

	public function plano()
	{
		return $this->belongsTo(Plano::class, 'id_plano');
	}
}
