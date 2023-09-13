

<?php $__env->startSection('page'); ?>

<div class="container mt-4">
    <div class="row bg-secondary mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <a href="<?php echo e(route('customers.create')); ?>" class="btn border-warning btn-secondary mb-2 mt-2">Add</a>
            <a href="<?php echo e(route('getXlimport')); ?>" class="btn border-warning btn-secondary ml-1 mb-2 mt-2">Import</a>
            <?php if(Session::get('sess_role_id') == 1): ?>
            <a href="<?php echo e(route('deleted')); ?>" class="btn border-warning btn-secondary ml-1 mb-2 mt-2">Deleted items</a>
            <?php endif; ?>
        </div>
        <form action="<?php echo e(route('downloadExportxl')); ?>" class="col-md-6" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('post'); ?>

            <div class="col-md-12 d-flex justify-content-end">
                <h6 class="mt-4">Download:</h6>
                <input type="hidden" id="district_input" <?php if(isset($district_id)): ?> value="<?php echo e($district_id); ?>" <?php else: ?> value="" <?php endif; ?> name="district_id">
                <input type="hidden" id="thana_input" <?php if(isset($thana_id)): ?> value="<?php echo e($thana_id); ?>" <?php else: ?> value="" <?php endif; ?> name="thana_id">
                <input type="hidden" id="blood_group_input" <?php if(isset($blood_group_id)): ?> value="<?php echo e($blood_group_id); ?>" <?php else: ?> value="" <?php endif; ?> name="blood_group_id">
                <button type="submit" name="btn_excel" style="border: none; background:none;" class="mt-3 ml-1"><img src="<?php echo e(asset('assets/dist/img/xlicon.png')); ?>" style="height: 22px; width:22px;" /></button>
                <button type="submit" name="btn_pdf" style="border: none; background:none;" class="mt-3 ml-1"><img src="<?php echo e(asset('assets/dist/img/pdficon.png')); ?>" style="height: 22px; width:22px;" /></button>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <form id="filter_form" action="<?php echo e(route('filterCustomer')); ?>" method="POST" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
        <div class="d-flex justify-content-center">
            <h5>Filter:</h5>
            <select name="district_id" id="district" class="ml-1 mr-1">
                <option value="">District</option>
                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($district->id); ?>" <?php if(isset($district_id)): ?> <?php if($district->id == $district_id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($district->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="thana_id" id="thana" class="ml-1 mr-1">
                <option value="">Thana</option>
                <?php $__currentLoopData = $thanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($thana->id); ?>" <?php if(isset($thana_id)): ?> <?php if($thana->id == $thana_id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($thana->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                <option value="">Blood Group</option>
                <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($blood_group->id); ?>" <?php if(isset($blood_group_id)): ?> <?php if($blood_group->id == $blood_group_id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($blood_group->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        </form>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <b>First Name: </b><?php echo e($customer->first_name); ?><br>
                    <b>Last Name: </b><?php echo e($customer->last_name); ?><br>
                    <b>Email: </b><?php echo e($customer->email); ?><br>
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
                    <a href="<?php echo e(route('customers.edit', $customer->id)); ?>"><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>
                    <form action="<?php echo e(route('customers.destroy', $customer->id)); ?>" method="post">
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
<?php $__env->startSection('script'); ?>
<script>
    $(function() {

        $('#district').change(function() {
            $('#filter_form').submit();
        });

        $('#thana').change(function() {
            $('#filter_form').submit();
        });

        $('#blood_group').change(function() {
            $('#filter_form').submit();
        });

    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/index.blade.php ENDPATH**/ ?>