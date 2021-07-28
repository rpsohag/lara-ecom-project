<link rel="icon" type="image/png" href="{{ asset('frontend/images/icons/favicon.png') }}">

<script>
    WebFontConfig = {
        google: { families: [ 'Poppins:400,500,600,700,800' ] }
    };
    ( function ( d ) {
        var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
        wf.src = '../frontend/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore( wf, s );
    } )( document );
</script>



<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animate/animate.min.css') }}">

<!-- Plugins CSS File -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/magnific-popup/magnific-popup.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.css') }}">

<!-- Main CSS File -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/demo22.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- Main CSS File -->
    @yield('style_css')
    
