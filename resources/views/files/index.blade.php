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
                @forelse ($files as $file)
                    <div class="file dropdown col-lg-2">
                        <i class="fa-solid fa-folder dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <h2> {{ $file->id }}:{{ $file->name }}</h2>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('file.show', $file->id) }}"><i
                                        class="fa-solid fa-eye"></i>open</a></li>

                            <li><a class="dropdown-item" href="{{ route('file.destroy', $file->id) }}"><i
                                        class="fa-regular fa-trash-can"></i>delete</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('file.edit', $file->id) }}"><i class="fa-solid fa-file-pen"></i>update</a></li>

                            <li><a class="dropdown-item" href="{{route('file.changestatus',$file->id)}}">
                                @if ($file->status=="private")
                                <i class="fa-solid fa-lock"></i> make file public

                                @else
                               <i class="fa-solid fa-lock-open"></i>make file private


                                @endif
                               </a>
                            </li>
                        </ul>
                    </div>
                @empty
                    <h1>no data</h1>
                @endforelse

            </div>
        </div>


    </div>
@endsection
