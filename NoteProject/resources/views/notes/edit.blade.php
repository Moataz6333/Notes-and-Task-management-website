@extends('layouts.note')
@section('title') Edit @endsection
@section('username') <a href="{{route('notes.profile')}}">@ {{$username}}</a>@endsection

@section('content')
        
        </div>
        <div class="container">
            <div class="createForm">
                <div class="FormHeader">
                    <h2>Edit note</h2>
            
                </div>
                <form action="{{route('notes.update',$note->id)}}" method="post">
                    @csrf
                    <ul>
                        <li><label for="title">Title : </label>
                    <input type="text" name="title" id="title" value="{{$note->title}}"></li>

                    <li><label for="description">Description :</label>
                    <textarea rows="5" name="description" id="description">{{$note->body}}</textarea></li>
                    <li> <label for="class">Category :</label>
                        <input type="text" name="class" id="class" value="{{$note->class}}"></li>
                        <li><label for="date">Date :</label>
                        <input type="date" name="date" id="date"></li>
                        <li><label for="time">Time :</label>
                        <input type="time" name="time" id="time"></li>
                           
                    </ul>
                    <div>
                        <div id="backDiv"><a href="{{ url()->previous() }}">Back</a></div>

                   <button type="submit">Update</button>
                    </div>
                    

                    
                </form>
            </div>
        </div>
@endsection