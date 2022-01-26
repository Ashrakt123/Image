<!DOCTYPE html>
<html>

<head>
    <title>IMAGES</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}"></link>
    <link rel="stylesheet" href="{{asset('/css/font-awesome.css') }}"></link>
    <link rel="stylesheet" href="{{ asset('/css/backend.css') }}"></link>
</head>

<body>
<header>
   <div ><h3 class="text-center ">{{config('app.name')}}</h3></div>
</header>
<div class="container ">
<div class="row ">



<div class="col-md-10">
  @yield('content')
</div>

</div> <!--container -->
</div> <!--row -->

   <script src="/js/bootstrap.min.js"></script>
</body>
</html>