

<?php $__env->startSection('page'); ?>

<div class="container mt-4">
    <a href="<?php echo e(route('customers.index')); ?>" class="btn border-warning text-secondary mb-2 mt-2">Manage Customer</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th>Deleted By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <b>First Name: </b><?php echo e($customer->first_name); ?> <br>
                        <b>Last Name: </b><?php echo e($customer->last_name); ?> <br>
                        <b>Email: </b><?php echo e($customer->email); ?> <br>
                        <b>Phone: </b><?php echo e($customer->phone); ?>

                    </td>
                    <td>
                        <b>Street: </b><?php echo e($customer->street); ?> <br>
                        <b>Thana: </b><?php echo e($customer->thana_id); ?> <br>
                        <b>District: </b><?php echo e($customer->district_id); ?> <br>
                        <b>Post Code: </b><?php echo e($customer->post_code); ?>

                    </td>
                    <td>
                        <b>Blood Group: </b><?php echo e($customer->blood_group_id); ?> <br>
                        <b>Reference: </b><?php echo e($customer->reference); ?> <br>
                    </td>
                    <td>
                        <a href="<?php echo e(route('person', $customer->deleted_by)); ?>">
                            <?php echo e($customer->deleted_by); ?>

                        </a>
                    </td>
                    <td style="display: flex;">
                        <a href="<?php echo e(route('reStore', $customer->id)); ?>" ><button class="border-white text-secondary"><i class="fas fa-trash-restore"></i></button></a>
                        <form action="<?php echo e(route('forceDelete', $customer->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>                          
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="text-danger border-white"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/deleted.blade.php ENDPATH**/ ?>