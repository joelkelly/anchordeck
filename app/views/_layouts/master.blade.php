<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            @section('title')
                AnchorDeck
            @show
        </title>
        <meta name="description" content="At Positive Motion, our passion is helping people get healthy and feel better. We accomplish this everyday using the latest chiropractic techniques. Some chiropractors want to see their patients 3x/week for months on end. Not us. We want to get you feeling better in the least number of visits so that you can enjoy your life pain-free.">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/_assets/css/style.css">

        <script src="/_assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="home">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <div class="header-container">
            @include('_layouts.shared.header')
        </div>

        <div class="main-container">
                @yield('content')
        </div>

        <div class="footer-container">
            @include('_layouts.shared.footer')
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/_assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="/_assets/js/main.min.js"></script>

        <script>
            var _gaq=[['_setAccount','XXXXXXXXX'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>