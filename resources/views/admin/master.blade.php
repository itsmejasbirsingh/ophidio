<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href=" {{ asset('/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset( 'css/ionicons.min.css' ) }}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href=" {{ asset( 'css/morris/morris.css' ) }} " rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href=" {{ asset( 'css/jvectormap/jquery-jvectormap-1.2.2.css' ) }} " rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href=" {{ asset( 'css/fullcalendar/fullcalendar.css' ) }} " rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href=" {{ asset( 'css/daterangepicker/daterangepicker-bs3.css' ) }} " rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href=" {{ asset( 'css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ) }} " rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href=" {{ asset( 'css/AdminLTE.css' ) }} " rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
        .o-danger-border{
            border: 2px solid red;
        }
        .o-success-border{
            border: 2px solid #5cb85c;
        }
        .o-error{
            color: red;
        }
        .o-success{
            color: #5cb85c;
        }
        .update-role-form{
            display: none;
        }
        .update-role-form.active{
            display: block;
        }
        .user-role{
            display: none;
        }
        .user-role.active{
            display: block;
        }
        .activate-deactivate-user-form{
            display: inline-block;
        }
        </style>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                OphidiO
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('img/avatar3.png') }}" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('img/avatar2.png') }}" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Auth::user()->name }} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="{{ asset('img/avatar3.png') }}" class="img-circle" alt="User Image" />
                                    
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <form method="post" action="{{ route('logout') }}">
                                    {{ csrf_field() }}
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('img/avatar3.png') }}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jasbir</p>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview {{ !empty($activeTab) && $activeTab === 'users' ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                                <small class="badge pull-right bg-red" title="Inactive users">{{ ! empty( $inactive_users ) ? $inactive_users : '' }}</small>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ !empty($activeLink) && $activeLink === 'list' ? 'active' : '' }}"><a href="{{ route('listUsers') }}"><i class="fa fa-angle-double-right"></i> Users</a></li>
                                <li class="{{ !empty($activeLink) && $activeLink === 'add' ? 'active' : '' }}"><a href="{{ route('addUser') }}"><i class="fa fa-angle-double-right"></i> Add User</a></li>
                                <li class="{{ !empty($activeLink) && $activeLink === 'addRole' ? 'active' : '' }}"><a href="{{ route('addRole') }}"><i class="fa fa-angle-double-right"></i> Add Role</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{ !empty($activeTab) && $activeTab === 'products' ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-product-hunt"></i>
                                <span>Products</span>
                                
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ !empty($activeLink) && $activeLink === 'list' ? 'active' : '' }}"><a href="{{ route('listProducts') }}"><i class="fa fa-angle-double-right"></i> Products</a></li>
                                <li class="{{ !empty($activeLink) && $activeLink === 'add' ? 'active' : '' }}"><a href="{{ route('addProduct') }}"><i class="fa fa-angle-double-right"></i> Add Product</a></li>
                                <li class="{{ !empty($activeLink) && $activeLink === 'addCategory' ? 'active' : '' }}"><a href="{{ route('addCategory') }}"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview {{ !empty($activeTab) && $activeTab === 'orders' ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <span>Orders</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ !empty($activeLink) && $activeLink === 'ordersList' ? 'active' : '' }}"><a href="{{ route('ordersList') }}"><i class="fa fa-angle-double-right"></i> Orders</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Main content -->
                
            @yield('mainContent');

        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src=" {{ asset( 'js/jquery-ui-1.10.3.min.js' ) }} " type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src=" {{ asset( 'js/bootstrap.min.js' ) }} " type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src=" {{ asset( 'js/plugins/morris/morris.min.js' ) }} " type="text/javascript"></script>
        <!-- Sparkline -->
        <script src=" {{ asset( 'js/plugins/sparkline/jquery.sparkline.min.js' ) }} " type="text/javascript"></script>
        <!-- jvectormap -->
        <script src=" {{ asset( 'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ) }} " type="text/javascript"></script>
        <script src=" {{ asset( 'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ) }} " type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src=" {{ asset( 'js/plugins/fullcalendar/fullcalendar.min.js' ) }} " type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src=" {{ asset( 'js/plugins/jqueryKnob/jquery.knob.js' ) }} " type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src=" {{ asset( 'js/plugins/daterangepicker/daterangepicker.js' ) }} " type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src=" {{ asset( 'js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ) }} " type="text/javascript"></script>
        <!-- iCheck -->
        <script src=" {{ asset( 'js/plugins/iCheck/icheck.min.js' ) }} " type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src=" {{ asset( 'js/AdminLTE/app.js' ) }} " type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src=" {{ asset( 'js/AdminLTE/dashboard.js' ) }} " type="text/javascript"></script>       

    </body>
    <script type="text/javascript">

                // Make role editable.
                jQuery('.user-row .edit-user, .user-role').on('click',function(){

                    $('.update-role-form').removeClass('active');
                    $('.user-role').addClass('active');

                    $(this).closest('tr').find('.update-role-form').addClass('active');
                    $(this).closest('tr').find('.user-role').removeClass('active');

                    $(this).closest('tr').find('form input[name="role"]').focus();
                })

                // Cancel role upation.
                jQuery('.role_update_cancel').on('click',function(){

                    $(this).closest('tr').find('.update-role-form').removeClass('active');
                    $(this).closest('tr').find('.user-role').addClass('active');
                })

                // Update role.
                jQuery('.update-role-form').on('submit',function(e){

                    var form = jQuery(this);

                    var oldRole = form.closest('tr').find('.user-role').text();

                    var updatedRole = form.find('input[name="role"]').val();

                    if ( oldRole === updatedRole ) {

                        form.closest('tr').find('.user-role').addClass('active');
                        form.closest('tr').find('.update-role-form').removeClass('active');
                        return false;
                    }

                    form.find('input[type="submit"]').attr('disabled','disabled').val("Updating...");

                    form.find('.update-role-error').empty();

                    jQuery.ajax({
                        method: 'post',
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function(response){
                            
                            form.find('input[type="submit"]').removeAttr('disabled').val("Update");

                            var response = JSON.parse(response);
                  
                            if ( response.status === 1 ) {

                                form.closest('tr').find('.user-role').addClass('active').text(response.role);
                                form.closest('tr').find('.update-role-form').removeClass('active');
                                form.closest('tr').find('.role-updated-at').text(response.updated_at);
                                
                            }
                            else{
                                form.find('.update-role-error').text(response.message);
                            }
                        },
                        error: function(response) {

                            var response = JSON.parse(response.responseText);

                            var errors = [];

                            if (typeof(response.errors) === 'string') {

                                errors.push(response.errors);

                              } else {

                              $.each(response.errors, function(i, v) {

                                  $.each(v, function(x, e) {
                                      errors.push(e);
                                  });
                              });

                            }

                            if ( errors.length ) {
                                
                                form.find('.update-role-error').text(errors[0]);
                                form.find('input[type="submit"]').removeAttr('disabled').val("Update");
                            }

                        }
                    });

                    e.preventDefault();
                })

                // Activate or deactivate user.
                jQuery('.activate-deactivate-user').on('click',function(e){
                    jQuery(this).closest('form').submit();
                    e.preventDefault();
                })
    </script> 
</html>