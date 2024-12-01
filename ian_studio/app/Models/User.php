<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use App\Models\Base\User as BaseUser;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
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
     *
     * @property Habito $habito
     * @property Objetivo $objetivo
     * @property QuestionariosMulhere $questionarios_mulhere
     * @property HistoricosAluno $historicos_aluno
     * @property AvaliacoesCorporai $avaliacoes_corporai
     *
     * @package App\Models\Base
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id_objetivo' => 'int',
        'id_habitos' => 'int',
        'id_historico' => 'int',
        'id_avaliacao_corporal' => 'int',
        'id_questionario_mulheres' => 'int',
        'data_nascimento' => 'datetime',
        'idade' => 'int'
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
        'id_plano',
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
        'cargo'
    ];

    public function habito()
    {
        return $this->belongsTo(Habito::class, 'id_habitos');
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'id_objetivo');
    }

    public function questionarios_mulhere()
    {
        return $this->belongsTo(QuestionariosMulhere::class, 'id_questionario_mulheres');
    }

    public function historicos_aluno()
    {
        return $this->belongsTo(HistoricosAluno::class, 'id_historico');
    }

    public function avaliacoes_corporai()
    {
        return $this->belongsTo(AvaliacoesCorporai::class, 'id_avaliacao_corporal');
    }

    public function planos()
    {
        return $this->belongsTo(PlanosValore::class, 'id_plano');
    }
}
