@extends('dashboard.layouts.app')
{{-- @section('css')
<link rel="stylesheet" href="{{ asset('plugnis/fancybox/source/jquery.fancybox.css') }}">
@endsection --}}

@section('content')
    <section class="content">
        <div class=" clearfix"></div>
        <div class="row">
            <div class="col-xs-12">
            <div class="box box-primary box-solid">
                    <div class="box-header box-header-background with-border">
                        <h3 class="box-title">USER LIST</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ url('dashboard/users/create ')}}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD NEW</a>
                        </div>
                    </div>

                    <div class="box-body table-responsive">
                        <table id="user_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>PHONE</th>
                                    <th>USER NAME</th>
                                
                                    <th>USER TYPE</th>
                                    <th class="">ACTION</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/fancy-box/jquery.fancybox.css') }}">

@endsection


@section('js')

    <script type="text/javascript" src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('theme/fancy-box/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/fancy-box/jquery.fancybox.pack.js') }}"></script>


    <script type="text/javascript">

    $(document).ready(function () {

        //$(window).bind("load", function() {

            if ($('#user_table').length > 0) {
            var tableData = $('#user_table').DataTable({
                    //stateSave: true,

                    processing: true,
                    serverSide: true,
                    "language": {
                        // "aria": {
                        //     "sortAscending": ": activate to sort column ascending",
                        //     "sortDescending": ": activate to sort column descending"
                        // },
                        "paginate": {
                        "previous": "PREVIOUS",
                        "next": "NEXT"
                    },
                        "emptyTable": "NO DATA AVAILABLE IN TABLE",
                        "infoEmpty": "NO ENTRIES FOUND",
                        "infoFiltered": "({{ __('message.FILTERED1_FROM') }} _MAX_ {{ __('message.TOTAL_ENTRIES') }})",
                        "lengthMenu": "_MENU_ ENTRIES",
                        "search": "SEARCH:",
                        "zeroRecords": "NO MATCHING RECORDS FOUND"
                    },
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    dom: 'lBfrtip',
                    ajax: {
                        url: "{{ route('users.index') }}",
                        type: 'GET',
                        data: function (d) {
                        }

                    },
                    "fnDrawCallback": function (oSettings) {
                        $("body .fancybox").fancybox({
                            openEffect: 'elastic',
                            closeEffect: 'elastic',
                            helpers: {
                                title: {
                                    type: 'inside'
                                }
                            }
                        });
                        $('body').off('click', '[id^="changeStatus-"]').on('click', '[id^="changeStatus-"]', function (e) {
                            var self = $(this);
                            var tbl = "<?php echo 'users' ?>";
                            var id = $(this).attr('id').split('-')[1];
                            var status = $(this).attr('id').split('-')[2];
                            // var language = "<?php echo Session::get('lang') ?>";
                            // var msgStatus = status == 'Active' ? 'Inactive' : 'Active';

                            // if(language == 'ar'){
                            //     var msgStatus = status == 'Active' ? lang.inactive : lang.active;
                            // }

                            swal({
                                title: lang.SURE,
                                text: lang.YOU_WANT+" " + msgStatus +" "+ lang.THIS_RECORD,
                                type: "warning",
                                confirmButtonText: lang.YES+", " + msgStatus + ' '+lang.IT,
                                cancelButtonText: lang.NO_CANCLE_PLEASE,
                                icon: "warning",
                                buttons: [lang.CANCEL, lang.OK ],
                                dangerMode: true,
                            }).then(function (value) {
                                if (value == 1) {
                                    $.post(SITEURL + "/change-status", {table: tbl, id: id},
                                            function (data) {
                                                if (data == '1') {
                                                    if (status == 'Active') {
                                                        self.attr('id', 'changeStatus-' + id + '-Inactive-').removeClass('btn-success').addClass('btn-danger').html(lang.inactive);
                                                    } else {
                                                        self.attr('id', 'changeStatus-' + id + '-Active-').removeClass('btn-danger').addClass('btn-info').html(lang.active);
                                                    }
                                                }
                                            });

                                    swal({title: msgStatus + "!", text:lang.record_has+" " + msgStatus + "!",type: "success",icon:"success",buttons:lang.OK});

                                } else {
                                    // swal("Cancelled", "Your record is safe :)", "error");
                                }

                            });

                        });

                    },
                    columns: [
                        {data: 'id', name: 'id', 'visible': false},
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'username', name: 'username'},                    
                        {data: 'authorization',
                        render: function(data){
                            if(data == '0'){
                                return 'ADMIN';
                            }
                            else{
                                return 'USER';
                            }
                        }},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
                });
            }
        //});

    });

    </script>

@endsection
