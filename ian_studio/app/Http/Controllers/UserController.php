<?php

namespace App\Http\Controllers;

use App\Http\Enum\CargoEnum;
use App\Http\Enum\FluxoCaixa\Tipo;
use App\Models\Base\AvaliacoesCorporai;
use App\Models\Base\Habito;
use App\Models\ExerciciosAluno;
use App\Models\FluxoCaixa;
use App\Models\HistoricosAluno;
use App\Models\Objetivo;
use App\Models\QuestionariosMulhere;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::query();

        $users = $users->where('cargo', CargoEnum::CLIENT->value)->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(["name" => "required", "email" => "required|unique:users,email", "password" => "required"]);

        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_verified_at = $request->email_verified_at;
            $user->password = $request->password;
            $user->id_objetivo = $request->id_objetivo;
            $user->id_habitos = $request->id_habitos;
            $user->id_historico = $request->id_historico;
            $user->id_avaliacao_corporal = $request->id_avaliacao_corporal;
            $user->id_questionario_mulheres = $request->id_questionario_mulheres;
            $user->nome = $request->nome;
            $user->data_nascimento = $request->data_nascimento;
            $user->idade = $request->idade;
            $user->sexo = $request->sexo;
            $user->celular = $request->celular;
            $user->cep = $request->cep;
            $user->endereco = $request->endereco;
            $user->estado = $request->estado;
            $user->bairro = $request->bairro;
            $user->contato_emergencia = $request->contato_emergencia;
            $user->remember_token = $request->remember_token;
            $user->save();

            return redirect()->route('users.index', [])->with('success', __('User created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeHistoricoAluno(Request $request, User $student)
    {
        $user = $student;
        try {
            $ha = HistoricosAluno::where('id_user', $user->id)->get();
            if ($ha->count() > 0) {
                $ha[0]->update($request->all());
                $user->id_historico = $ha[0]->id;
                $user->save();
                return redirect()->back()->with('success', __('User editado com sucesso.'));
            } else {
                $historicoAluno = new HistoricosAluno();
                $historicoAluno->fill($request->all());
                $historicoAluno->id_user = $student->id;
                $historicoAluno->save();
                $user->id_historico = $historicoAluno->id;
                $user->save();
                return redirect()->back()->with('success', __('User criado com sucesso.'));
            }

        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeAvaliacaoCorporal(Request $request, User $student)
    {
        $user = $student;
        try {
            $ha = AvaliacoesCorporai::where('id_user', $user->id)->get();
            if ($ha->count() > 0) {
                $ha[0]->update($request->all());
                $user->id_avaliacao_corporal = $ha[0]->id;
                $user->save();

                return redirect()->back()->with('success', __('User editado com sucesso.'));
            } else {
                $historicoAluno = new AvaliacoesCorporai();
                $historicoAluno->fill($request->all());
                $historicoAluno->id_user = $student->id;
                $historicoAluno->save();
                $user->id_avaliacao_corporal = $historicoAluno->id;
                $user->save();
                return redirect()->back()->with('success', __('User criado com sucesso.'));
            }

        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function storeHabitoAluno(Request $request, User $student)
    {
        $user = $student;
        try {
            $ha = Habito::where('id_user', $user->id)->get();
            if ($ha->count() > 0) {
                $ha[0]->update($request->all());
                $user->id_habitos = $ha[0]->id;
                $user->save();
                return redirect()->back()->with('success', __('User editado com sucesso.'));
            } else {
                $habitos = new Habito();
                $habitos->fill($request->all());
                $habitos->id_user = $student->id;
                $habitos->save();
                $user->id_habitos = $habitos->id;
                $user->save();
                return redirect()->back()->with('success', __('User criado com sucesso.'));
            }

        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeQuestionarioFeminino(Request $request, User $student)
    {
        $user = $student;
        try {
            $ha = QuestionariosMulhere::where('id_user', $user->id)->get();
            if ($ha->count() > 0) {
                $IsUpdated = $ha[0]->update($request->all());
                $user->id_questionario_mulheres = $ha[0]->id;
                $user->save();

                return redirect()->back()->with('success', __('User editado com sucesso.'));
            } else {
                $historicoAluno = new QuestionariosMulhere();
                $historicoAluno->fill($request->all());
                $historicoAluno->id_user = $student->id;
                $historicoAluno->save();
                $user->id_questionario_mulheres = $historicoAluno->id;
                $user->save();
                return redirect()->back()->with('success', __('User criado com sucesso.'));
            }

        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeObjetivos(Request $request, User $student)
    {
        $user = $student;
        try {
            $user->id_objetivo = $request->id_objetivo;
            $user->save();
            return redirect()->back()->with('success', __('User criado com sucesso.'));

        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeTrainnings(Request $request, User $student)
    {
        $user = $student;
        try {
            $exercicioAlunos = new ExerciciosAluno();
            $exercicioAlunos->fill($request->all());
            $exercicioAlunos->id_aluno = $student->id;
            $exercicioAlunos->save();
            return redirect()->back()->with('success', __('User criado com sucesso.'));
        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storePlan(Request $request, User $student)
    {
        $user = $student;
        try {
            $student->id_plano = $request->id_plano;
            $student->save();
            return redirect()->back()->with('success', __('User criado com sucesso.'));
        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function pagamentoDeMensalidadeAluno(Request $request, User $student)
    {
        $user = $student;
        try {
            $planSelected = $student->planos()->first();
            $valor_total = 0.0;
            $desconto = 0.0;
            if ($request->desconto == 'true') {
                $valor_total = $planSelected->valor - $planSelected->desconto;
                $desconto = $planSelected->desconto;
            } else {
                $valor_total = $planSelected->valor;
                $desconto = 0.0;
            }
            FluxoCaixa::create([
                'tipo' => Tipo::PAGAMENTO,
                'valor' => $valor_total,
                'nome' => 'Pagamento Mensalidade',
                'id_plano' => $planSelected->id_plano,
                'id_user' => $student->id,
                'feito_por' => $student->name,
                'desconto' => $desconto
            ]);
            return redirect()->back()->with('success', __('Pagamento processado com sucesso.'));
        } catch (\Exception $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $historicoAluno = $user->historicos_aluno()->first() ?? null;

        $habito = $user->habito()->first() ?? null;

        $avaliacaoCorporal = $user->avaliacoes_corporai()->first() ?? null;

        $questionarioMulheres = $user->questionarios_mulhere()->first() ?? null;

        $exercicios = ExerciciosAluno::query()->where('id_aluno', $user->id)->get();

        return view(
            'users.edit',
            compact(
                'user',
                'historicoAluno',
                'habito',
                'avaliacaoCorporal',
                'questionarioMulheres',
                'exercicios'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate(["name" => "required", "email" => "required|unique:users,email,$user->id",]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->id_objetivo = $request->id_objetivo;
            $user->id_habitos = $request->id_habitos;
            $user->id_historico = $request->id_historico;
            $user->id_avaliacao_corporal = $request->id_avaliacao_corporal;
            $user->id_questionario_mulheres = $request->id_questionario_mulheres;
            $user->nome = $request->nome;
            $user->data_nascimento = $request->data_nascimento;
            $user->idade = $request->idade;
            $user->sexo = $request->sexo;
            $user->celular = $request->celular;
            $user->cep = $request->cep;
            $user->endereco = $request->endereco;
            $user->estado = $request->estado;
            $user->bairro = $request->bairro;
            $user->contato_emergencia = $request->contato_emergencia;
            $user->remember_token = $request->remember_token;
            $user->save();

            return redirect()->route('users.index', [])->with('success', __('User edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        try {
            $user->delete();

            return redirect()->route('users.index', [])->with('success', __('User deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.index', [])->with('error', 'Cannot delete User: ' . $e->getMessage());
        }
    }


}
