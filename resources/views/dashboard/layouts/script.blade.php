

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- daterangepicker -->
<script src="{{ asset('theme/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin.js') }}"></script>
<script src="{{ asset('custom-validation.js') }}"></script>
<script src="{{ asset('theme/dist/js/adminlte.min.js') }}"></script>
<script src="{{asset('theme/additional-methods.min.js')}}"></script>
<script src="{{ asset('theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
$('body').on('hidden.bs.modal', '.modal', function() {
    $(this).removeData('bs.modal');
    $(this).find('.modal-content').html('<div style="text-align: center;"><img width="100" height="100" src="<?php echo asset('theme/loading-spinner-blue.gif') ?>"></div>');
});
</script>

<script type="text/javascript">
//Enable sidebar dinamic menu
var url = window.location;
// Will only work if string in href matches with location
$('.sidebar-menu li a[href="' + url + '"]').parent().addClass('active');
// Will only work if string in href matches with location
$('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
// Will also work for relative and absolute hrefs
$('.treeview-menu li a').filter(function() {
return this.href == url;
}).parent().parent().parent().addClass('active');
</script>