<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AvaliacoesCorporai;
use App\Models\Habito;
use App\Models\HistoricosAluno;
use App\Models\Objetivo;
use App\Models\QuestionariosMulhere;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int|null $id
 * @property string|null $name
 * @property string|null $email
 * @property Carbon $email_verified_at
 * @property string|null $password
 * @property int $id_objetivo
 * @property int $id_habitos
 * @property int $id_historico
 * @property int $id_avaliacao_corporal
 * @property int $id_questionario_mulheres
 * @property string $nome
 * @property Carbon $data_nascimento
 * @property int $idade
 * @property string $sexo
 * @property string $celular
 * @property string $cep
 * @property string $endereco
 * @property string $estado
 * @property string $bairro
 * @property string $contato_emergencia
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $cargo
 * @property int $id_plano
 * 
 * @property Objetivo $objetivo
 * @property Habito $habito
 * @property HistoricosAluno $historicos_aluno
 * @property AvaliacoesCorporai $avaliacoes_corporai
 * @property QuestionariosMulhere $questionarios_mulhere
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'id_objetivo' => 'int',
		'id_habitos' => 'int',
		'id_historico' => 'int',
		'id_avaliacao_corporal' => 'int',
		'id_questionario_mulheres' => 'int',
		'data_nascimento' => 'datetime',
		'idade' => 'int',
		'id_plano' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'id_objetivo',
		'id_habitos',
		'id_historico',
		'id_avaliacao_corporal',
		'id_questionario_mulheres',
		'nome',
		'data_nascimento',
		'idade',
		'sexo',
		'celular',
		'cep',
		'endereco',
		'estado',
		'bairro',
		'contato_emergencia',
		'remember_token',
		'cargo',
		'id_plano'
	];

	public function objetivo()
	{
		return $this->belongsTo(Objetivo::class, 'id_objetivo');
	}

	public function habito()
	{
		return $this->belongsTo(Habito::class, 'id_habitos');
	}

	public function historicos_aluno()
	{
		return $this->belongsTo(HistoricosAluno::class, 'id_historico');
	}

	public function avaliacoes_corporai()
	{
		return $this->belongsTo(AvaliacoesCorporai::class, 'id_avaliacao_corporal');
	}

	public function questionarios_mulhere()
	{
		return $this->belongsTo(QuestionariosMulhere::class, 'id_questionario_mulheres');
	}
}
