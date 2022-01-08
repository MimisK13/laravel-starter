@extends('layouts.app')
@section('page_title')
    {{ "Create Permission" }}
@endsection

@push('styles')
    {{--- Page Styles Here ---}}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header">
                        Create Permission
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permissions.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guard_name">Guard</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="guard_name" id="guard_name">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
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
