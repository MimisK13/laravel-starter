@extends('layouts.app')
@section('page_title')
    {{ "Create User" }}
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
                        Create User
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') }}"
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
                                           value="{{ old('email') }}"
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="role">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="role" id="role" aria-label="Default select example">
                                        <option disabled selected>Select User Role...</option>
                                        @foreach ($roles as $role => $name)
                                            <option value="{{ $role }}" {{ ($role == 0) ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
