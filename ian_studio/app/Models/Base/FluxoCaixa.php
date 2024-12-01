<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FluxoCaixa
 *
 * @property int|null $id
 * @property string $tipo
 * @property float $valor
 * @property string $nome
 * @property int $id_user
 * @property string $feito_por
 * @property float $desconto
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @package App\Models\Base
 */
class FluxoCaixa extends Model
{
	protected $table = 'fluxo_caixa';

	protected $casts = [
		'valor' => 'float',
		'id_user' => 'int',
		'desconto' => 'float'
	];

	protected $fillable = [
		'tipo',
		'valor',
		'nome',
		'id_user',
        'id_plano',
		'feito_por',
		'desconto'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
