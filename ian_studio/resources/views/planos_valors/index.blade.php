@extends('planos_valors.layout')

@section('planosValor.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','planos_valors']) }}"> Planos Valor</a>
                    </li>
                </ol>

                <form action="{{ route('planos_valor.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Planos Valor..." value="{{ request()->search }}">
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
                        <th scope="col" data-label="Plano">Plano</th>
                        <th scope="col" data-label="Período">Período</th>
                        <th scope="col" data-label="Valor">Valor</th>
                        <th scope="col" data-label="Desconto">Desconto</th>
                        <th scope="col" data-label="Vezes na Semana">Vezes na Semana</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($planosValor as $planosValores)
                        <tr>
                            <td data-label="Plano:" class="text-nowrap">
                                {{$planosValores->plano()->first()->nome}}
                            </td>
                            <td data-label="Período:" class="text-nowrap">
                                {{$planosValores->periodo}} meses
                            </td>
                            <td data-label="Valor:" class="text-nowrap">
                                {{\App\Helpers\StringUtils::formatBRL($planosValores->valor)}}
                            </td>
                            <td data-label="Desconto:" class="text-nowrap">
                                {{\App\Helpers\StringUtils::formatBRL($planosValores->desconto)}}
                            </td>
                            <td data-label="Vezes na Semana:" class="text-nowrap">
                                {{$planosValores->qnt_vezes}}X
                            </td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('planos_valor.show',  $planosValores->id)}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('planos_valor.edit', $planosValores->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form action="{{route('planos_valor.destroy', $planosValores->id)}}"
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
                {{ $planosValor->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('planos_valor.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Planos Valor')</a>
            </div>
        </div>
    </div>
@endsection
