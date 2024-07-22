@extends('layouts.note')
@section('title') Show @endsection
@section('username') <a href="{{route('notes.profile')}}">@ {{$username}}</a>@endsection

@section('content')

        <div class="container">
            <div class="show-note">
                <h1>Title: <span>{{$note->title}}</span></h1>
                <pre class="description">{{$note->body}}
                </pre>@if($note->deadLine != " ")
                <h3>deadLine at:  <span>{{date_format(date_create($note->deadLine),"Y/m/d  g:i a")}}</span> </h3>
                <p class="RemainingTime">Remaining Time:@if(date_diff(date_create($note->deadLine),date_create())->invert == 0) <span>Ended</span>
                   
                @else
                                     {{date_diff(date_create($note->deadLine),date_create())->d}} <span>days</span> , {{date_diff(date_create($note->deadLine),date_create())->h}} <span>h</span> and {{date_diff(date_create($note->deadLine),date_create())->i}} <span>min</span></p>

                @endif
                @endif
                

                <div class="btns">
                    <button id="back"><a href="{{ url()->previous() }}">Back</a></button>
                    <button id="edit"><a href="{{route('notes.edit',$note->id)}}">Edit</a></button>

                </div>
                
            </div>
        </div>
 @endsection