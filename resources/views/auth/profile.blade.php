@extends('layouts.app')
@section('content')
    <div class="profile-info col-lg-10">

        <div class="cover">

        </div>
        <div class="info">
            <div class="container-fluid">
                <div class="row">
                    <div class="img">
                        <img src="{{ asset('profilee') .'/'. Auth::user()->img }}" alt="">

                        <i class="fa-solid fa-camera" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

                    </div>
                    <div class="personal col-lg-4">
                        <h1>{{ Auth::user()->name }}</h1>
                        <h3>{{ Auth::user()->email }}</h3>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title fs-5" id="exampleModalLabel">update profile picture</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.updateimg',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="file" type="file">
                                <button>upload</button>

                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
