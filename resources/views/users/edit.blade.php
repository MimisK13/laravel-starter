@extends('layouts.app')
@section('page_title')
    {{ "Edit User" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm col-md-10 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        Edit User
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') ?: $user->name }}"
                                           aria-describedby="name"
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           id="email"
                                           value="{{ old('email') ?: $user->email }}"
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           id="password"
                                           value="{{ old('password') ?: $user->password }}"
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="role">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="role" id="role" aria-label="Default select example">
                                            {{--- v1 ---}}
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ ($selectedRoles[0] == $role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                            {{--- v2 ---}}
{{--                                        @foreach($roles as $role)--}}
{{--                                            @if ($selected[0] == $role->name )--}}
{{--                                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>--}}
{{--                                            @else--}}
{{--                                                <option value="{{ $role->id }}">{{ $role->name }}</option>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-outline-warning " href="{{ route('users.index') }}">
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
