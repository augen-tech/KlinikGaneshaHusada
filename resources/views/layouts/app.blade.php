
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('material/images/favicon.png') }}">
    <title>Klinik Ganesha Husada</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('material/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('style')
    <!-- Custom CSS -->
    <link href="{{ asset('material/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('material/css/colors/megna.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('material/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('material/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="{{ asset('material/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{ asset('material/images/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="{{ asset('material/images/big/img1.jpg') }}" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{ asset('material/images/big/img2.jpg') }}" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{ asset('material/images/big/img3.jpg') }}" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('material/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('material/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('material/images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('material/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset(Sentinel::getUser()->image) }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset(Sentinel::getUser()->image) }}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ Sentinel::getUser()->username }}</h4>
                                                <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();"><i class="fa fa-power-off"></i> Logout
                                            <form action="{{ route('postLogout') }}" method="POST">
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-id"></i> Indonesia</a></div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{ asset('material/images/background/user-info.jpg') }}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{ asset(Sentinel::getUser()->image) }}" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Sentinel::getUser()->name }}<span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    @if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">SUPERADMIN</li>
                            <li>
                                <a href="{{ route('superAdmin.dashboard') }}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.admin.create') }}">Add Admin</a></li>
                                    <li><a href="{{ route('superAdmin.admin.list') }}">List Admin</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Doctor</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.doctor.create') }}">Add Doctor</a></li>
                                    <li><a href="{{ route('superAdmin.doctor.list') }}">List Doctor</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Midwife</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.midwife.create') }}">Add Midwife</a></li>
                                    <li><a href="{{ route('superAdmin.midwife.list') }}">List Midwife</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Health Analyst</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.healthAnalyst.create') }}">Add Health Analyst</a></li>
                                    <li><a href="{{ route('superAdmin.healthAnalyst.list') }}">List Health Analyst</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pharmacist</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.pharmacist.create') }}">Add Pharmacist</a></li>
                                    <li><a href="{{ route('superAdmin.pharmacist.list') }}">List Pharmacist</a></li>
                                </ul>
                            </li>
                        </ul>
                    @elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">Admin</li>
                            <!-- <li>
                                <a href="{{ route('admin.dashboard')}}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Dashboard</span></a>
                            </li> -->
                            <li>
								<a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Registrasi</span></a>
								<ul aria-expanded="false" class="collapse">
									<li><a href="{{ route('admin.registration.create')}}">Tambah Registrasi</a></li>
									<li><a href="{{ route('admin.registration.list')}}"> Daftar Registrasi Pasien</a></li>
                                        
								</ul>
							</li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pasien</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a class="has-arrow " href="#" aria-expanded="false"><span class="hide-menu">Tambahkan Pasien</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.patient.createchild')}}">Anak</a></li>
                                        <li><a href="{{ route('admin.patient.createadult')}}">Dewasa</a></li>
                                        </ul>
                                    </li>
                                    <li>
        
                                    <li>
                                        <a class="has-arrow " href="#" aria-expanded="false"><span class="hide-menu">Daftar Pasien</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.patient.listchild')}}">Daftar Pasien Anak</a></li>
                                        <li><a href="{{ route('admin.patient.listadult')}}">Daftar Pasien Dewasa</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                            <li>
								<a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Rujukan</span></a>
								<ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('admin.reference.list')}}">Daftar Rujukan</a></li>
                                        
								</ul>
							</li>
                            
                            <li>
                                {{--  <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>  --}}
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="javascript:void(0)">item 1.1</a></li>
                                    <li><a href="javascript:void(0)">item 1.2</a></li>
                                    <li>
                                        <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">item 1.4</a></li>
                                </ul>
                            </li>
                        </ul>
                    @elseif(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">DOCTOR</li>
                            <li>
                                <a href="{{ route('doctor.dashboard')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Diagnosis</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('doctor.diagnosis.add')}}"> Add Diagnosis by Photo</a></li>
                                    <li><a href="{{ route('doctor.diagnosis.add1')}}"> Add Diagnosis by System</a></li>
                                    <li><a href="{{ route('doctor.diagnosis.list')}}">Daftar Diagnosis</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Rujukan</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('doctor.reference.add')}}">Tambah Rujukan</a></li>
                                    <li><a href="{{ route('doctor.reference.list')}}">Daftar Rujukan</a></li>
                                </ul>
                            </li>
                            
                            @php ($onPatientList = 0)
                            <li>
                                <a href="{{ route('doctor.listHA',$onPatientList)}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Daftar Hasil Lab</span></a>
                            </li>
                            
                            
                            {{-- <li>
                                <a href="{{ route('doctor.patient.list')}}" aria-expanded="false"><i class="fa fa-wheelchair"></i><span class="hide-menu">Patients</span></a>
                            </li> --}}
                            
                        </ul>
                    @elseif(Sentinel::getUser()->roles()->first()->slug == 'midwife')
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">MIDWIFE</li>
                        <li>
                            <a href="{{ route('midwife.dashboard')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Diagnosis</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('midwife.diagnosis.add')}}"> Add Diagnosis by Photo</a></li>
                                <li><a href="{{ route('midwife.diagnosis.add1')}}"> Add Diagnosis by System</a></li>
                                <li><a href="{{ route('midwife.diagnosis.list')}}">List Diagnosis</a></li>
                            </ul>
                        </li>
                        
                        {{-- <li>
                            <a href="{{ route('midwife.patient.list')}}" aria-expanded="false"><i class="fa fa-wheelchair"></i><span class="hide-menu">Patients</span></a>
                        </li> --}}
                        <li>
                            <a href="#" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Rujukan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('midwife.reference.add')}}">Tambah Rujukan</a></li>
                                <li><a href="{{ route('midwife.reference.list')}}">Daftar Rujukan</a></li>
                            </ul>
                        </li>
                        
                        @php ($onPatientList = 0)
                        <li>
                            <a href="{{ route('midwife.listHA',$onPatientList)}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Daftar Hasil Lab</span></a>
                        </li>
                    </ul>
                    @elseif(Sentinel::getUser()->roles()->first()->slug == 'healthAnalyst')
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">HEALTH ANALYST</li>
                            {{-- <li>
                                <a href="{{ route('healthAnalyst.dashboard')}}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                            </li> --}}
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Hasil Lab</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    @php ($onPatientList = 0)
                                    <li><a href="{{ route('healthAnalyst.resultLab.create')}}">Tambah Hasil Lab</a></li>
                                    <li><a href="{{ route('healthAnalyst.resultLab.list',$onPatientList)}}">Daftar Hasil Lab</a></li>
                                </ul>
                            </li>
                            <li>
                                @php ($onPatientList = 1)
                                <a  href="{{ route('healthAnalyst.resultLab.list',$onPatientList)}}"><i class="fa fa-address-book-o"></i>Pasien</a>
                                {{-- <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Patient</span></a>
                                <ul aria-expanded="false" class="collapse">                                    
                                    @php ($onPatientList = 1)
                                    <li><a href="{{ route('healthAnalyst.resultLab.list',$onPatientList)}}">List Patients</a></li>
                                </ul> --}}
                            </li>
                            
                            
                            <li>
                                {{--  <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>  --}}
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="javascript:void(0)">item 1.1</a></li>
                                    <li><a href="javascript:void(0)">item 1.2</a></li>
                                    <li>
                                        <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                            <li><a href="javascript:void(0)">item 1.3.4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">item 1.4</a></li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">Apoteker</li>
                            <li>
                                <a href="{{route('pharmacist.dashboard')}}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-heartbeat"></i><span class="hide-menu">Diagnosis</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{route('pharmacist.diagnosis.update')}}">Perbarui Diagnosis</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">Resep</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{route('pharmacist.prescription.confirm')}}">Konfirmasi Resep</a></li>
                                    <li><a href="{{route('pharmacist.prescription.list')}}">Daftar Resep</a></li>
                                </ul>
                                {{-- <a href="{{route('pharmacist.receipt.list')}}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Prescription</span></a> --}}
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Obat</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{route('pharmacist.medicine.add')}}">Tambah Obat</a></li>
                                    <li><a href="{{ route('pharmacist.medicine.list')}}">Daftar Obat</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('breadcumb')
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Tekindo.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('material/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('material/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('material/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('material/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('material/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('material/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('material/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('material/js/custom.min.js') }}"></script>
    @yield('script')
</body>

</html>