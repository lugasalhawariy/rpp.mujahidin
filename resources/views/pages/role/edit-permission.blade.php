@extends('layouts.backend')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">Edit Role {{ $data->name }}</h4>
            </div>
            <div class="panel-body">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{ session('message') }}
                    </div>
                @endif
                {{-- form create rpp --}}
                <form action="{{ route('update.permission', $data->id) }}" class="container" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-sm-10 col-md-6">
                                    @foreach ($permissions as $value)
                                    <div class="row">
                                        <input type="checkbox" {{ $data->permissions()->find($value->id) ? "checked" : "" }} value="{{ $value->id }}" name="permissions[]" class="w-4 h-4 text-green-500 form-checkbox">
                                        <span class="ml-3 text-sm">{{ $value->name }}</span>
                                    </div>
                                    @endforeach
                                    @error('permissions')
                                        <small class="mt-2 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection