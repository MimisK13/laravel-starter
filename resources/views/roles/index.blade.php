@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-content-between">
                            <div class="col col-md">
                                Roles
                            </div>

                            <div class="col col-md">
                                <a class="btn btn-sm btn-success float-end" href="{{ route('roles.create') }}">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Guard</th>
                                        <th scope="col">Permissions</th>
        {{--                                <th scope="col">Created at</th>--}}
        {{--                                <th scope="col">Updated at</th>--}}
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td class="col-1">{{ $role->id }}</td>
                                            <td class="col-2">
                                                <span class="badge bg-primary">{{ $role->name }}</span>
                                            </td>

                                            <td class="col-1">
{{--                                                {{ $role->guard_name }}--}}
                                                <span class="badge bg-danger">{{ $role->guard_name }}</span>
                                            </td>
                                            <td>
                                                @if(!empty($role->getPermissionNames()))
                                                    @foreach($role->getPermissionNames() as $permissions)
                                                        <span class="badge bg-info">{{ $permissions }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
    {{--                                        <td>{{ $role->created_at }}</td>--}}
    {{--                                        <td>{{ $role->updated_at }}</td>--}}
                                            <td class="col-md-3 col-lg-2">
                                                <a class="btn btn-sm btn-outline-info" href="{{ route('roles.show', $role) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline-warning" href="{{ route('roles.edit', $role) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                                @method('DELETE')
                                                @csrf
                                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
{{--                                                <a class="btn btn-sm btn-outline-danger" href="{{ route('roles.destroy', $role) }}">--}}
{{--                                                        <i class="fas fa-trash"></i>--}}
{{--                                                    </a>--}}
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
