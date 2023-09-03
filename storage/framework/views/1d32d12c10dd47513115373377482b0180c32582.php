

<?php $__env->startSection('page'); ?>

<div class="container mt-4">
    <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-success mb-2 mt-2">Add Customer</a>
    <?php if(Session::get('sess_role_id') == 1): ?>
    <a href="<?php echo e(route('deleted')); ?>" class="btn btn-success mb-2 mt-2">Deleted Customer</a>
    <?php endif; ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <b>First Name: </b><?php echo e($customer->first_name); ?> <br>
                        <b>Last Name: </b><?php echo e($customer->last_name); ?> <br>
                        <b>Email: </b><?php echo e($customer->email); ?> <br>
                        <b>Phone: </b><?php echo e($customer->phone); ?>

                    </td>
                    <td>
                        <b>Street: </b><?php echo e($customer->street); ?> <br>
                        <b>Thana: </b><?php echo e($customer->thana); ?> <br>
                        <b>District: </b><?php echo e($customer->district); ?> <br>
                        <b>Post Code: </b><?php echo e($customer->post_code); ?>

                    </td>
                    <td>
                        <b>Blood Group: </b><?php echo e($customer->blood_group); ?> <br>
                        <b>Reference: </b><?php echo e($customer->reference); ?> <br>
                    </td>
                    <td style="display: flex;">
                        <a href="<?php echo e(route('customers.edit', $customer->id)); ?>" class="btn btn-secondary">Edit</a>
                        <form action="<?php echo e(route('customers.destroy', $customer->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>                          
                            <?php echo method_field('delete'); ?>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ampps\www\new-project\app\Modules/Customer/resources/views/index.blade.php ENDPATH**/ ?>