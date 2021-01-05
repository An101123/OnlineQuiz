<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
          name="viewport">
    <title>Online quiz</title>
    <!-- Favicon-->

    <link rel="shortcut icon"
          type="images-icon"
          href="{{url('images/logo.png')}}" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext"
          rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet"
          type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('plugins/bootstrap/css/bootstrap.css')}}"
          rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('plugins/node-waves/waves.css')}}"
          rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('plugins/animate-css/animate.css')}}"
          rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('css/style.css')}}"
          rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('css/themes/theme-green.css')}}"
          rel="stylesheet" />

    <link href="{{url('css/custom.css')}}"
          rel="stylesheet">

    <!-- <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text"
               placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <ul>
        <!-- /.dropdown -->

        <!-- /.dropdown -->
    </ul>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);"
                   class="navbar-toggle collapsed"
                   data-toggle="collapse"
                   data-target="#navbar-collapse"
                   aria-expanded="false"></a>
                <a href="javascript:void(0);"
                   class="bars"></a>
                <a class="navbar-brand"
                   href="index.html"></a>
            </div>
            <div class="collapse navbar-collapse"
                 id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);"
                           class="js-search"
                           data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar"
               class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li>
                        <a href="index.html">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <span>Question management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('question.index')}}">Question list</a>
                            </li>
                            <li>
                                <a href="{{route('question.create')}}">Create question</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <span>Test management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('test.index')}}">Test list</a>
                            </li>
                            <li>
                                <a href="{{route('test.create')}}">Create test</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <span>Test Type management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('testtype.index')}}">Test Type list</a>
                            </li>
                            <li>
                                <a href="{{route('testtype.create')}}">Create test type</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);"
                           class="menu-toggle">
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('user.index')}}">User list</a>
                            </li>
                            <li>
                                <a href="{{route('user.create')}}">Create User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle"
                           data-toggle="dropdown"
                           href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            @if(Auth::user())
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                            @endif
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">abc123</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="{{url('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('plugins/node-waves/waves.js')}}"></script> -->

    <!-- Custom Js -->
    <script src="{{url('js/admin.js')}}"></script>

</body>

</html>