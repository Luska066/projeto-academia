@extends('users.layout')
@php
    use \App\Http\Enum\Habitos\IngestaoBebidaAlcoolica;
    use \App\Http\Enum\Habitos\QualidadeSono;
    use \App\Http\Enum\Habitos\Apetite;
    use \App\Http\Enum\Habitos\IngestaoAgua;
    use \App\Http\Enum\Habitos\FrequenciaUrina;
    use \App\Http\Enum\QuestionarioFeminino\CicloMenstrual;
@endphp
@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h1>Perfil Aluno</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', compact('user')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{@old('name', $user->name)}}" required/>
                            @if($errors->has('name'))
                                <div class='error small text-danger'>{{$errors->first('name')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{@old('email', $user->email)}}" required/>
                            @if($errors->has('email'))
                                <div class='error small text-danger'>{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data Nascimento:</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
                                   value="{{@old('data_nascimento', $user->data_nascimento)}}"/>
                            @if($errors->has('data_nascimento'))
                                <div class='error small text-danger'>{{$errors->first('data_nascimento')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="number" name="idade" id="idade" class="form-control"
                                   value="{{@old('idade', $user->idade)}}"/>
                            @if($errors->has('idade'))
                                <div class='error small text-danger'>{{$errors->first('idade')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select type="text" name="sexo" id="sexo" class="form-control">
                                <option @if($user->sexo === 'MASCULINO') selected @endif value="MASCULINO">Masculino
                                </option>
                                <option @if($user->sexo === 'FEMININO') selected @endif value="FEMININO">Feminino
                                </option>
                            </select>
                            @if($errors->has('sexo'))
                                <div class='error small text-danger'>{{$errors->first('sexo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control"
                                   value="{{@old('celular', $user->celular)}}"/>
                            @if($errors->has('celular'))
                                <div class='error small text-danger'>{{$errors->first('celular')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="cep" class="form-label">Cep:</label>
                            <input type="text" name="cep" id="cep" class="form-control"
                                   value="{{@old('cep', $user->cep)}}"/>
                            @if($errors->has('cep'))
                                <div class='error small text-danger'>{{$errors->first('cep')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereco:</label>
                            <input type="text" name="endereco" id="endereco" class="form-control"
                                   value="{{@old('endereco', $user->endereco)}}"/>
                            @if($errors->has('endereco'))
                                <div class='error small text-danger'>{{$errors->first('endereco')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" name="estado" id="estado" class="form-control"
                                   value="{{@old('estado', $user->estado)}}"/>
                            @if($errors->has('estado'))
                                <div class='error small text-danger'>{{$errors->first('estado')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control"
                                   value="{{@old('bairro', $user->bairro)}}"/>
                            @if($errors->has('bairro'))
                                <div class='error small text-danger'>{{$errors->first('bairro')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contato_emergencia" class="form-label">Contato Emergencia:</label>
                            <input type="text" name="contato_emergencia" id="contato_emergencia" class="form-control"
                                   value="{{@old('contato_emergencia', $user->contato_emergencia)}}"/>
                            @if($errors->has('contato_emergencia'))
                                <div class='error small text-danger'>{{$errors->first('contato_emergencia')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Atualizar Historico')</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="card">
            <form method="POST" action="{{route('users.paymentPlan',$user->id)}}"
                  class="card-header d-flex justify-content-between">
                @csrf
                @method('POST')
                <h1>Plano Aluno</h1>
                <div class="d-flex align-items-center gap-4">
                    <div>
                        <input type="checkbox" name="desconto" id="desconto"
                               value="true"/>
                        <label for="desconto" class="form-label">Adicionar Desconto:</label>
                    </div>
                    <button type="submit" class="btn btn-secondary">@lang('Confirmar Pagamento')</button>
                </div>
            </form>
            @php
                $planoAtual = $user->planos()->first()
            @endphp
            <label for="id_plano" class="form-label ms-4>Plano atual:
                Plano : {{$planoAtual->plano()->first()->nome}},
                Valor : {{\App\Helpers\StringUtils::formatBRL($planoAtual->valor)}},
                Desconto : {{\App\Helpers\StringUtils::formatBRL($planoAtual->desconto)}},
                Periodo : {{$planoAtual->periodo}}X,
                Vezes na semana : {{$planoAtual->qnt_vezes}}X
            </label>
            <form method="POST" action="{{route('users.storeOrUpdatePlan',$user->id)}}" class="card-body">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="id_plano" class="form-label">Plano:</label>
                    <select type="text" name="id_plano" id="id_plano" class="form-control">
                        @foreach(\App\Models\PlanosValore::all() as $plano)
                            <option
                                @if($plano->id == $user->id_plano)
                                    selected
                                @endif
                                value="{{$plano->id}}">
                                Plano : {{$plano->plano()->first()->nome}},
                                Valor : {{\App\Helpers\StringUtils::formatBRL($plano->valor)}},
                                Desconto : {{\App\Helpers\StringUtils::formatBRL($plano->desconto)}},
                                Periodo : {{$plano->periodo}}X,
                                Vezes na semana : {{$plano->qnt_vezes}}X
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('id_plano'))
                        <div class='error small text-danger'>{{$errors->first('id_plano')}}</div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">@lang('Atualizar Plano do Aluno')</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Objetivo Aluno</h1>
            </div>
            <form method="POST" action="{{route('users.storeOrUpdateObjetivosAluno',$user->id)}}" class="card-body">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="id_objetivo" class="form-label">Objetivo Aluno:</label>
                    <select type="text" name="id_objetivo" id="id_objetivo" class="form-control">
                        @foreach(\App\Models\Objetivo::all() as $objetivo)
                            <option
                                @if($objetivo->id == $user->id_objetivo)
                                    selected
                                @endif
                                value="{{$objetivo->id}}">
                                {{$objetivo->nome}}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('id_objetivo'))
                        <div class='error small text-danger'>{{$errors->first('id_objetivo')}}</div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">@lang('Atualizar Objetvio')</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Treinos Alunos</h1>
                <table class="table table-striped table-responsive-lg">
                    <thead>
                    <tr>
                        <th>Treino</th>
                        <th>Séries</th>
                        <th>Repetições</th>
                        <th>Observação</th>
                        <th>AÇÕES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exercicios as $exercicio)
                        <tr>
                            <td>{{$exercicio->exercicio()->first()->nome}}</td>
                            <td>{{$exercicio->series}}X</td>
                            <td>{{$exercicio->repeticoes}}X</td>
                            <td>{{$exercicio->observacao}}</td>
                        <tr>
                    @endforeach
                    <tr>
                        <form method="POST" action="{{route('users.storeOrUpdateTrainnings',$user->id)}}">
                            @csrf
                            @method('POST')
                            <td>
                                <select class="form-control" name="id_exercicio">
                                    @foreach(\App\Models\Exercicio::all() as $exercicio)
                                        <option
                                            value="{{$exercicio->id}}">
                                            {{$exercicio->nome}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input
                                    class="form-control"
                                    type="number"
                                    name="series"
                                />
                            </td>
                            <td>
                                <input
                                    class="form-control"
                                    type="number"
                                    name="repeticoes"
                                />
                            </td>
                            <td>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="fazer mais lento possível"
                                    name="observacao"
                                />
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success"><i class=" fas fa-plus"></i></button>
                            </td>
                        </form>
                    <tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h1>Historico Aluno</h1>
            </div>
            <form method="POST" action="{{route('users.storeOrUpdateHitoricoAluno',$user->id)}}">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tratamento_medico" class="form-label">Tratamento médico?:</label>
                        <input type="text" name="tratamento_medico" id="tratamento_medico" class="form-control"
                               value="{{@old('tratamento_medico', $historicoAluno?->tratamento_medico ?? '')}}"/>
                        @if($errors->has('tratamento_medico'))
                            <div class='error small text-danger'>{{$errors->first('tratamento_medico')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="antecedentes_oncologicos" class="form-label">Antecedentes Oncologicos?</label>
                        <input type="text" name="antecedentes_oncologicos" id="antecedentes_oncologicos"
                               class="form-control"
                               value="{{@old('antecedentes_oncologicos', $historicoAluno?->antecedentes_oncologicos ?? '')}}"/>
                        @if($errors->has('antecedentes_oncologicos'))
                            <div class='error small text-danger'>{{$errors->first('antecedentes_oncologicos')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="problemas_ortopedicos" class="form-label">Problemas Ortopedicos?</label>
                        <input type="text" name="problemas_ortopedicos" id="problemas_ortopedicos" class="form-control"
                               value="{{@old('problemas_ortopedicos', $historicoAluno?->problemas_ortopedicos ?? '')}}"/>
                        @if($errors->has('antecedentes_oncologicos'))
                            <div class='error small text-danger'>{{$errors->first('problemas_ortopedicos')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="hipertensao" class="form-label">Hipertensão?</label>
                        <select type="text" name="hipertensao" id="hipertensao" class="form-control"
                                value="{{@old('hipertensao', $historicoAluno?->hipertensao ?? '')}}">
                            <option></option>
                            <option @if($historicoAluno?->hipertensao == 1 ) selected @endif value="1">SIM</option>
                            <option @if($historicoAluno?->hipertensao == 0 ) selected @endif value="0">NÃO</option>
                        </select>
                        @if($errors->has('hipertensao'))
                            <div class='error small text-danger'>{{$errors->first('hipertensao')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="diabetes" class="form-label">Diabetes?</label>
                        <select type="text" name="diabetes" id="diabetes" class="form-control"
                                value="{{@old('diabetes', $user->bairro)}}">
                            <option></option>
                            <option @if($historicoAluno?->diabetes == 1 ) selected @endif value="1">SIM</option>
                            <option @if($historicoAluno?->diabetes == 0 ) selected @endif value="0">NÃO</option>
                        </select>
                        @if($errors->has('diabetes'))
                            <div class='error small text-danger'>{{$errors->first('diabetes')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="queixa" class="form-label">Queixa ?</label>
                        <input type="text" name="queixa" id="queixa" class="form-control"
                               value="{{@old('queixa', $historicoAluno?->queixa ?? '')}}"/>
                        @if($errors->has('diabetes'))
                            <div class='error small text-danger'>{{$errors->first('diabetes')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ultima_visita_clinico" class="form-label">Ultima visita clínica ?</label>
                        <input type="text" name="ultima_visita_clinico" id="ultima_visita_clinico" class="form-control"
                               value="{{@old('ultima_visita_clinico', $historicoAluno?->ultima_visita_clinico ?? '')}}"/>
                        @if($errors->has('ultima_visita_clinico'))
                            <div class='error small text-danger'>{{$errors->first('ultima_visita_clinico')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="relizou_teste_esforco" class="form-label">Realizou teste de esforço ?</label>
                        <input type="text" name="relizou_teste_esforco" id="relizou_teste_esforco" class="form-control"
                               value="{{@old('relizou_teste_esforco', $historicoAluno?->relizou_teste_esforco ?? '')}}"/>
                        @if($errors->has('relizou_teste_esforco'))
                            <div class='error small text-danger'>{{$errors->first('relizou_teste_esforco')}}</div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">@lang('Atualizar Histórico Aluno')</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h1>Hábitos Alunos</h1>
            </div>
            <form method="POST" action="{{route('users.storeOrUpdateHabitosAluno',$user->id)}}">
                @csrf
                @method('POST')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="exercicio_fisico" class="form-label">Já praticou exrcício fisico ?:</label>
                        <select type="text" name="exercicio_fisico" id="exercicio_fisico" class="form-control"
                                value="{{@old('exercicio_fisico', $habito?->exercicio_fisico)}}">
                            <option @if($habito?->exercicio_fisico == 1) selected @endif value="1">SIM</option>
                            <option @if($habito?->exercicio_fisico == 0) selected @endif value="0">NÃO</option>
                        </select>
                        @if($errors->has('exercicio_fisico'))
                            <div class='error small text-danger'>{{$errors->first('exercicio_fisico')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="medicamento" class="form-label">Medicamentos ?</label>
                        <input type="text" name="medicamento" id="medicamento" class="form-control"
                               value="{{@old('medicamento', $habito?->medicamento)}}"/>
                        @if($errors->has('medicamento'))
                            <div class='error small text-danger'>{{$errors->first('medicamento')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ingestao_bebida_alcoolica" class="form-label">Ingestão de bebida alcóolica ?</label>
                        <select type="text" name="ingestao_bebida_alcoolica" id="ingestao_bebida_alcoolica"
                                class="form-control" value="{{@old('ingestao_bebida_alcoolica', $user->bairro)}}">
                            <option></option>
                            <option
                                @if($habito?->ingestao_bebida_alcoolica == IngestaoBebidaAlcoolica::MUITO->value)
                                    selected
                                @endif
                                value="{{IngestaoBebidaAlcoolica::MUITO->value}}">
                                MUITO
                            </option>
                            <option
                                @if($habito?->ingestao_bebida_alcoolica == IngestaoBebidaAlcoolica::MODERADO->value)
                                    selected
                                @endif
                                value="{{IngestaoBebidaAlcoolica::MODERADO->value}}">
                                MODERADO
                            </option>
                            <option
                                @if($habito?->ingestao_bebida_alcoolica == IngestaoBebidaAlcoolica::NAO_CONSOME->value)
                                    selected
                                @endif
                                value="{{\App\Http\Enum\Habitos\IngestaoBebidaAlcoolica::NAO_CONSOME->value}}">NAO
                                CONSOME
                            </option>
                        </select>
                        @if($errors->has('ingestao_bebida_alcoolica'))
                            <div class='error small text-danger'>{{$errors->first('ingestao_bebida_alcoolica')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="fuma" class="form-label">Fumante ?</label>
                        <select type="text" name="fuma" id="fuma" class="form-control"
                                value="{{@old('fuma', $habito?->fuma)}}">
                            <option @if($habito?->fuma == 1) selected @endif value="1">SIM</option>
                            <option @if($habito?->fuma == 0) selected @endif value="0">NÃO</option>
                        </select>
                        @if($errors->has('fuma'))
                            <div class='error small text-danger'>{{$errors->first('fuma')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="qualidade_sono" class="form-label">Qualidade do Sono ?</label>
                        <select type="text" name="qualidade_sono" id="qualidade_sono" class="form-control">
                            <option
                                @if($habito?->qualidade_sono == QualidadeSono::BOA->value )
                                    selected
                                @endif
                                value="{{QualidadeSono::BOA->value}}">
                                BOA
                            </option>
                            <option
                                @if($habito?->qualidade_sono == QualidadeSono::RUIM->value )
                                    selected
                                @endif
                                value="{{QualidadeSono::RUIM->value}}">
                                RUIM
                            </option>
                            <option
                                @if($habito?->qualidade_sono == QualidadeSono::MODERADO->value )
                                    selected
                                @endif
                                value="{{QualidadeSono::MODERADO->value}}">
                                MODERADO
                            </option>
                        </select>
                        @if($errors->has('qualidade_sono'))
                            <div class='error small text-danger'>{{$errors->first('qualidade_sono')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="apetite" class="form-label">Apetite ?</label>
                        <select type="text" name="apetite" id="apetite" class="form-control">
                            <option
                                @if($habito?->apetite == Apetite::MUITO->value)
                                    selected
                                @endif
                                value="{{Apetite::MUITO->value}}">
                                MUITO
                            </option>
                            <option
                                @if($habito?->apetite == Apetite::MODERADO->value)
                                    selected
                                @endif
                                value="{{Apetite::MODERADO->value}}">
                                MODERADO
                            </option>
                            <option
                                @if($habito?->apetite == Apetite::POUCO->value)
                                    selected
                                @endif
                                value="{{Apetite::POUCO->value}}">
                                POUCO
                            </option>
                        </select>
                        @if($errors->has('apetite'))
                            <div class='error small text-danger'>{{$errors->first('apetite')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ingestao_agua" class="form-label">Ingestão agua ?</label>
                        <select type="text" name="ingestao_agua" id="ingestao_agua" class="form-control">
                            <option
                                @if($habito?->ingestao_agua == IngestaoAgua::MUITO->value)
                                    selected
                                @endif
                                value="{{IngestaoAgua::MUITO->value}}">
                                MUITO
                            </option>
                            <option
                                @if($habito?->ingestao_agua == IngestaoAgua::MODERADO->value)
                                    selected
                                @endif
                                value="{{IngestaoAgua::MODERADO->value}}">
                                MODERADO
                            </option>
                            <option
                                @if($habito?->ingestao_agua == IngestaoAgua::POUCO->value)
                                    selected
                                @endif
                                value="{{IngestaoAgua::POUCO->value}}">
                                POUCO
                            </option>
                        </select>
                        @if($errors->has('ingestao_agua'))
                            <div class='error small text-danger'>{{$errors->first('ingestao_agua')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ingestao_agua_qtd" class="form-label">Ingestao água (litros)</label>
                        <input type="number" name="ingestao_agua_qtd" id="ingestao_agua_qtd" class="form-control"
                               value="{{@old('ingestao_agua_qtd', $habito?->ingestao_agua_qtd ?? 0)}}"/>
                        @if($errors->has('ingestao_agua_qtd'))
                            <div class='error small text-danger'>{{$errors->first('ingestao_agua_qtd')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="frequencia_urina" class="form-label">Frequência urina ?</label>
                        <select type="text" name="frequencia_urina" id="frequencia_urina" class="form-control">
                            <option
                                @if($habito?->frequencia_urina == FrequenciaUrina::MUITO->value)
                                    selected
                                @endif
                                value="{{FrequenciaUrina::MUITO->value}}">
                                MUITO
                            </option>
                            <option
                                @if($habito?->frequencia_urina == FrequenciaUrina::MODERADO->value)
                                    selected
                                @endif
                                value="{{FrequenciaUrina::MODERADO->value}}">
                                MODERADO
                            </option>
                            <option
                                @if($habito?->frequencia_urina == FrequenciaUrina::POUCO->value)
                                    selected
                                @endif
                                value="{{FrequenciaUrina::POUCO->value}}">
                                POUCO
                            </option>
                        </select>
                        @if($errors->has('frequencia_urina'))
                            <div class='error small text-danger'>{{$errors->first('frequencia_urina')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="coloracao_urina" class="form-label">Coloração urina :</label>
                        <input type="text" name="coloracao_urina" id="coloracao_urina" class="form-control"
                               value="{{@old('coloracao_urina', $habito?->coloracao_urina ?? 'campo vazio')}}"/>
                        @if($errors->has('coloracao_urina'))
                            <div class='error small text-danger'>{{$errors->first('coloracao_urina')}}</div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">@lang('Atualizar Hábito do Aluno')</button>
                    </div>
                </div>
            </form>
        </div>
        @if($user->sexo == 'FEMININO')
            <div class="card">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h1>Questionário Feminino</h1>
                </div>
                <form method="POST" action="{{route('users.storeOrUpdateQuestionarioFemininoAluno',$user->id)}}">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="gravida" class="form-label">Grávida :</label>
                            <select type="text" name="gravida" id="gravida" class="form-control">
                                <option @if($questionarioMulheres?->gravida === 1) selected @endif value="1">SIM
                                </option>
                                <option @if($questionarioMulheres?->gravida === 0) selected @endif value="0">NÃO
                                </option>
                            </select>
                            @if($errors->has('gravida'))
                                <div class='error small text-danger'>{{$errors->first('gravida')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="pretende_engravidar" class="form-label">Pretende Engravidar ?</label>
                            <select type="text" name="pretende_engravidar" id="pretende_engravidar"
                                    class="form-control">
                                <option @if($questionarioMulheres?->pretende_engravidar === 1) selected
                                        @endif value="1">
                                    SIM
                                </option>
                                <option @if($questionarioMulheres?->pretende_engravidar === 0) selected
                                        @endif value="0">
                                    NÃO
                                </option>
                            </select>
                            @if($errors->has('pretende_engravidar'))
                                <div class='error small text-danger'>{{$errors->first('pretende_engravidar')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="metodo_contraceptivo" class="form-label">Toma contraceptivos ?</label>
                            <input type="text" name="metodo_contraceptivo" id="metodo_contraceptivo"
                                   class="form-control"
                                   value="{{@old('metodo_contraceptivo', $questionarioMulheres?->metodo_contraceptivo)}}"/>
                            @if($errors->has('metodo_contraceptivo'))
                                <div class='error small text-danger'>{{$errors->first('metodo_contraceptivo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="ovario_policisticos" class="form-label">Ingestao água (litros)</label>
                            <input type="text" name="ovario_policisticos" id="ovario_policisticos" class="form-control"
                                   value="{{@old('ovario_policisticos', $questionarioMulheres?->ovario_policisticos)}}"/>
                            @if($errors->has('ovario_policisticos'))
                                <div class='error small text-danger'>{{$errors->first('ovario_policisticos')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="ciclo_mestrual" class="form-label">Ciclo Menstrual</label>
                            <select type="text" name="ciclo_mestrual" id="ciclo_mestrual" class="form-control"
                                    value="{{@old('ciclo_mestrual', $questionarioMulheres?->ciclo_mestrual)}}">
                                <option
                                    @if($questionarioMulheres?->ciclo_mestrual == CicloMenstrual::REGULAR->value)
                                        selected
                                    @endif
                                    value="{{CicloMenstrual::REGULAR->value}}">
                                    REGULAR
                                </option>
                                <option
                                    @if($questionarioMulheres?->ciclo_mestrual == CicloMenstrual::IRREGULAR->value)
                                        selected
                                    @endif
                                    value="{{CicloMenstrual::IRREGULAR->value}}">
                                    IRREGULAR
                                </option>
                            </select>
                            @if($errors->has('ciclo_menstrual'))
                                <div class='error small text-danger'>{{$errors->first('ciclo_menstrual')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit"
                                    class="btn btn-primary">@lang('Atualizar Questionário Feminino')</button>
                        </div>
                    </div>
                </form>

            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <h1>Avaliação Corporal</h1>
            </div>
            <form method="POST" action="{{route('users.storeOrUpdateAvaliacaoCorporalAluno',$user->id)}}">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="biceps_d" class="form-label">Biceps Direito (cm) ?</label>
                        <input type="number" name="biceps_d" id="biceps_d" class="form-control"
                               value="{{@old('biceps_d', $avaliacaoCorporal?->biceps_d)}}"/>
                        @if($errors->has('biceps_d'))
                            <div class='error small text-danger'>{{$errors->first('biceps_d')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="biceps_e" class="form-label">Biceps Esquerdo (cm) ?</label>
                        <input type="number" name="biceps_e" id="biceps_e" class="form-control"
                               value="{{@old('biceps_e', $avaliacaoCorporal?->biceps_e)}}"/>
                        @if($errors->has('biceps_e'))
                            <div class='error small text-danger'>{{$errors->first('biceps_e')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="antebraco_d" class="form-label">Antebraço Direito (cm) ?</label>
                        <input type="number" name="antebraco_d" id="antebraco_d" class="form-control"
                               value="{{@old('antebraco_d', $avaliacaoCorporal?->antebraco_d)}}"/>
                        @if($errors->has('antebraco_d'))
                            <div class='error small text-danger'>{{$errors->first('antebraco_d')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="antebraco_e" class="form-label">Antebraço Esquerdo (cm) ?</label>
                        <input type="number" name="antebraco_e" id="antebraco_e" class="form-control"
                               value="{{@old('antebraco_e', $avaliacaoCorporal?->antebraco_e)}}"/>
                        @if($errors->has('antebraco_e'))
                            <div class='error small text-danger'>{{$errors->first('antebraco_e')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ombros" class="form-label">Ombros (cm) ?</label>
                        <input type="number" name="ombros" id="ombros" class="form-control"
                               value="{{@old('ombros', $avaliacaoCorporal?->ombros)}}"/>
                        @if($errors->has('ombros'))
                            <div class='error small text-danger'>{{$errors->first('ombros')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="peitoral_e_dorsal" class="form-label">Peitoral e dorsal (cm) ?</label>
                        <input type="number" name="peitoral_e_dorsal" id="peitoral_e_dorsal" class="form-control"
                               value="{{@old('peitoral_e_dorsal', $avaliacaoCorporal?->peitoral_e_dorsal)}}"/>
                        @if($errors->has('peitoral_e_dorsal'))
                            <div class='error small text-danger'>{{$errors->first('peitoral_e_dorsal')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="abaixo_peitoral" class="form-label">Abaixo peitoral (cm) ?</label>
                        <input type="number" name="abaixo_peitoral" id="abaixo_peitoral" class="form-control"
                               value="{{@old('abaixo_peitoral', $avaliacaoCorporal?->abaixo_peitoral)}}"/>
                        @if($errors->has('abaixo_peitoral'))
                            <div class='error small text-danger'>{{$errors->first('abaixo_peitoral')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="cintura" class="form-label">Cintura (cm) ?</label>
                        <input type="number" name="cintura" id="cintura" class="form-control"
                               value="{{@old('cintura', $avaliacaoCorporal?->cintura)}}"/>
                        @if($errors->has('cintura'))
                            <div class='error small text-danger'>{{$errors->first('cintura')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="acima_umbigo" class="form-label">Acima Umbigo (cm) ?</label>
                        <input type="number" name="acima_umbigo" id="acima_umbigo" class="form-control"
                               value="{{@old('acima_umbigo', $avaliacaoCorporal?->acima_umbigo)}}"/>
                        @if($errors->has('acima_umbigo'))
                            <div class='error small text-danger'>{{$errors->first('acima_umbigo')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="abdomen" class="form-label">Abdomen (cm) ?</label>
                        <input type="number" name="abdomen" id="abdomen" class="form-control"
                               value="{{@old('abdomen', $avaliacaoCorporal?->abdomen)}}"/>
                        @if($errors->has('abdomen'))
                            <div class='error small text-danger'>{{$errors->first('abdomen')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="gluteos" class="form-label">Gluteos (cm) ?</label>
                        <input type="number" name="gluteos" id="gluteos" class="form-control"
                               value="{{@old('gluteos', $avaliacaoCorporal?->gluteos)}}"/>
                        @if($errors->has('gluteos'))
                            <div class='error small text-danger'>{{$errors->first('gluteos')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="coxa_circular_maior_d" class="form-label">Coxa circular maior direito (cm) ?</label>
                        <input type="number" name="coxa_circular_maior_d" id="coxa_circular_maior_d"
                               class="form-control"
                               value="{{@old('coxa_circular_maior_d', $avaliacaoCorporal?->coxa_circular_maior_d)}}"/>
                        @if($errors->has('coxa_circular_maior_d'))
                            <div class='error small text-danger'>{{$errors->first('coxa_circular_maior_d')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="coxa_circular_maior_e" class="form-label">Coxa circular maior esquerdo (cm)
                            ?</label>
                        <input type="number" name="coxa_circular_maior_e" id="coxa_circular_maior_e"
                               class="form-control"
                               value="{{@old('coxa_circular_menor_e', $avaliacaoCorporal?->coxa_circular_menor_e)}}"/>
                        @if($errors->has('coxa_circular_menor_e'))
                            <div class='error small text-danger'>{{$errors->first('coxa_circular_menor_e')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="coxa_circular_menor_d" class="form-label">Coxa circular menor direito (cm) ?</label>
                        <input type="number" name="coxa_circular_menor_d" id="coxa_circular_menor_d"
                               class="form-control"
                               value="{{@old('coxa_circular_menor_d', $avaliacaoCorporal?->coxa_circular_menor_d)}}"/>
                        @if($errors->has('coxa_circular_menor_d'))
                            <div class='error small text-danger'>{{$errors->first('coxa_circular_menor_d')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="coxa_circular_menor_e" class="form-label">Coxa circular menor esqueda (cm) ?</label>
                        <input type="number" name="coxa_circular_menor_e" id="coxa_circular_menor_e"
                               class="form-control"
                               value="{{@old('coxa_circular_menor_e', $avaliacaoCorporal?->coxa_circular_menor_e)}}"/>
                        @if($errors->has('coxa_circular_menor_e'))
                            <div class='error small text-danger'>{{$errors->first('coxa_circular_menor_e')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="panturrilha_d" class="form-label">Panturrilha direita (cm) ?</label>
                        <input type="number" name="panturrilha_d" id="panturrilha_d" class="form-control"
                               value="{{@old('panturrilha_d', $avaliacaoCorporal?->panturrilha_d)}}"/>
                        @if($errors->has('panturrilha_d'))
                            <div class='error small text-danger'>{{$errors->first('panturrilha_d')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="panturrilha_e" class="form-label">Panturrilha esquerda (cm) ?</label>
                        <input type="number" name="panturrilha_e" id="panturrilha_e" class="form-control"
                               value="{{@old('panturrilha_e', $avaliacaoCorporal?->panturrilha_e)}}"/>
                        @if($errors->has('panturrilha_e'))
                            <div class='error small text-danger'>{{$errors->first('panturrilha_e')}}</div>
                        @endif
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="{{ route('users.index', []) }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">@lang('Atualizar Avaliação do Aluno')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script type="module">
        document.getElementById('cep').addEventListener('change', (event) => {
            CepService.viaCep(event.target.value)
                .then((res) => {
                    const objectCep = {
                        complemento: res.data.complemento,
                        localidade: res.data.localidade,
                        logradouro: res.data.logradouro,
                        bairro: res.data.bairro,
                        estado: res.data.estado
                    }
                    document.getElementById(
                        'endereco').value = `${objectCep.estado || 'sem estado'}, ${objectCep.localidade || 'sem localidade'} , ${objectCep.logradouro || 'sem logradouro'} , ${objectCep.bairro || 'sem bairro'} , sem numero`;
                    document.getElementById('estado').value = `${objectCep.estado}`;
                    document.getElementById('bairro').value = `${objectCep.bairro}`;
                    console.log(res)
                })
        });
    </script>
@endpush
