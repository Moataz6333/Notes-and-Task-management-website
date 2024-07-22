@extends('layouts.user')
@section('title') Change-Password @endsection
@section('logoPic')<a href="{{route('notes.dashboard')}}"> <img class="logo" src="{{asset('./images/logo.png')}}" alt="not found"></a> @endsection
@section('username')
<div class="headerBtn">
  <a href="{{route('notes.profile')}}"><img src="{{asset('./images/user.png')}}" alt=""></a> 
   <a href="{{route('notes.profile')}}">{{$user}}</a>
</div>

</div>
@endsection
@section('content')

        <!-- pfile content -->
        <div class="profile-content">
            <h1>Changing Password</h1>
            <div class="changingPassword">
                <form action="{{route('notes.NewPassword')}}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red"> {{$error}} </li>
                        @endforeach
                    </ul>
               
                @endif
                    <label for="oldPass">Old Password</label>
                    <input type="password" name="oldPass" id="oldPass">
                    <label for="password">New password</label>
                    <input type="password" name="password" id="password">
                    <label for="password_confirmation">Confirm new password</label>
                    <input type="password" name="password_confirmation" id="confirm">

                    <div class="btns">
                        <div id="backDiv"><a href="{{route('notes.profile')}}">Back</a></div>
                        <button type="submit">Confirm</button>
                       
                    </div>
                </form>
            </div>
        </div>
  @endsection