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
                        Create Role
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guard_name">Role</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}"
                                           aria-label="Role Name"
                                    >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guard_name">Guard</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="guard_name" id="guard_name"
                                           value="{{ old('guard_name') }}"
                                           aria-label="Guard Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                @foreach($permissions as $permission)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                                            <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
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
