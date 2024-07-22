<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{asset('./css/note.css')}}">
    <link rel="icon" src="{{asset('./images/freepik-new-project-20240711222742NFnS.png')}}" type="image/x-icon">

</head>
<body>
     <!-- header -->
     <div class="header">
  <a href="{{route('notes.dashboard')}}"> <img class="logo" src="{{asset('./images/logo.png')}}" alt="not found"></a> 
      <div class="headerButtons">
        <div class="headerBtn">
           <a href="{{route('notes.profile')}}"><img src="{{asset('./images/user.png')}}" alt=""></a> 
           @yield('username') 
        </div>
    
      </div>
        
        </div>

        @yield('content')
    </body>
    </html>