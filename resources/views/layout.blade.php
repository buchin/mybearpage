<!DOCTYPE html>
<html>
    <head>
        <title>
        @section('title')
        My Bear Page
        @show
        </title>
        <link href="{{ url('app.css') }}" rel="stylesheet"></link>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ url('favicon.png') }}" type="image/png">
        @yield('head')
    </head>
    <body>
        <main>
            @yield('content')

        </main>


    <!-- Default Statcounter code for My Bear Page
    https://mybear.page -->
    <script type="text/javascript">
    var sc_project=12413536;
    var sc_invisible=1;
    var sc_security="d992373c";
    </script>
    <script type="text/javascript"
    src="https://www.statcounter.com/counter/counter.js"
    async></script>
    <noscript><div class="statcounter"><a title="Web Analytics"
    href="https://statcounter.com/" target="_blank"><img
    class="statcounter"
    src="https://c.statcounter.com/12413536/0/d992373c/1/"
    alt="Web Analytics"></a></div></noscript>
    <!-- End of Statcounter Code -->
    </body>
</html>
