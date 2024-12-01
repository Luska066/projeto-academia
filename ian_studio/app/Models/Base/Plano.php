<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plano
 * 
 * @property int|null $id
 * @property string $nome
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class Plano extends Model
{
	protected $table = 'planos';

	protected $fillable = [
		'nome'
	];
}
