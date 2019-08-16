
  <script src="../assets/vendors/scripts/script.js"></script>


  	<!-- switchery js -->
	<script src="../assets/src/plugins/switchery/dist/switchery.js"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="../assets/src/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
	<!-- bootstrap-touchspin js -->
  <script src="../assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>
  
  <script src="../assets/src/plugins/fullcalendar/lib/jquery-ui.min.js"></script>
  <script src="../assets/src/plugins/fullcalendar/fullcalendar.min.js"></script>
  
  <script src="../assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="../assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="../assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
  <script src="../assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
  
  <script src="../assets/src/plugins/jquery-asColor/dist/jquery-asColor.js"></script>
	<script src="../assets/src/plugins/jquery-asGradient/dist/jquery-asGradient.js"></script>
  <script src="../assets/src/plugins/jquery-asColorPicker/dist/jquery-asColorPicker.js"></script>
  

  <script src="../assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>

  <script src="../assets/src/plugins/fancybox/dist/jquery.fancybox.js"></script>
 
	
  
  
  <script src="../assets/src/plugins/cropperjs/dist/cropper.js"></script>
  <script src="../assets/src/plugins/cropperjs/dist/cropper-init.js"></script>
  
  
  <script src="../assets/src/plugins/dropzone/src/dropzone.js"></script>
  

  
  <script src="../assets/src/plugins/jQuery-Knob-master/js/jquery.knob.js"></script>
  <script src="../assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
  
  <script src="../assets/src/plugins/highcharts-6.0.7/code/highcharts-3d.src.js"></script>

	<script src="../assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="../assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="../assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  


  <!-- Slick Slider js -->
	<script src="../assets/src/plugins/slick/slick.min.js"></script>
	<!-- bootstrap-touchspin js -->
  <script src="../assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>
  
 
  	<!-- add sweet alert js & css in footer -->
	<script src="../assets/src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/src/plugins/sweetalert2/sweetalert2.css">
  <script src="../assets/src/plugins/sweetalert2/sweet-alert.init.js"></script>
  
  <script src="../assets/src/plugins/ion-rangeslider/js/ion.rangeSlider.js"></script>

  
  <script src="../assets/src/plugins/plyr/dist/plyr.js"></script>
  <script src="https://cdn.shr.one/1.0.1/shr.js"></script>
  
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>

