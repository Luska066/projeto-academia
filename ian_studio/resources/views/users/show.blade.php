@extends('users.layout')

@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
                    <li class="breadcrumb-item">@lang('User') #{{$user->id}}</li>
                </ol>

                <a href="{{ route('users.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$user->id}}</td>
    </tr>
            <tr>
            <th scope="row">Name:</th>
            <td>{{ $user->name ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Email:</th>
            <td>{{ $user->email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Email Verified At:</th>
            <td>{{ $user->email_verified_at ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Password:</th>
            <td>{{ $user->password ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Objetivo:</th>
            <td>{{ $user->id_objetivo ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Habitos:</th>
            <td>{{ $user->id_habitos ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Historico:</th>
            <td>{{ $user->id_historico ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Avaliacao Corporal:</th>
            <td>{{ $user->id_avaliacao_corporal ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Questionario Mulheres:</th>
            <td>{{ $user->id_questionario_mulheres ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $user->nome ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Data Nascimento:</th>
            <td>{{ $user->data_nascimento ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Idade:</th>
            <td>{{ $user->idade ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Sexo:</th>
            <td>{{ $user->sexo ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Celular:</th>
            <td>{{ $user->celular ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Cep:</th>
            <td>{{ $user->cep ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Endereco:</th>
            <td>{{ $user->endereco ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Estado:</th>
            <td>{{ $user->estado ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Bairro:</th>
            <td>{{ $user->bairro ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Contato Emergencia:</th>
            <td>{{ $user->contato_emergencia ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Remember Token:</th>
            <td>{{ $user->remember_token ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('users.edit', compact('user')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('users.destroy', compact('user')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
