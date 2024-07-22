@extends('layouts.user')
@section('title') Notes @endsection
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
<!-- logoDiv -->
 <div class="logoDiv">
    <img src="{{asset('./images/freepik-new-project-20240711222742NFnS.png')}}" alt="">
    <h2>Notes has never been that easy.</h2>
 </div>
 <!-- landing Div -->
  <div class="landingDiv">
    <div class="landingText">
        <h1><span>Simple</span>,<span>fast</span> <br>
        For everyday use.</h1>
        <div class="smallImage">
            <img src="{{asset('./images/Group 96.png')}}" alt="">
        </div>
            <div>
               <p>Available for all platforms</p>   
               <div class="RegisterNow">
                <a href="{{route('user.singUp')}}">Register now</a>
               </div>
            </div>
            

    </div>
    <div class="landngImage">
        <img src="{{asset('./images/Group 96.png')}}" alt="">
    </div>
  </div>
    <!-- footer -->
     <footer>
        <h3>Contact Us:</h3>
        <div class="icon">
            <img src="{{asset('./images/linkedin (1).png')}}" alt="">
            <a href="">LinkedIn</a>
        </div>
        <div class="icon">
            <img src="{{asset('./images/github.png')}}" alt="">
           <a href="">GitHub</a>
        </div>
        <p>UI/UX Desiginer : <a href="">Muhammed Morad</a></p>
     </footer>
@endsection