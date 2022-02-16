@extends('layouts.app')
@section('page_title')
    {{ "Create Role" }}
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
                        {{ __('Create Role') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label @error('name') text-danger @enderror"
                                       for="guard_name"
                                >
                                    {{ __('Role') }}
                                </label>

                                <div class="col-sm">
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        aria-label="Role Name"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-sm-2 col-form-label @error('guard_name') text-danger @enderror"--}}
{{--                                       for="guard_name"--}}
{{--                                >--}}
{{--                                    Guard--}}
{{--                                </label>--}}

{{--                                <div class="col-sm">--}}
{{--                                    <input type="text"--}}
{{--                                           class="form-control @error('guard_name') is-invalid @enderror"--}}
{{--                                           name="guard_name"--}}
{{--                                           id="guard_name"--}}
{{--                                           value="{{ old('guard_name') }}"--}}
{{--                                           aria-label="Guard Name"--}}
{{--                                    >--}}

{{--                                    @error('guard_name')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="row mb-3">
                                @foreach($permissions as $permission)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox"
                                                   class="form-check-input @error('permissions') is-invalid @enderror"
                                                   name="permissions[]"
                                                   id="{{ $permission->name }}"
                                                   value="{{ $permission->id }}"
                                            >

                                            <label for="{{ $permission->name }}"
                                                   class="form-check-label @error('permissions') is-invalid @enderror"
                                            >
                                                {{ $permission->name }}
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

{{--                            <div class="row mb-3">--}}
{{--                                @foreach($permissions->chunk(4) as $four)--}}
{{--                                    @foreach($four as $permission)--}}
{{--                                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">--}}
{{--                                            <div class="form-check form-check-inline">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">--}}
{{--                                                <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

                                <a class="btn btn-outline-warning " href="{{ route('roles.index') }}">
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
