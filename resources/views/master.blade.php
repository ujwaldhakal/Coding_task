<html>
<head>
    <title>
        Survey 2016
    </title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    @stack('styles')
</head>
<body>
<div class="container">
    @if(Session::has('success'))
    <div class="notify">
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>

    </div>
 @endif
    <div class="row">
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="{{asset('assets/js/jquery-1.9.js')}}"></script>
@stack('scripts')
</body>
</html>