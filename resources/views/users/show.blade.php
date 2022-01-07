@extends('layouts.app')
@section('page_title')
    {{ "Show User" }}
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
                        {{ $user->name }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Guard</td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created</td>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Updated</td>
                                    <td>
                                        {{ $user->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Roles
                                    </td>
                                    <td>
                                        @foreach($roles as $role)
                                            <span class="badge bg-success">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permissions</td>
                                    <td>
                                        @foreach($permissions as $permission)
                                            <a href="{{ route('permissions.show', $permission) }}">
                                               <span class="badge bg-primary">
                                                   {{ $permission->name }}
                                               </span>
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">
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
