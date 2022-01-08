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
            <div class="col-sm col-md-10 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role) }}">
                            @method('PUT')
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label @error('name') text-danger @enderror"
                                       for="guard_name">
                                    Role
                                </label>

                                <div class="col-sm">
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') ?: $role->name }}"
                                           aria-label="Role Name"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label @error('guard_name') text-danger @enderror"
                                       for="guard_name">
                                    Guard
                                </label>

                                <div class="col-sm">
                                    <input type="text"
                                           class="form-control @error('guard_name') is-invalid @enderror"
                                           name="guard_name"
                                           id="guard_name"
                                           value="{{ old('guard_name') ?: $role->guard_name }}"
                                           aria-label="Guard Name"
                                    >

                                    @error('guard_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                @foreach($permissions as $permission => $selected)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox"
                                                class="form-check-input @error('permissions') is-invalid @enderror"
                                                name="permissions[]"
                                                id="{{ $selected->name }}"
                                                @if($role->permissions->contains($selected->id)) checked=checked @endif
                                                value="{{ $selected->id }}"
                                            />

                                            <label class="form-check-label @error('permissions') is-invalid @enderror"
                                                   for="{{ $selected->name }}"
                                            >
                                                {{ $selected->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                @error('permissions')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
