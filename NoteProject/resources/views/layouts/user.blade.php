<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title> 
   
    <link rel="stylesheet" href="{{asset('./css/user.css')}}">
    <link rel="icon" src="{{asset('./images/freepik-new-project-20240711222742NFnS.png')}}" type="image/x-icon">
</head>
<body>
    <!-- header -->
    <div class="header">
    @yield('logoPic')  
             @yield('username')
        

        @yield('content')

</body>
</html>