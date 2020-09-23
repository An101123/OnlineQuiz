<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
          name="viewport">
    <title>Online quiz</title>
    <!-- Favicon-->
    <link rel="icon"
          href="favicon.ico"
          type="image/x-icon">

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

    <section class="content">
        <div class="block-header align-center">
            <h2>CREATE USER</h2>
        </div>
        @if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach($errors->all() as $err)
            {{$err}}<br>
            @endforeach
        </div>
        @endif
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form class="form-horizontal"
                              id="register"
                              action="{{route('user.store')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            <input type="hidden"
                                   name="_token"
                                   value="{{csrf_token()}}" />
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="question_content">Name:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4"
                                                      id="name"
                                                      name="name"
                                                      class="form-control no-resize"
                                                      maxlength="1000"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="answer">Email:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"
                                                   id="email"
                                                   name="email"
                                                   class="form-control"
                                                   maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="answer_1">Password:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password"
                                                   id="password"
                                                   name="password"
                                                   class="form-control"
                                                   maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="answer_2">Password Confirm:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password"
                                                   id="passwordConfirm"
                                                   name="passwordConfirm"
                                                   class="form-control"
                                                   maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit"
                                            class="btn btn-success m-t-15 w-90 waves-effect">Save</button>
                                    <button type="button"
                                            class="btn btn-warning m-t-15 w-90 waves-effect">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- #END# Horizontal Layout -->
    </section>
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.validator.setDefaults({
            errorClass: "help-block",
            highlight: function(element) {
                $(element)
                    .closest('.input-group')
                    .addClass('has-error');
            }
        });
        $("#register").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                passwordConfirm: {
                    equalTo: "#password",
                    required: true,
                    minlength: 8,
                    maxlength: 32,

                }
            },
            messages: {
                password: {
                    required: "<span class='error'>Please provide a password</span>",
                    minlength: "<span class='error'>Your password must be 8 - 32 characters long</span>",
                    maxlength: "<span class='error'>Your password must be 8 - 32 characters long</span>"
                },
                email: "<span class='error'>Please enter a valid email address</span>",
                passwordConfirm: {
                    equalTo: "<span class='error'>Please enter Confirm password same as password</span>",
                    required: "<span class='error'>Please provide a password</span>",
                    minlength: "<span class='error'>Your password must be 8 - 32 characters long</span>",
                    maxlength: "<span class='error'>Your password must be 8 - 32 characters long</span>"
                },
            },
            // errorElement: 'div',
            // errorLabelContainer: '.errorTxt',

            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body>

</html>