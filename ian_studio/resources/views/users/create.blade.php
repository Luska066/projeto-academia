@extends('users.layout')

@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('users.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{@old('name')}}"
                                   required/>
                            @if($errors->has('name'))
                                <div class='error small text-danger'>{{$errors->first('name')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{@old('email')}}"
                                   required/>
                            @if($errors->has('email'))
                                <div class='error small text-danger'>{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   value="{{@old('password')}}" required/>
                            @if($errors->has('password'))
                                <div class='error small text-danger'>{{$errors->first('password')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Apelido (opcional):</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="{{@old('nome')}}"/>
                            @if($errors->has('nome'))
                                <div class='error small text-danger'>{{$errors->first('nome')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data Nascimento:</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
                                   value="{{@old('data_nascimento')}}"/>
                            @if($errors->has('data_nascimento'))
                                <div class='error small text-danger'>{{$errors->first('data_nascimento')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="number" name="idade" id="idade" class="form-control"
                                   value="{{@old('idade')}}"/>
                            @if($errors->has('idade'))
                                <div class='error small text-danger'>{{$errors->first('idade')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select type="text" name="sexo" id="sexo" class="form-control">
                                <option value="MASCULINO">Masculino</option>
                                <option value="FEMININO">Feminino</option>
                            </select>
                            @if($errors->has('sexo'))
                                <div class='error small text-danger'>{{$errors->first('sexo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control"
                                   value="{{@old('celular')}}"/>
                            @if($errors->has('celular'))
                                <div class='error small text-danger'>{{$errors->first('celular')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="cep" class="form-label">Cep:</label>
                            <input type="text" name="cep" id="cep" class="form-control" value="{{@old('cep')}}"/>
                            @if($errors->has('cep'))
                                <div class='error small text-danger'>{{$errors->first('cep')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereco:</label>
                            <input type="text" name="endereco" id="endereco" class="form-control"
                                   value="{{@old('endereco')}}"/>
                            @if($errors->has('endereco'))
                                <div class='error small text-danger'>{{$errors->first('endereco')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" name="estado" id="estado" class="form-control"
                                   value="{{@old('estado')}}"/>
                            @if($errors->has('estado'))
                                <div class='error small text-danger'>{{$errors->first('estado')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control"
                                   value="{{@old('bairro')}}"/>
                            @if($errors->has('bairro'))
                                <div class='error small text-danger'>{{$errors->first('bairro')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contato_emergencia" class="form-label">Contato Emergencia:</label>
                            <input type="text" name="contato_emergencia" id="contato_emergencia" class="form-control"
                                   value="{{@old('contato_emergencia')}}"/>
                            @if($errors->has('contato_emergencia'))
                                <div class='error small text-danger'>{{$errors->first('contato_emergencia')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new User')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script type="module">
            document.getElementById('cep').addEventListener('change', (event) => {
                CepService.viaCep(event.target.value)
                    .then((res) => {
                        const objectCep = {
                            complemento: res.data.complemento,
                            localidade:res.data.localidade,
                            logradouro:res.data.logradouro,
                            bairro:res.data.bairro,
                            estado:res.data.estado
                        }
                        document.getElementById('endereco').value = `${objectCep.estado || 'sem estado'}, ${objectCep.localidade || 'sem localidade'} , ${objectCep.logradouro || 'sem logradouro'} , ${objectCep.bairro || 'sem bairro'} , sem numero`;
                        document.getElementById('estado').value = `${objectCep.estado}`;
                        document.getElementById('bairro').value = `${objectCep.bairro}`;
                        console.log(res)
                    })
            });
        </script>
    @endpush
@endsection


