@extends('layouts.app')
@section('page_title')
    {{ "Edit Role" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('roles.update', $role) }}">
                            @method('PUT')
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guard_name">Role</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') ?: $role->name }}"
                                           aria-label="Role Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guard_name">Guard</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="guard_name" id="guard_name"
                                           value="{{ old('guard_name') ?: $role->guard_name }}"
                                           aria-label="Guard Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                @foreach($permissions as $permission => $selected)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="permissions[]"
                                                id="{{ $selected->name }}"
                                                @if($role->permissions->contains($selected->id)) checked=checked @endif
                                                value="{{ $selected->id }}"
                                            />
                                            <label class="form-check-label" for="{{ $selected->name }}">{{ $selected->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-outline-warning" href="{{ route('roles.index') }}">
                                    Cancel
                                </a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--- Page Scripts Here ---}}

@endpush
