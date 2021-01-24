   

   <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS--> 
  
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/timeline/horizontal-timeline.js')); ?>" type="text/javascript"></script>

   <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')); ?>"
  type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/tables/datatables/datatable-basic.js')); ?>"
  type="text/javascript"></script>

   <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/buttons.colVis.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js')); ?>"
  type="text/javascript"></script>

   <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')); ?>"
  type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')); ?>"
  type="text/javascript"></script>

 <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/forms/validation/jquery.validate.min.js')); ?>"
  type="text/javascript"></script>

  <!--  <script src="<?php echo e(url('/admin_theme/js/scripts/forms/wizard-steps.min.js')); ?>" type="text/javascript"></script> -->
  
 
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo e(url('/admin_theme/app-assets/js/core/app-menu.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/js/core/app.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/customizer.js')); ?>" type="text/javascript"></script>
  <!-- END MODERN JS-->
  
  <!-- BEGIN PAGE LEVEL JS-->
  
  <!--  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/charts/morris.min.js')); ?>" type="text/javascript"></script>-->
  
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/pages/dashboard-ecommerce.js')); ?>" type="text/javascript"></script>-->

    <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/charts/chartist.min.js')); ?>" type="text/javascript"></script>
  
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')); ?>" type="text/javascript"></script>
  
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/charts/raphael-min.js')); ?>" type="text/javascript"></script>-->

<!--     <script type="text/javascript" src="<?php echo e(url('/admin_theme/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js')); ?>"></script> -->

  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/tables/datatables-extensions/datatable-rowreorder.js')); ?>"
  type="text/javascript"></script>

  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/extensions/datedropper.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/extensions/timedropper.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/extensions/date-time-dropper.min.js')); ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
     <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')); ?>"
  type="text/javascript"></script>

  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')); ?>"
  type="text/javascript"></script>
  
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/jszip.min.js')); ?>" type="text/javascript"></script>-->
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/pdfmake.min.js')); ?>" type="text/javascript"></script>-->
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/vfs_fonts.js')); ?>" type="text/javascript"></script>-->
  
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/buttons.html5.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/buttons.print.min.js')); ?>" type="text/javascript"></script>
  
  <!--<script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/tables/buttons.colVis.min.js')); ?>" type="text/javascript"></script>-->
  <!-- END PAGE VENDOR JS--> 
  
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/extensions/sweetalert.min.js')); ?>" type="text/javascript"></script>
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')); ?>"
  type="text/javascript"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/vendors/js/editors/tinymce/tinymce.min.js')); ?>"></script>
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/editors/editor-tinymce.min.js')); ?>"></script>
  <!-- END PAGE LEVEL JS-->
 
  <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/jquery.toast.min.js')); ?>"></script>
<?php if(session('success')): ?>
<?php $title = isset(session('success')['title'])?session('success')['title']:''; 
      $message = isset(session('success')['message'])?session('success')['message']:'Created Successfully';
?>
<script type="text/javascript">
$.toast({
    heading: '<?php echo e($title); ?>',
    text: '<?php echo e($message); ?>',
    showHideTransition: 'slide',
    position: 'top-right',
    stack: 2,
    icon: 'success',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#32cd32',
    color: '#32cd32'
});
</script>

<?php
  session()->forget('success');
?>
<?php endif; ?>

<?php if(session('error')): ?>
<script type="text/javascript">
$.toast({
    heading: '<?php echo e(session('error')['title']); ?>',
    text: '<?php echo e(session('error')['message']); ?>',
    position: 'bottom-right',
    stack: 2,
    icon: 'error',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600',  // To change the background
})
</script>



<?php
  session()->forget('error');
?>
<?php endif; ?>

<?php if(session('warning')): ?>
<script type="text/javascript">
$.toast({
    heading: '<?php echo e(session('warning')['title']); ?>',
    text: '<?php echo e(session('warning')['message']); ?>',
    position: 'bottom-right',
    stack: 2,
    icon: 'warning',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#ff4500',  // To change the background
})
</script>



<?php
  session()->forget('warning');
?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/includes/js.blade.php ENDPATH**/ ?>