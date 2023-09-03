

<?php $__env->startSection('page'); ?>

<div class="container pt-4">
    <form action="<?php echo e(route('importxl')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="file" name="excel_file">
        <button type="submit" class="btn btn-secondary border-warning">Import Excel</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/get_xlfile.blade.php ENDPATH**/ ?>