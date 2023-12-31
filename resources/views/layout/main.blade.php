@extends('../layout/base')

@section('body')
    <body class="app loading">
        <div id="app">
            @yield('content')
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ mix('dist/js/libs.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
@endsection