<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')


    @include('includes.head') {{-- importantt this comes last so that custom.css is not overriden--}}

</head>

<body>
<div id="wrap">
    <nav class="navbar navbar-default navbar-dark yamm navbar-static-top" role="navigation" id="header">
        @include('includes.navbar')
    </nav>






    @yield('header')

    <div class="container">
        <div class="row main-content">
            <div class="col-md-12 ">
                @if (Session::has('message'))
                    <div class="flash alert-info">
                        <p class="panel-body">
                            {{ Session::get('message') }}
                        </p>
                    </div>
                @endif

                {{--Place these here since custom 404 page will always not have errors variable (this is a temp HACK)--}}
                @if(isset($errors))
                    @if ($errors->any())
                        <div class='flash alert-danger'>
                            <ul class="panel-body">
                                @foreach ( $errors->all() as $error )
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
                @yield('center')
            </div>
        </div>
    </div>

</div>


<!-- footer-widgets -->
<footer id="footer-v6" class="footer-v6">
    @include('includes.footer')
</footer>

<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>





<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>

{!! Minify::javascript("/assets/js/vendors.js") !!}
{!! Minify::javascript("/assets/js/DropdownHover.js") !!}
{!! Minify::javascript("/assets/js/app.js") !!}
{!! Minify::javascript("/assets/js/holder.js") !!}



@yield('script')
<script>
    jQuery(document).ready(function ($) {

        hljs.initHighlightingOnLoad();




    });
</script>

</body>

</html>
