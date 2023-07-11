@extends('layouts.app')

@section('content')
    <div class="form-body">
        <header class="col-lg-6">
            <h1><i class="fa-solid fa-file-pen"></i>update files</h1>
        </header>
        <div class="form-shape col-lg-6">

            <form action="{{ route('file.update',$file->id) }}"method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$file->name}}" class="form-control @error('name') is-invalid @enderror"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" value="{{$file->description}}" class="form-control @error('description') is-invalid @enderror"
                        id="exampleInputPassword1">
                    @error('description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <div class="form-group">
                    <label>file {{$file->file}}</label>
                    <input type="file" name="file" value="{{$file->file}}" class="form-control @error('file') is-invalid @enderror"
                        id="exampleInputPassword1">
                    @error('file')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <button type="submit">update</button>
            </form>

        </div>

    </div>
@endsection
