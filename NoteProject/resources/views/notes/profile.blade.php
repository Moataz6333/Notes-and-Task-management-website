@extends('layouts.user')
@section('title') Profile @endsection
@section('logoPic')<a href="{{route('notes.dashboard')}}"> <img class="logo" src="{{asset('./images/logo.png')}}" alt="not found"></a> @endsection

@section('username')
<div class="headerBtn">
  <a href="{{route('notes.profile')}}"><img src="{{asset('./images/user.png')}}" alt=""></a> 
   <a href="{{route('notes.profile')}}">{{$user->name}}</a>
</div>

</div>
@endsection
@section('content')

        <!-- pfile content -->
        <div class="profile-content">
            <!-- <a href="">back</a> -->
            <div class="profile-pic">
                <img src="{{asset('./images/user.png')}}" alt="">
            </div>
            <div class="info">
                <h4>UserName: <span>{{$user->name}}</span></h4>
                <h4>Email:  <span>{{$user->email}}</span></h4>
                <h4><a href="{{route('notes.history')}}">History</a></h4>
               <h4><a href="{{route('notes.changePass')}}">Change Password</a> @if (session('success'))<p>Password changed successfully!</p> @endif</h4>
                    
                <div class="profile-buttons">
                  <button id="back"> <a href="{{ route('notes.dashboard') }}">Back</a></button> 
                    <button id="logout"><a href="{{route('logout')}}">Log out</a></button>
                </div>
                
            </div>
        </div>
 @endsection