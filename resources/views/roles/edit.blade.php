@extends('layouts.app')

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

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Role Name"
                                           value="{{ old('name') ?: $role->name }}"
                                           aria-label="Role Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="guard_name" id="guard_name" placeholder="Guard Name"
                                           value="{{ old('guard_name') ?: $role->guard_name }}"
                                           aria-label="Guard Name">
                                </div>
                            </div>

                            <hr/>

                            <div class="col-lg-12">

                                @foreach($permissions as $permission => $selected)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="permissions[]"
                                                id="{{ $selected->name }}"
                                                @if($role->permissions->contains($selected->id)) checked=checked @endif
                                                value="{{ $selected->id }}"
                                            />
                                            <label class="form-check-label" for="{{ $selected->name }}">{{ $selected->name }}</label>
                                        </div>
                                @endforeach
                            </div>

                            <hr/>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
