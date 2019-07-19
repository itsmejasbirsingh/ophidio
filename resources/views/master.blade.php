<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Ophidio</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Baggage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href=" {{ asset('/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
    <div class="main-sec" style="min-height: 0">
        <!-- //header -->
        <header class="py-sm-3 pt-3 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1> <a href="/"><span class="log-w3pvt">O</span>phidio</a> </h1>
                    </div>

                    
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/cart">Cart</a><span class="cart-count">{{ Cart::count() }}</span></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        </ul>
                    </nav>
                    <nav class="user-login-nav">
                        <ul>
                        @if( Auth::check() )

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>Hi, {{ Auth::user()->name }} <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div>
                                            <a href="{{ route('userProfile') }}" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                    </li>

                                    <li class="user-footer">
                                        <div>
                                            <a href="{{ route('userOrders') }}" class="btn btn-default btn-flat">My orders</a>
                                        </div>
                                    </li>

                                    <li class="user-footer"> 
                                        <div>
                                            <form method="post" action="{{ route('logout') }}">
                                            {{ csrf_field() }}
                                                <input type="submit" value="Sign out" class="btn btn-danger">
                                            </form>
                                        </div>   
                                    </li>
                                </ul>
                            </li>

                        @else
                        
                        <li>
                            <a href="{{ route('checkout') }}">Login</a>
                        </li>    

                        @endif
                            
                        </ul>
                    </nav>
                    <!-- //nav -->
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        
    </div>

@yield('content')
   
    <div class="footer_agileinfo_topf py-5 footer">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-3 footer_wthree_gridf mt-lg-5">
                    <h2><a href="index.html"><span>O</span>phidio
                        </a> </h2>
                    <label class="sub-des2">Online Store</label>
                </div>
                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-4">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="index.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="about.html"><span class="fa fa-angle-right" aria-hidden="true"></span> About</a>
                        </li>
                        <li>
                            <a href="shop.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Shop</a>
                        </li>
                        <li>
                            <a href="shop.html"><span class="fa fa-angle-right" aria-hidden="true"></span>Collections</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-sm-4 mt-3">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="single.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Extra Page</a>
                        </li>

                        <li>
                            <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="single.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Shop Single</a>
                        </li>
                        <li>
                            <a href="contact.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-sm-4 mt-3">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="login.html"><span class="fa fa-angle-right" aria-hidden="true"></span> Login </a>
                        </li>

                        <li>
                            <a href="register.html"><span class="fa fa-angle-right" aria-hidden="true"></span>Register</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span>Privacy & Policy</a>
                        </li>

                    </ul>
                </div>
            </div>

           
           
        </div>
    </div>
    <!-- //footer -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

</body>

</html>

@yield('extra-js')

<style type="text/css">
	.footer{
        clear: both;
        position: relative;
        height: 200px;
        margin-top: 200px;
    }
    .cart-count{
        color: red !important;
        font-size: 30px;
        margin-left: -10px;
        border-radius: 50%;
        background: #fff;
        padding: 10px;
    }

    .container.content{
        padding: 100px
    }

    .user-login-nav{
        float: right;
    }
</style>