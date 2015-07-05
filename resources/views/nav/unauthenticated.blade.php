<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::route('home') }}">@yield('appName')</a>
    </div>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li>
                <a href="{{ URL::route('auth.login') }}"><i class="fa fa-user"></i> Login</a>
            </li>
            <li>
                <a href="{{ URL::route('auth.register') }}"><i class="fa fa-pencil"></i> Register</a>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>