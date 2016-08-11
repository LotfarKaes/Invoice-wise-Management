
 <!-- 
Contributors: Lotfar Kaes
 -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{get_company_name()}}</title>
  
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">



    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>

         <link href="{{ asset('mdassets/css/theme-default/bootstrap.css?1422792965') }}" rel="stylesheet" type="text/css" />

         <link href="{{ asset('mdassets/css/theme-default/materialadmin.css?1425466319') }}" rel="stylesheet" type="text/css" />

         <link href="{{ asset('mdassets/css/theme-default/font-awesome.min.css?1422529194') }}" rel="stylesheet" type="text/css" />

         <link href="{{ asset('mdassets/css/theme-default/material-design-iconic-font.min.css?1421434286') }}" rel="stylesheet" type="text/css" />

          <link href="{{ asset('mdassets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967') }}" rel="stylesheet" type="text/css" />

         <link href="{{ asset('mdassets/css/theme-default/libs/morris/morris.core.css?1420463396') }}" rel="stylesheet" type="text/css" />




     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href='http://fonts.googleapis.com/css?family=Ruda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins-->
    <link href="{{ asset('assets/css/theme-skin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/chosen/chosen.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/animsition/css/animsition.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
  <body class="menubar-hoverable header-fixed menubar-pin ">

     <!-- BEGIN HEADER-->
     <!-- BEGIN HEADER-->
        <header id="header" >
            <div class="headerbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <a href="../../html/dashboards/dashboard.html">
                                    <span class="text-lg text-bold text-primary">KAYES ADMIN</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">
                    <ul class="header-nav header-nav-options">
                        <li>
                            <!-- Search form -->
                            <form class="navbar-search" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                                </div>
                                <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                                <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                            </a>
                         
                                                 </li><!--end .dropdown -->
                        <li class="dropdown hidden-xs">
                            <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                                <i class="fa fa-area-chart"></i>
                            </a>
                      
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                    </ul><!--end .header-nav-options -->
                    <ul class="header-nav header-nav-profile">
          

                       
 <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

                         <li class="dropdown">
        <?php
            if(Session::has('applocale')){
                $current_lang = get_current_language(Session::get('applocale'));
                if(!$current_lang){
                    $current_lang = get_current_language(App::getLocale());
                }
            }

            else
                $current_lang = get_current_language(App::getLocale());

                $current_flag = $current_lang->flag != '' ? $current_lang->flag : 'placeholder_Flag.jpg';
        ?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/flags/'.$current_flag) }}" class="language-img">{{ $current_lang->locale_name }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <?php $languages = get_languages(); ?>
            @foreach($languages as $language)
                @if ($language->short_name != $current_lang->short_name)
                    <?php $flag = $language->flag != '' ? $language->flag : 'placeholder_Flag.jpg'; ?>
                <li>
                    <a rel="alternate" href="{{ url('lang', $language->short_name) }}">
                        <img src="{{ asset('assets/img/flags/'.$flag) }}" class="language-img">{{ $language->locale_name }}
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
    </li>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if(Auth::check())
        <img src="{{ asset( Auth::user()->photo != '' ? 'assets/img/uploads/'.Auth::user()->photo : 'assets/img/uploads/no-image.jpg') }}" class="user-image" alt="User Image"/>
        
        <span class="profile-info">
                 <span class="hidden-xs"> {{  Auth::user()->name }}               
                                    <small>Administrator</small>
                                </span>
         </span>
        @endif
        <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            @if(Auth::check())
            <img src="{{ asset( Auth::user()->photo != '' ? 'assets/img/uploads/'.Auth::user()->photo : 'assets/img/uploads/no-image.jpg') }}" class="img-circle" alt="User Image" />
            <p>{{  Auth::user()->name }} </p>
            @endif
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ url('profile') }}" class="btn btn-primary btn-sm btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="{{ url('/auth/logout') }}" class="btn btn-danger btn-sm btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
    
</ul>
</div>
</nav>






                </div><!--end #header-navbar-collapse -->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- END HEADER-->



            <!-- BEGIN OFFCANVAS LEFT -->
          

        <!-- END HEADER-->
  
             <!-- BEGIN Side Navifation exist on navigation.blade page -->
                @include('navigation')
             <!-- END Navigation -->

                </div><!--end .menubar-scroll-panel-->
            </div><!--end #menubar-->
            <!-- END MENUBAR -->
            <!-- END MENUBAR -->

            <!-- BEGIN OFFCANVAS RIGHT -->
    

 <!-- BEGIN BASE-->
        <div id="base">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
       

                <!-- BEGIN BLANK SECTION -->

            @yield('content')
              

                <!-- BEGIN BLANK SECTION -->
            </div><!--end #content-->
            <!-- END CONTENT -->






            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS RIGHT -->

        </div><!--end #base-->
        <!-- END BASE -->

<!-- jQuery 2.1.3 -->
        <script src="{{ asset('mdassets/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/bootstrap/bootstrap.min.js') }}"></script>    
        <script src="{{ asset('mdassets/js/libs/spin.js/spin.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/autosize/jquery.autosize.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/jquery.flot.time.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/flot/curvedLines.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/jquery-knob/jquery.knob.min.js') }}"></script>    
        <script src="{{ asset('mdassets/js/libs/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/d3/d3.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/d3/d3.v3.js') }}"></script>
        <script src="{{ asset('mdassets/js/libs/rickshaw/rickshaw.min.js') }}"></script>
        <script src="{{ asset('mdassets/js/core/source/App.js') }}"></script>
        <script src="{{ asset('mdassets/assets/js/core/source/AppOffcanvas.js') }}"></script>
        <script src="{{ asset('mdassets/js/core/source/AppNavigation.js') }}"></script>
        <script src="{{ asset('mdassets/assets/js/core/source/AppCard.js') }}"></script>
        <script src="{{ asset('mdassets/js/core/source/AppForm.js') }}"></script>
        <script src="{{ asset('mdassets/js/core/source/AppNavSearch.js') }}"></script>
        <script src="{{ asset('mdassets/js/core/demo/Demo.js') }}"></script>    
        <script src="{{ asset('mdassets/js/core/demo/DemoDashboard.js') }}"></script>





        </div><!-- /.content-wrapper -->
    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap Dialog -->
<script src="{{ asset('assets/js/bootstrap-dialog.js') }}"></script>
<!-- Jquery Datatables -->
<script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<!-- Pace.js -->
<script src="{{ asset('assets/js/pace.min.js') }}"></script>
<!-- summernote.js javascript -->
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- datepicker.js javascript-->
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- chosen.js javascript-->
<script src="{{ asset('assets/plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('assets/plugins/animsition/js/jquery.animsition.min.js') }}" type="text/javascript"></script>
<!-- validator.js javascript-->
<script src="{{ asset('assets/js/validator.min.js') }}"></script>
<!-- toastr.js javascript-->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- custom.js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>


@yield('scripts')
@include('common.common_js')


@if (Session::has('flash_notification.level'))
    <?php $message_type = Session::get('flash_notification.level'); ?>
    @if($message_type == 'success')
        <script>
            $(document).ready(function() {
                toastr.options = {"positionClass": "toast-bottom-right"}
                toastr.success('{{ Session::get('flash_notification.message') }}', '{{ ucfirst(Session::get('flash_notification.level')) }}');
            });
        </script>
    @elseif($message_type == 'danger')
        <script>
            $(document).ready(function() {
                toastr.options = {"positionClass": "toast-bottom-right"}
                toastr.error('{{ Session::get('flash_notification.message') }}', '{{ ucfirst(Session::get('flash_notification.level')) }}');
            });
        </script>
    @endif
@endif



</body>
</html>