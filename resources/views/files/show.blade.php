@extends('layouts.app')
<div class="showfile">
    <div class="open">
       <h1> <span><i class="fa-regular fa-folder-open"></i></span>{{$file->id}}</h1>
       <h1><span>name:</span>{{$file->name}}</h1>
       <h1> <span>file:</span>{{$file->file}}</h1>

       <h1> <span>description</span></h1>

       <p>{{$file->description}}</p>

      <a href="{{route('file.download',$file->id)}}"><button>download</button></a>
    </div>
</div>
