@extends('fluxo_caixas.layout')

@section('fluxoCaixa.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','fluxo_caixas']) }}"> Fluxo Caixa</a></li>
                    <li class="breadcrumb-item">@lang('Edit Fluxo Caixa') #{{$fluxoCaixa->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('fluxo_caixa.update',$fluxoCaixa->id) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <input type="text" name="tipo" id="tipo" class="form-control"
                                   value="{{@old('tipo', $fluxoCaixa->tipo)}}"/>
                            @if($errors->has('tipo'))
                                <div class='error small text-danger'>{{$errors->first('tipo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <input type="number" name="valor" id="valor" class="form-control"
                                   value="{{@old('valor', \App\Helpers\StringUtils::formatBRL($fluxoCaixa->valor))}}"/>
                            @if($errors->has('valor'))
                                <div class='error small text-danger'>{{$errors->first('valor')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <textarea name="nome" id="nome"
                                      class="form-control">{{@old('nome', $fluxoCaixa->nome)}}</textarea>
                            @if($errors->has('nome'))
                                <div class='error small text-danger'>{{$errors->first('nome')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Id User:</label>
                            <input type="number" name="id_user" id="id_user" class="form-control"
                                   value="{{@old('id_user', $fluxoCaixa->id_user)}}"/>
                            @if($errors->has('id_user'))
                                <div class='error small text-danger'>{{$errors->first('id_user')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="feito_por" class="form-label">Feito Por:</label>
                            <input type="text" name="feito_por" id="feito_por" class="form-control" readonly
                                   value="{{@old('feito_por', $fluxoCaixa->feito_por)}}"/>
                            @if($errors->has('feito_por'))
                                <div class='error small text-danger'>{{$errors->first('feito_por')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="desconto" class="form-label">Desconto:</label>
                            <input type="number" name="desconto" id="desconto" class="form-control"
                                   value="{{@old('desconto', \App\Helpers\StringUtils::formatBRL($fluxoCaixa->desconto) ?: \App\Helpers\StringUtils::formatBRL(0))}}"/>
                            @if($errors->has('desconto'))
                                <div class='error small text-danger'>{{$errors->first('desconto')}}</div>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('fluxo_caixa.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Fluxo Caixa')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
