

<?php $__env->startSection('page'); ?>
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
        <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 25%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
            Customer Information Form
        </div>
            <?php if($customer == ""): ?>
            <form class="form col-md-12" action="<?php echo e(route('customers.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php else: ?>
                <form class="form col-md-12" action="<?php echo e(route('customers.update', $customer->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" value="<?php if($customer != ''): ?><?php echo e($customer->first_name); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input class="form-control" type="text" id="last_name" name="last_name" value="<?php if($customer != ''): ?><?php echo e($customer->last_name); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?php if($customer != ''): ?><?php echo e($customer->email); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input class="form-control" type="tel" id="phone" name="phone" value="<?php if($customer != ''): ?><?php echo e($customer->phone); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group: </label>
                                <input class="form-control" type="text" id="blood_group" name="blood_group" value="<?php if($customer != ''): ?><?php echo e($customer->blood_group); ?><?php endif; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">Street Address:</label>
                                <input class="form-control" type="text" id="street" name="street" value="<?php if($customer != ''): ?><?php echo e($customer->street); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="thana">Thana</label>
                                <input class="form-control" type="text" id="thana" name="thana" value="<?php if($customer != ''): ?><?php echo e($customer->thana); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <input class="form-control" type="text" id="district" name="district" value="<?php if($customer != ''): ?><?php echo e($customer->district); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code:</label>
                                <input class="form-control" type="text" id="post_code" name="post_code" value="<?php if($customer != ''): ?><?php echo e($customer->post_code); ?><?php endif; ?>">
                            </div>
                            <div class="form-group">
                                <label for="reference">Reference</label>
                                <input type="text" class="form-control" id="reference" value="<?php if($customer != ''): ?><?php echo e($customer->reference); ?><?php endif; ?>" name="reference" rows="4" cols="50" />
                            </div>
                            <!-- Submit Button -->
                            <div class="btn-group">
                            <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-danger mt-3 mb-3" style="margin-left:100%;">Cancel</a>
                            <button class="btn btn-success mt-3 mb-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/crmform.blade.php ENDPATH**/ ?>