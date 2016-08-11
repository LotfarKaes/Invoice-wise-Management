

@extends ('master')

   @section('content')
        <!-- BEGIN BASE-->
       

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
         
            <div id="content">
                <section>
                    <div class="section-body">
                        <div class="row">

                            <!-- BEGIN ALERT - REVENUE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-info no-margin">
                                            <strong class="pull-right text-success text-lg">0,38% <i class="md md-trending-up"></i></strong>
                                            <strong class="text-xl">2</strong><br/>
                                            <span class="opacity-50">CLIENT</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - REVENUE -->

                            <!-- BEGIN ALERT - VISITS -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-warning no-margin">
                                            <strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
                                            <strong class="text-xl">3</strong><br/>
                                            <span class="opacity-50">INVOICE</span>
                                            <div class="stick-bottom-right">
                                                <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - VISITS -->

                            <!-- BEGIN ALERT - BOUNCE RATES -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-danger no-margin">
                                            <strong class="pull-right text-danger text-lg">0,00% <i class="md md-trending-down"></i></strong>
                                            <strong class="text-xl">0</strong><br/>
                                            <span class="opacity-50">ESTAMATE</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - BOUNCE RATES -->

                            <!-- BEGIN ALERT - TIME ON SITE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-success no-margin">
                                            <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
                                            <strong class="text-xl">11.</strong><br/>
                                            <span class="opacity-50">PRODUCT</span>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - TIME ON SITE -->

                        </div><!--end .row -->
                        <div class="row">

                            <!-- BEGIN SITE ACTIVITY -->
                            <div class="col-md-9">
                                <div class="card ">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-head">
                                                <header>Yearly Overview</header>
                                            </div><!--end .card-head -->
                                            <div class="card-body height-8">
                                                <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding"></div>
                                                <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                            </div><!--end .card-body -->
                                        </div><!--end .col -->
                                        <div class="col-md-4">
                                            <div class="card-head">
                                                <header>Today's Overview</header>
                                            </div>
                                            <div class="card-body height-8">
                                                <strong>2</strong> Clients
                                                <span class="pull-right text-success text-sm">0,38% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                                </div>
                                                3 Invoice
                                                <span class="pull-right text-success text-sm">0,01% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                                </div>
                                                0 Estamate
                                                <span class="pull-right text-danger text-sm">00,00% <i class="md md-trending-down"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                                </div>
                                                11 Product
                                                <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                                </div>
                                                Result
                                                <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:47%"></div>
                                                </div>
                                            </div><!--end .card-body -->
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END SITE ACTIVITY -->

                            <!-- BEGIN SERVER STATUS -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="text-primary">Overall status</header>
                                    </div><!--end .card-head -->
                                    <div class="card-body height-4">
                                        <div class="pull-right text-center">
                                            <em class="text-primary">Rate</em>
                                            <br/>
                                            <div id="serverStatusKnob" class="knob knob-shadow knob-primary knob-body-track size-2">
                                                <input type="text" class="dial" data-min="0" data-max="100" data-thickness=".09" value="50" data-readOnly=true>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="card-body height-4 no-padding">
                                        <div class="stick-bottom-left-right">
                                            <div id="rickshawGraph" class="height-4" data-color1="#0aa89e" data-color2="rgba(79, 89, 89, 0.2)"></div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END SERVER STATUS -->

                        </div><!--end .row -->
                        <div class="row">

                            <!-- BEGIN TODOS -->
                            <div class="col-md-3">
                                <div class="card ">
                                    <div class="card-head">
                                        <header>Todo's</header>
                                        <div class="tools">
                                            <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                        </div>
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-9 scroll">
                                        <ul class="list" data-sortable="true">
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox" checked>
                                                        <span>Call clients for follow-up</span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span>
                                                            Schedule meeting
                                                            <small>opportunity for new customers</small>
                                                        </span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span>
                                                            Upload files to server
                                                            <small>The files must be shared with all members of the board</small>
                                                        </span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span>Forward important tasks</span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span>Forward important tasks</span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="checkbox checkbox-styled tile-text">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span>Forward important tasks</span>
                                                    </label>
                                                </div>
                                                <a class="btn btn-flat ink-reaction btn-default">
                                                    <i class="md md-delete"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END TODOS -->

                            <!-- BEGIN REGISTRATION HISTORY -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Registration history</header>
                                        <div class="tools">
                                            <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                            <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                        </div>
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="col-sm-6 hidden-xs">
                                                <div class="force-padding text-sm text-default-light">
                                                    <p>
                                                        <i class="md md-mode-comment text-primary-light"></i>
                                                        The registrations are measured from the time that the redesign was fully implemented and after the first e-mailing.
                                                    </p>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-sm-6">
                                                <div class="force-padding pull-right text-default-light">
                                                    <h2 class="no-margin text-primary-dark"><span class="text-xxl">66.05%</span></h2>
                                                    <i class="fa fa-caret-up text-success fa-fw"></i> more registrations
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="stick-bottom-left-right force-padding">
                                            <div id="flot-registrations" class="flot height-5" data-title="Registration history" data-color="#0aa89e"></div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END REGISTRATION HISTORY -->

                            <!-- BEGIN NEW REGISTRATIONS -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-head">
                                        <header>New registrations</header>
                                        <div class="tools hidden-md">
                                            <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                        </div>
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-9 scroll">
                                        <ul class="list divider-full-bleed">
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar9.jpg?1404026744" alt="" />
                                                    </div>
                                                    <div class="tile-text">Ann Laurens</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar4.jpg?1404026791" alt="" />
                                                    </div>
                                                    <div class="tile-text">Alex Nelson</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar11.jpg?1404026774" alt="" />
                                                    </div>
                                                    <div class="tile-text">Mary Peterson</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar7.jpg?1404026721" alt="" />
                                                    </div>
                                                    <div class="tile-text">Philip Ericsson</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar8.jpg?1404026729" alt="" />
                                                    </div>
                                                    <div class="tile-text">Jim Peters</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="../../assets/img/avatar2.jpg?1404026449" alt="" />
                                                    </div>
                                                    <div class="tile-text">Jessica Cruise</div>
                                                </div>
                                                <a class="btn btn-flat ink-reaction">
                                                    <i class="md md-block text-default-light"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END NEW REGISTRATIONS -->

                        </div><!--end .row -->
                    </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

            <!-- BEGIN MENUBAR-->
            <div id="menubar" class="menubar-inverse ">
                <div class="menubar-fixed-panel">
                    <div>
                        <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="expanded">
                        <a href="../../html/dashboards/dashboard.html">
                            <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
                        </a>
                    </div>
                </div>
          
           <!-- BEGIN MENUBAR -->
           @include('navigation')

           <!-- END MENU BAR MENUBAR -->

                </div><!--end .menubar-scroll-panel-->
            </div><!--end #menubar-->
            <!-- END MENUBAR -->

            <!-- BEGIN OFFCANVAS RIGHT -->
            <div class="offcanvas">

                <!-- BEGIN OFFCANVAS SEARCH -->
                <div id="offcanvas-search" class="offcanvas-pane width-8">
                    <div class="offcanvas-head">
                        <header class="text-primary">Search</header>
                        <div class="offcanvas-tools">
                            <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                                <i class="md md-close"></i>
                            </a>
                        </div>
                    </div>
                    <div class="offcanvas-body no-padding">
                        <ul class="list ">
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>A</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar4.jpg?1404026791" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Alex Nelson
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar9.jpg?1404026744" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Ann Laurens
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>J</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar2.jpg?1404026449" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Jessica Cruise
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar8.jpg?1404026729" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Jim Peters
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>M</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar5.jpg?1404026513" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Mabel Logan
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar11.jpg?1404026774" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Mary Peterson
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar3.jpg?1404026799" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Mike Alba
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>N</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar6.jpg?1404026572" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Nathan Peterson
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>P</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar7.jpg?1404026721" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Philip Ericsson
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                            <li class="tile divider-full-bleed">
                                <div class="tile-content">
                                    <div class="tile-text"><strong>S</strong></div>
                                </div>
                            </li>
                            <li class="tile">
                                <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                                    <div class="tile-icon">
                                        <img src="../../assets/img/avatar10.jpg?1404026762" alt="" />
                                    </div>
                                    <div class="tile-text">
                                        Samuel Parsons
                                        <small>123-123-3210</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div><!--end .offcanvas-body -->
                </div><!--end .offcanvas-pane -->
                <!-- END OFFCANVAS SEARCH -->

                <!-- BEGIN OFFCANVAS CHAT -->
                <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
                    <div class="offcanvas-head style-default-bright">
                        <header class="text-primary">Chat with Ann Laurens</header>
                        <div class="offcanvas-tools">
                            <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                                <i class="md md-close"></i>
                            </a>
                            <a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                                <i class="md md-arrow-back"></i>
                            </a>
                        </div>
                        <form class="form">
                            <div class="form-group floating-label">
                                <textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
                                <label for="sidebarChatMessage">Leave a message</label>
                            </div>
                        </form>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-chats">
                            <li>
                                <div class="chat">
                                    <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                                    <div class="chat-body">
                                        Yes, it is indeed very beautiful.
                                        <small>10:03 pm</small>
                                    </div>
                                </div><!--end .chat -->
                            </li>
                            <li class="chat-left">
                                <div class="chat">
                                    <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
                                    <div class="chat-body">
                                        Did you see the changes?
                                        <small>10:02 pm</small>
                                    </div>
                                </div><!--end .chat -->
                            </li>
                            <li>
                                <div class="chat">
                                    <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                                    <div class="chat-body">
                                        I just arrived at work, it was quite busy.
                                        <small>06:44pm</small>
                                    </div>
                                    <div class="chat-body">
                                        I will take look in a minute.
                                        <small>06:45pm</small>
                                    </div>
                                </div><!--end .chat -->
                            </li>
                            <li class="chat-left">
                                <div class="chat">
                                    <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
                                    <div class="chat-body">
                                        The colors are much better now.
                                    </div>
                                    <div class="chat-body">
                                        The colors are brighter than before.
                                        I have already sent an example.
                                        This will make it look sharper.
                                        <small>Mon</small>
                                    </div>
                                </div><!--end .chat -->
                            </li>
                            <li>
                                <div class="chat">
                                    <div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
                                    <div class="chat-body">
                                        Are the colors of the logo already adapted?
                                        <small>Last week</small>
                                    </div>
                                </div><!--end .chat -->
                            </li>
                        </ul>
                    </div><!--end .offcanvas-body -->
                </div><!--end .offcanvas-pane -->
                <!-- END OFFCANVAS CHAT -->

            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS RIGHT -->

     
        <!-- END BASE -->

   @endsection







