@extends('planos_valors.layout')

@section('planosValor.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','planos_valors']) }}"> Planos Valor</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('planos_valor.store', []) }}" method="POST" class="m-0 p-0">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="periodo" class="form-label">Quantidade de Meses:</label>
                            <input
                                type="number"
                                name="periodo"
                                id="periodo"
                                class="form-control decimal"
                            />
                            @if($errors->has('periodo'))
                                <div class='error small text-danger'>{{$errors->first('periodo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label
                                for="valor"
                                class="form-label">
                                Valor:
                            </label>
                            <input
                                type="text"
                                name="valor"
                                id="valor"
                                class="form-control decimal"
                            />
                            @if($errors->has('valor'))
                                <div class='error small text-danger'>{{$errors->first('valor')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label
                                for="desconto"
                                class="form-label">
                                Desconto:
                            </label>
                            <input
                                type="text"
                                name="desconto"
                                id="desconto"
                                class="form-control"
                            />
                            @if($errors->has('desconto'))
                                <div class='error small text-danger'>{{$errors->first('valor')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label
                                for="qnt_vezes"
                                class="form-label">
                                Quantidade de vezes na semana:
                            </label>
                            <input
                                type="number"
                                name="qnt_vezes"
                                id="qnt_vezes"
                                class="form-control decimal"
                            />
                            @if($errors->has('qnt_vezes'))
                                <div class='error small text-danger'>{{$errors->first('qnt_vezes')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label
                                for="id_plano"
                                class="form-label">
                                Planos:
                            </label>
                            <select
                                name="id_plano"
                                id="id_plano"
                                class="form-control decimal"
                            >
                                @foreach(\App\Models\Plano::all() as $plano)
                                    <option value="{{$plano->id}}">{{$plano->nome}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_plano'))
                                <div class='error small text-danger'>{{$errors->first('qtd_vezes')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('planos_valor.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Planos Valor')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document
            .querySelector('#valor')
            .addEventListener('change',function(event){
                let unmaskValue = StringUtils.unmaskMoneyBRL(event.target.value);
                event.target.value = StringUtils.formatPriceBRL(Number(unmaskValue));
            })
        document
            .querySelector('#desconto')
            .addEventListener('change',function(event) {
                let unmaskValue = StringUtils.unmaskMoneyBRL(event.target.value);
                event.target.value = StringUtils.formatPriceBRL(Number(unmaskValue));
            })
    </script>
@endsection

