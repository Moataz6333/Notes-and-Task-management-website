@extends('layouts.user')
@section('title') Log-in @endsection
@section('logoPic')<a href="{{route('notes.welcome')}}"> <img class="logo" src="{{asset('./images/logo.png')}}" alt="not found"></a> @endsection

@section('username')
<div class="headerBtn">
          
    <img src="./images/user.png" alt="">
    <a href="{{route('login')}}">Log-in</a>
    <span>|</span>
    <a href="{{route('user.singUp')}}">Register</a>
</div>

</div>
@endsection
@section('content')

    <!-- container -->
     <div class="container">
        <div class="loginContent">
             <div class="welcomeImage">
    <img src="{{asset('./images/freepik-new-project-20240711222742NFnS.png')}}" alt="">
            <h3>Every day is a note day...</h3>
        </div>
        <div class="loginForm">
            <h2>Welcome To Notes!</h2>

            @if (session('success'))
            <h3>{{session('success')}}</h3>
            @endif
            <form action="{{route('user.check')}}" method="post">
                @csrf
                <label for="email">Email  @if($errors->any()) <span>Invalid email or password!</span> @endif</label>
                <input type="email" name="email" id="email" value="{{old('email')}}">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <div class="rememberMe">
                    <label for="remember">Remember me :</label>
                <input type="checkbox" name="remember"id="remember">
                
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account ? / <span><a href="{{route('user.singUp')}}">Register</a></span></p> 
        </div> 
        </div>
      
     </div>
     @endsection