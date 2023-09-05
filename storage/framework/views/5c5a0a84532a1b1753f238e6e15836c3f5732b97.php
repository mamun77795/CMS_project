

<?php $__env->startSection('page'); ?>
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12">

                <div class="d-flex justify-content-center">
                    <h5>Filter:</h5>
                    <select name="district" id="district" class="ml-1 mr-1">
                        <option value="">District</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->district); ?>"><?php echo e($customer->district); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <select name="thana" id="thana" class="ml-1 mr-1">
                        <option>Thana</option>
                    </select>
                    <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                        <option value="">Blood Group</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->blood_group); ?>"><?php echo e($customer->blood_group); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

            </div>
            <form class="form col-md-6" action="<?php echo e(route('smsProcess')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>
                <textarea name="message" id="" class="form-control" rows="10"></textarea>
                <div class="col-md-12 d-flex justify-content-center">
                    <input type="submit" class="btn btn-secondary mt-2" value="Send">
                </div>
            </form>
            <div class="col-md-6">
                <h5></h5>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/message_send.blade.php ENDPATH**/ ?>