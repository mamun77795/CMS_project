

<?php $__env->startSection('page'); ?>

<div class="container mt-4">
    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success mb-2 mt-2">Add User</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Photo</th>
                <?php if(Session::get('sess_role_id') == 1): ?>
                <th>Action</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->mobile); ?></td>
                    <td>
                        <img style="height: 70px; width: 70px;" src="<?php echo e(asset('photo')); ?>/<?php echo e($user->photo); ?>" />
                    </td>
                    <?php if(Session::get('sess_role_id') == 1): ?>
                    <td style="display: flex;">
                        <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-secondary">Edit</a>
                        <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>                          
                            <?php echo method_field('delete'); ?>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\resources\views/pages/erp/user/index.blade.php ENDPATH**/ ?>