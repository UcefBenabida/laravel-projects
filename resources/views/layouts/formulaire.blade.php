<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
        @yield('style-links')
    

    <title>@yield('title')</title>
    
        @yield('style')
   
</head>
<body>

    <form action="@yield('action')" method="POST" id="content" >
        @csrf
        @yield('content')
    </form>

    <script>
        @yield('script')
    </script>

</body>
</html>


    