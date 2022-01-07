@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Create Role
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Role Name"
                                           value="{{ old('name') }}"
                                           aria-label="Role Name"
                                    >
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="guard_name" id="guard_name" placeholder="Guard Name"
                                           value="{{ old('guard_name') }}"
                                           aria-label="Guard Name">
                                </div>
                            </div>

                            <hr/>

                            <div class="col-lg-12">
                                @foreach($permissions as $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                                        <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <hr/>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
