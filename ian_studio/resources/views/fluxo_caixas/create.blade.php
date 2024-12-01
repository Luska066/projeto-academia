@extends('fluxo_caixas.layout')
@php
    use \App\Http\Enum\FluxoCaixa\Tipo;
@endphp
@section('fluxoCaixa.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','fluxo_caixa']) }}"> Fluxo Caixa</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('fluxo_caixa.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <select type="text" name="tipo" id="tipo" class="form-control">
                                <option
                                    value="{{Tipo::RECEITA->value}}">
                                    Receita
                                </option>
                                <option
                                    value="{{Tipo::DESPESA->value}}">
                                    Despesa
                                </option>
                            </select>
                            @if($errors->has('tipo'))
                                <div class='error small text-danger'>{{$errors->first('tipo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <input type="text" name="valor" id="valor" class="form-control"
                                   value="{{@old('valor')}}"/>
                            @if($errors->has('valor'))
                                <div class='error small text-danger'>{{$errors->first('valor')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <textarea name="nome" id="nome" class="form-control">{{@old('nome')}}</textarea>
                            @if($errors->has('nome'))
                                <div class='error small text-danger'>{{$errors->first('nome')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="desconto" class="form-label">Desconto:</label>
                            <input type="text" name="desconto" id="desconto" class="form-control"
                                   value="{{@old('desconto')}}"/>
                            @if($errors->has('desconto'))
                                <div class='error small text-danger'>{{$errors->first('desconto')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('fluxo_caixa.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Fluxo Caixa')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document
            .getElementById('valor')
            .addEventListener('change', function(event){
                let unMaskValue = StringUtils.unmaskMoneyBRL(event.target.value)
                event.target.value = StringUtils.formatPriceBRL(Number(unMaskValue))
            })
        document
            .getElementById('desconto')
            .addEventListener('change', function(event){
                let unMaskValue = StringUtils.unmaskMoneyBRL(event.target.value)
                event.target.value = StringUtils.formatPriceBRL(Number(unMaskValue))
            })
    </script>
@endsection
