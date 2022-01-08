@extends('layouts.app')
@section('page_title')
    {{ "Show Permission" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">
                        {{ $permission->name }}
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <tbody>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $permission->name }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guard</td>
                                    <td>
                                        <span class="badge bg-danger">
                                            {{ $permission->guard_name }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created</td>
                                    <td>
                                        {{ $permission->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Updated</td>
                                    <td>
                                        {{ $permission->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Roles
                                    </td>
                                    <td>
                                        @foreach($roles as $role)
                                            <span class="badge bg-primary">
                                                {{ $role }}
                                            </span>
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
                        <a class="btn btn-outline-warning float-sm-start float-md-end" href="{{ route('permissions.edit', $permission) }}">
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
