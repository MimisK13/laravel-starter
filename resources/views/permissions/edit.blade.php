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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Permission
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('permissions.update', $permission) }}">
                            @method('PUT')
                            @csrf

                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') ?: $permission->name }}"
                                       aria-describedby="name"
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="guard_name">Guard</label>
                                <input type="text"
                                       class="form-control"
                                       name="guard_name"
                                       id="guard_name"
                                       value="{{ old('guard_name') ?: $permission->guard_name }}"
                                >
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
