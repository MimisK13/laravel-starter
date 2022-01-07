@extends('layouts.app')
@section('page_title')
    {{ "Show Role" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $role->name }}
                        <span class="badge bg-info">{{ $permissions->count() }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <tbody>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guard</td>
                                    <td>
                                        <span class="badge bg-danger">{{ $role->guard_name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created</td>
                                    <td>
                                        {{ $role->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Updated</td>
                                    <td>
                                        {{ $role->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Permissions
                                    </td>
                                    <td>
                                        @foreach($permissions as $permission)
                                            <span class="badge bg-primary">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Users</td>
                                    <td>
                                        @foreach($users as $user)
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('users.show', $user) }}">
                                                        {{ $user->name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-warning" href="{{ route('roles.edit', $role) }}">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--- Page Scripts Here ---}}

@endpush
