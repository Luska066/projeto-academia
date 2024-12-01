@extends('objetivos.layout')

@section('objetivos.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','objetivos']) }}"> Objetivos</a></li>
                    <li class="breadcrumb-item">@lang('Objetivo') #{{$objetivo->id}}</li>
                </ol>

                <a href="{{ route('objetivos.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$objetivo->id}}</td>
    </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $objetivo->nome ?: "(blank)" }}</td>
        </tr>
            </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('objetivos.edit', compact('objetivo')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('objetivos.destroy', compact('objetivo')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
