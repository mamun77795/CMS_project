

<?php $__env->startSection('page'); ?>

<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->mobile); ?></td>
                    <td>
                        <img src="<?php echo e(asset('photo')); ?>/<?php echo e($user->photo); ?>" style="height: 70px; width: 70px;"/>
                    </td>
                </tr>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ampps\www\new-project\app\Modules/Customer/resources/views/user.blade.php ENDPATH**/ ?>