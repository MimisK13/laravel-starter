@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Create Role Permission
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('permissions.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                            </div>

                            <div class="form-group">
                                <label for="guard_name">Guard Name</label>
                                <input type="text" class="form-control" name="guard_name" id="guard_name">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
