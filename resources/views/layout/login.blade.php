@extends('../layout/base')

@section('body')
    <body class="login loading">
        <div id="app">
            @yield('content')
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ mix('dist/js/libs.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
@endsection