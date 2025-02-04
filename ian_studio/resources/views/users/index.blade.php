@extends('users.layout')

@section('users.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
                </ol>

                <form action="{{ route('users.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Users..." value="{{ request()->search }}">
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
                        <th role='columnheader'>Name</th>
                        <th role='columnheader'>Email</th>
                        <th role='columnheader'>Nome</th>
                        <th role='columnheader'>Data Nascimento</th>
                        <th role='columnheader'>Idade</th>
                        <th role='columnheader'>Sexo</th>
                        <th role='columnheader'>Celular</th>
                        <th role='columnheader'>Contato Emergencia</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td data-label="Name">{{ $user->name ?: "(blank)" }}</td>
                            <td data-label="Email">{{ $user->email ?: "(blank)" }}</td>
                            <td data-label="Nome">{{ $user->nome ?: "(blank)" }}</td>
                            <td data-label="Data Nascimento">{{ $user->data_nascimento ?: "(blank)" }}</td>
                            <td data-label="Idade">{{ $user->idade ?: "(blank)" }}</td>
                            <td data-label="Sexo">{{ $user->sexo ?: "(blank)" }}</td>
                            <td data-label="Celular">{{ $user->celular ?: "(blank)" }}</td>
                            <td data-label="Contato Emergencia">{{ $user->contato_emergencia ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('users.show', compact('user'))}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('users.edit', compact('user'))}}">@lang('Edit')</a></li>
                                        <li>
                                            <form action="{{route('users.destroy', compact('user'))}}" method="POST"
                                                  style="display: inline;" class="m-0 p-0">
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

                {{ $users->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('users.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new User')</a>
            </div>
        </div>
    </div>
@endsection
