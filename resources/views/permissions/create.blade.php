@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Permission
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('permissions.store') }}">
                            @csrf

                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                            </div>

                            <div class="col-md-6">
                                <label for="guard_name">Guard</label>
                                <input type="text" class="form-control" name="guard_name" id="guard_name">
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
