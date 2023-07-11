@extends('layouts.app')


@section('content')
    <div class="myfiles">
        @if (Session::has('done'))
            <div class="alert text-center alert-success col-lg-5">
                <p>{{ session::get('done') }}</p>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                @forelse ($file as $file)
                    <div class="file dropdown col-lg-2">

                        <i class="fa-solid fa-folder-closed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <h2> {{ $file->file_id }}:{{ $file->file_name }}</h2>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('file.showpublic', $file->file_id) }}"><i class="fa-solid fa-eye"></i>open</a></li>

                        </ul>
                    </div>
                @empty
                    <h1>no data</h1>
                @endforelse

            </div>
        </div>


    </div>
@endsection
