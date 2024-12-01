@extends('fluxo_caixas.layout')

@section('fluxoCaixa.content')
    <div class="container">
        <div class="d-flex flex-wrap gap-4">
            <div class="card p-4 col-lg-5 bg-success">
               <h1>RECEITAS : {{\App\Helpers\StringUtils::formatBRL($receitas)}}</h1>
            </div>
            <div class="card p-4  col-lg-5 bg-danger">
                <h1>DESPESAS : {{\App\Helpers\StringUtils::formatBRL($despesas)}}</h1>
            </div >
            <div class="card p-4  col-lg-5 bg-primary">
                <h1>LUCRO LIQUIDO : {{\App\Helpers\StringUtils::formatBRL($lucro_liquido)}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','fluxo_caixas']) }}"> Fluxo Caixa</a></li>
                </ol>

                <form action="{{ route('fluxo_caixa.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Fluxo Caixa..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive-lg table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Tipo</th>
                        <th role='columnheader'>Valor</th>
                        <th role='columnheader'>Nome</th>
                        <th role='columnheader'>Id User</th>
                        <th role='columnheader'>Feito Por</th>
                        <th role='columnheader'>Desconto</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fluxoCaixa as $fluxoCaixas)
                        <tr>
                            <td data-label="Tipo">{{ $fluxoCaixas->tipo ?: "(blank)" }}</td>
                            <td data-label="Valor">{{ \App\Helpers\StringUtils::formatBRL($fluxoCaixas->valor) ?: \App\Helpers\StringUtils::formatBRL(0) }}</td>
                            <td data-label="Nome">{{ Str::limit($fluxoCaixas->nome, 50) ?: "(blank)"}}</td>
                            <td data-label="Id User">{{ $fluxoCaixas->user()->first()->name ?: "(blank)" }}</td>
                            <td data-label="Feito Por">{{ $fluxoCaixas->feito_por ?: "(blank)" }}</td>
                            <td data-label="Desconto">{{ \App\Helpers\StringUtils::formatBRL($fluxoCaixas->desconto) ?: \App\Helpers\StringUtils::formatBRL(0) }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('fluxo_caixa.show', $fluxoCaixas->id)}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        {{--                                        <li><a class="dropdown-item"--}}
                                        {{--                                               href="{{route('fluxo_caixa.edit', $fluxoCaixas->id)}}">@lang('Edit')</a>--}}
                                        {{--                                        </li>--}}
                                        <li>
                                            <form action="{{route('fluxo_caixa.destroy',$fluxoCaixas->id)}}"
                                                  method="POST" style="display: inline;" class="m-0 p-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $fluxoCaixa->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('fluxo_caixa.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Fluxo Caixa')</a>
            </div>
        </div>
    </div>
@endsection
