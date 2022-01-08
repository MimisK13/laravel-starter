@extends('layouts.app')
@section('page_title')
    {{ "Permissions" }}
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
                        <div class="row align-content-between">
                            <div class="col col-md">
                                Permissions
                            </div>

                            <div class="col col-md">
                                <a class="btn btn-sm btn-success float-end" href="{{ route('permissions.create') }}">
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
{{--                                    <th scope="col">Guard</th>--}}
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td class="col-md-1">{{ $permission->id }}</td>
                                        <td class="col-md-4">
                                            <span class="badge bg-primary">{{ $permission->name }}</span>
                                        </td>
{{--                                        <td class="col-md-2">--}}
{{--                                            <span class="badge bg-danger">{{ $permission->guard_name }}</span>--}}
{{--                                        </td>--}}
                                        <td class="col-md-3 col-lg-2">
                                            <form method="POST" action="{{ route('permissions.destroy', $permission) }}">
                                                @can('show_permission')
                                                <a class="btn btn-sm btn-outline-info" href="{{ route('permissions.show', $permission) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @endcan

                                                @can('edit_permission')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('permissions.edit', $permission) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('delete_permission')
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $permissions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--- Page Scripts Here ---}}

@endpush
