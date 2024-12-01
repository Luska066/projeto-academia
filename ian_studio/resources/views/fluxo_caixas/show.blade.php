@extends('fluxo_caixas.layout')

@section('fluxoCaixa.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','fluxo_caixas']) }}"> Fluxo Caixa</a></li>
                    <li class="breadcrumb-item">@lang('Fluxo Caixa') #{{$fluxoCaixa->id}}</li>
                </ol>

                <a href="{{ route('fluxo_caixa.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i>
                    Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">ID:</th>
                        <td>{{$fluxoCaixa->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo:</th>
                        <td>{{ $fluxoCaixa->tipo ?: "(blank)" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor:</th>
                        <td>{{ \App\Helpers\StringUtils::formatBRL($fluxoCaixa->valor) ?: "(blank)" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome:</th>
                        <td>{{ Str::limit($fluxoCaixa->nome, 50) ?: "(blank)"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Id User:</th>
                        <td>{{ $fluxoCaixa->user()->first()->name ?: "(blank)" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Feito Por:</th>
                        <td>{{ $fluxoCaixa->feito_por ?: "(blank)" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Desconto:</th>
                        <td>{{ \App\Helpers\StringUtils::formatBRL($fluxoCaixa->desconto) ?: "(blank)" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created at</th>
                        <td>{{Carbon\Carbon::parse($fluxoCaixa->created_at)->format('d/m/Y H:i:s')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated at</th>
                        <td>{{Carbon\Carbon::parse($fluxoCaixa->updated_at)->format('d/m/Y H:i:s')}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>

{{--            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">--}}
{{--                <a href="{{ route('fluxo_caixa.edit', $fluxoCaixa->id) }}" class="btn btn-info text-nowrap me-1"><i--}}
{{--                        class="fa fa-edit"></i> @lang('Edit')</a>--}}
{{--                <form action="{{ route('fluxo_caixa.destroy', $fluxoCaixa->id) }}" method="POST" class="m-0 p-0">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
