 <div id="menubar" class="menubar-inverse ">
                <div class="menubar-fixed-panel">
                    <div>
                        <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="expanded">
                        <a href="dashboard">
                            <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
                        </a>
                    </div>

                </div>
                <div class="menubar-scroll-panel">

     <div>
     <div class="user-panel">

            @if(Auth::check())

            <div class="pull-left image">

                <img src="{{ asset( Auth::user()->photo != '' ? 'assets/img/uploads/'.Auth::user()->photo : 'assets/img/uploads/no-image.jpg') }}" class="img-circle" alt="User Image" />

            </div>

            <div class="pull-left info">

                <p> {{  Auth::user()->name }} </p>

                <a href="#"><i class="fa fa-circle text-success"></i> {{trans('application.online')}}</a>

            </div>

            @endif
     </div>


             
                    <!-- BEGIN MAIN MENU -->
                    <ul id="main-menu" class="gui-controls">

                        <!-- BEGIN DASHBOARD -->
                        <li>
                            <a href="dashboard">
                                <div class="gui-icon"><i class="md md-dashboard"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END DASHBOARD -->


                        <!-- BEGIN PRODUCT -->
                        <li>
                            <a href='home'>
                                <div class="gui-icon"><i class="md md-book"></i></div>
                                <span class="title">Home</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->


                            <!-- BEGIN PRODUCT-->
                        <li>
                            <a href='clients'>
                                <div class="gui-icon"><i class="md md-face-unlock"></i></div>
                                <span class="title">Clients</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                            <!-- BEGIN PRODUCT-->
                        <li>
                            <a href='invoices'>
                                <div class="gui-icon"><i class="md md-flip-to-back"></i></div>
                                <span class="title">Invoices</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                            <!-- BEGIN PRODUCT-->
                        <li>
                            <a href='estimates'>
                                <div class="gui-icon"><i class="md md-loyalty"></i></div>
                                <span class="title">Estimates</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                          <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='payments'>
                                <div class="gui-icon"><i class="md md-payment"></i></div>
                                <span class="title">Payments</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                            <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='expenses'>
                                <div class="gui-icon"><i class="md md-wallet-giftcard"></i></div>
                                <span class="title">Expenses</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                        <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='products'>
                                <div class="gui-icon"><i class="md md-shopping-basket"></i></div>
                                <span class="title">Products</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                           <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='reports'>
                                <div class="gui-icon"><i class="md md-store"></i></div>
                                <span class="title">Reports</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                           <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='users'>
                                <div class="gui-icon"><i class="md md-verified-user"></i></div>
                                <span class="title">Users</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->

                           <!-- BEGIN PRODUCT-->
                             <li>
                            <a href='settings/company'>
                                <div class="gui-icon"><i class="md md-settings"></i></div>
                                <span class="title">Settings</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END PRODUCT -->
                        

                        <!-- BEGIN LAYOUTS -->
                        <li>
                            <a href='builder'>
                                <div class="gui-icon"><i class="md md-business"></i></div>
                                <span class="title">Layouts</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END LAYOUTS -->

                        <li class="header">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACCOUNT MENU</li>

                         <!-- BEGIN LAYOUTS -->
                        <li>
                            <a href='logout'>
                                <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                                <span class="title">Logout</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END LAYOUTS -->

                         <!-- BEGIN LAYOUTS -->
                        <li>
                            <a href='profile'>
                                <div class="gui-icon"><i class="md md-perm-contact-cal"></i></div>
                                <span class="title">Profile</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END LAYOUTS -->

                    <div class="menubar-foot-panel">
                        <small class="no-linebreak hidden-folded">
                            <span class="opacity-75">Copyright &copy; 2016</span> <strong>Lotfar Kayes</strong>
                        </small>
                    </div>
                </div><!--end .menubar-scroll-panel-->