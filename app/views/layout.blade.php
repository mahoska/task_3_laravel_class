<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title>Task third</title>
    
  
    <link href="{{asset('css/basicelement.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/script.js')}}" type="text/javascript"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar">

@section('head')
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header nav">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-lg fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="http://psd-html-css.ru/">
                <span class="small"> Borrowed from </span> <span class="light">CODE</span>DESIGN
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a class="page-scroll" href="{{asset('/')}}">Link</a>
                </li>
               

                @yield('authName')
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@show

<div class="intro" id="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="brand-heading">@yield('header_content')</h2>
                     @yield('content') 
                </div>
            </div>
            
           
        </div>
    </div>
</div>
<div class="container">
    <div class="footer">
        @section('footer')
        Copyright, 2017
        @show
    </div>
</div>
</div>
 </body>
</html>        
        
        
        
        
        
        
        
      
  