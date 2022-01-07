@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Create User
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="roles" id="roles">

                                    <option>Select Item</option>

                                    @foreach ($roles as $key => $value)

                                        <option value="{{ $key }}" {{ ( $key == 1) ? 'selected' : '' }}>

                                            {{ $value }}

                                        </option>

                                    @endforeach

                                </select>
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
