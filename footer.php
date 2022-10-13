<html>
	<body>
    

    	<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Megamenu JS -->
		<script src="vendor/megamenu/js/megamenu.js"></script>
		<script src="vendor/megamenu/js/custom.js"></script>
				
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Search Filter JS -->
		<script src="vendor/search-filter/search-filter.js"></script>
		<script src="vendor/search-filter/custom-search-filter.js"></script>

		<!-- Rating JS -->
		<script src="vendor/rating/raty.js"></script>
		<script src="vendor/rating/raty-custom.js"></script>

		<!-- Steps wizard JS -->
		<script src="vendor/wizard/jquery.steps.min.js"></script>
		<script src="vendor/wizard/jquery.steps.custom.js"></script>

		<!-- Summernote JS -->
		<script src="vendor/summernote/summernote-bs4.js"></script>

		<!-- Bootstrap Select JS -->
		<script src="vendor/bs-select/bs-select.min.js"></script>
		<script src="vendor/bs-select/bs-select-custom.js"></script>

		<!-- Dropzone JS -->
		<script src="vendor/dropzone/dropzone.min.js"></script>

		<!-- Input Tags JS -->
		<script src="vendor/input-tags/tagsinput.min.js"></script>
		<script src="vendor/input-tags/typeahead.js"></script>
		<script src="vendor/input-tags/tagsinput-custom.js"></script>

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

		<script>

			// Summernote
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 120,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
			});

</script>

    <!-- jQuery 2.1.4 
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.14.2/extensions/export/bootstrap-table-export.min.js"></script>-->
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/export/bootstrap-table-export.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <!-- <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>

    <script src="plugins/select2/select2.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select").select2();
        });
    </script>
    <script>
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    </script>
	</body>
</html>