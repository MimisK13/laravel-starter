@extends('layouts.app')
@section('page_title')
    {{ "Edit Permission" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header">
                        Edit Permission
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permissions.update', $permission) }}">
                            @method('PUT')
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label @error('name') text-danger @enderror"
                                       for="name">
                                    Name
                                </label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') ?: $permission->name }}"
                                           aria-describedby="name"
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

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('guard_name') is-invalid @enderror"
                                           name="guard_name"
                                           id="guard_name"
                                           value="{{ old('guard_name') ?: $permission->guard_name }}"
                                           aria-describedby="guard_name"
                                    >

                                    @error('guard_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-outline-warning " href="{{ route('permissions.index') }}">
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
