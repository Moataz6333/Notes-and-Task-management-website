@extends('layouts.note')
@section('title') Create @endsection
@section('username') <a href="{{route('notes.profile')}}">@ {{$username}}</a>@endsection

@section('content')
        <div class="container">
            <div class="createForm">
                <div class="FormHeader">
                    <h2>Adding new note</h2>
            
                </div>
                <form action="{{route('notes.store')}}" method="POST">
                    @csrf
                    <ul>
                        <li><label for="title">Title :</label>
                    <input type="text" name="title" id="title"></li>

                    <li><label for="description">Description :</label>
                    <textarea rows="5" name="description" id="description"></textarea></li>
                    <li> <label for="class">Category :</label>
                        <input type="text" name="class" id="class" placeholder="Optional"></li>
                        <li><label for="date">Date :</label>
                        <input type="date" name="date" id="date"></li>
                        <li><label for="time">Time :</label>
                        <input type="time" name="time" id="time"></li>
                           
                    </ul>
                    <div>
                        <div id="backDiv"><a href="{{route('notes.dashboard')}}">Back</a></div>
                   <button type="submit">Create</button>
                    </div>
                    

                    
                </form>
            </div>
        </div>
  @endsection