@extends('layouts.user')
@section('title') Sign-Up @endsection
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
            <form action="{{route('user.store')}}" method="post">
                @csrf
              
                <label for="name">UserName @error('name') <span> UserName must be at least 3 characters</span> @enderror</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
                <label for="email">Email  @error('email') <span>email is already exists</span> @enderror</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="name@example.com">
                <label for="password">Password  @error('password') <span>password must be at least 8 characters</span> @enderror</label>
                <input type="password" name="password" id="password">
                
                <button type="submit">Sign up</button>
            </form>
            <p>Already have an account ? / <span><a href="{{route('login')}}">Log-in</a></span></p> 
        </div> 
        </div>
      
     </div>
@endsection