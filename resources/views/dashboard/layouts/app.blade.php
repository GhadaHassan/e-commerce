<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- <link rel="icon" type="image/png" href="{{asset('storage/images/favicon.png')}}"> --}}
        <title>Title</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

         {{-- @if(Config::get('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('theme/dist/css/bootstrap_rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/dist/css/rtlcustom.css') }}">
        @else --}}
        <link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        {{-- @endif --}}


        <!-- Bootstrap 3.3.7 -->
        {{-- <link rel="stylesheet" href="{{ asset('theme/style.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('theme/fontawesome-free/css/all.min.css')}}"> --}}


        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('theme/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('theme/dist/css/skins/_all-skins.min.css') }}">

        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/bower_components/select2/dist/css/select2.min.css') }}">
        <link href="{{ asset('theme/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
         <!-- Google Font -->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
         <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

        @yield('css')
        
        <script type="text/javascript" src="{{ asset('lang/en.js') }}"></script>
      
        <script type="text/javascript">
            WebFontConfig = {
                google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700' ] }
            };
            (function(d) {
                var wf = d.createElement('script'), s = d.scripts[0];
                wf.src = 'assets/js/webfont.js';
                wf.async = true;
                s.parentNode.insertBefore(wf, s);
            })(document);
        </script>
        <!-- jQuery 3 -->
        <script src="{{ asset('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/jquery.validate.min.js') }}"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('theme/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            var SITEURL = '{{URL::to('')}}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <style type="text/css">
            .user-panel>.image>img {
                max-width: 40px !important;
                height: 45px !important;
            }

           div.dataTables_length {
               display: inline-block;
               width: 50%;
           }

           div.dataTables_filter {
               width: 50%;
               display: inline-block;
           }
           div.dataTables_info {
               display: inline-block;
               width: 50%;
           }

           div.paging_simple_numbers {
               display: inline-block;
               width: 50%;
           }
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        
        <div class="wrapper">

            @include('dashboard.layouts.header')

            <!-- Left side column. contains the logo and sidebar -->
            @include('dashboard.layouts.sidebar')
            @if(Session::has('success'))

            <script type="text/javascript">

                swal({
                    title: lang.SUCCESS,
                    text: "{{Session::get('success')}}",
                    timer: 5000,
                    type: 'success',
                    buttons: lang.OK
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);
            </script>
            @endif

            @if(Session::has('fail'))
            <script type="text/javascript">
                swal({
                    title: lang.OOPS,
                    text: "{{Session::get('fail')}}",
                    type: 'error',
                    buttons: lang.OK,
                    timer: 5000
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);
            </script>
            @endif
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                    
                     {{-- <small>Control panel</small> --}}
                    </h1>

                    <ol class="breadcrumb">
                        @if($breadcrumbs ?? '')
                            @foreach($breadcrumbs as $val)

                                @if($val['name'] != $title)
                                    <li><a href="{{ $val['url'] }}"><!-- <i class="fa fa-dashboard"></i> --> {{ $val['name'] }}</a></li>
                                @else
                                    <li class="active">{{ $title }} </li>
                                @endif

                            @endforeach
                        @endif

                    </ol>
                </section>
                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
             <!--- Modal Pop Up -->
            <div class="modal fade" id="myModal" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset('theme/loading-spinner-blue.gif') }}" alt="" class="loading">
                            <span> &nbsp;&nbsp;{{ __('message.LODING') }} </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModalSmall" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset('theme/loading-spinner-blue.gif') }}" alt="" class="loading">
                            <span> &nbsp;&nbsp;{{ __('message.LODING') }} </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModalLarge" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset('theme/loading-spinner-blue.gif') }}" alt="" class="loading">
                            <span> &nbsp;&nbsp;{{ __('message.LODING') }} </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Modal Pop Up -->

            <!-- <div class="control-sidebar-bg"></div> -->
        </div>
        <!-- ./wrapper -->


        @include('dashboard.layouts.script')
        @yield('js')
    </body>
</html>
