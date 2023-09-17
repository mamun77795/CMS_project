

<?php $__env->startSection('page'); ?>
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <form id="myForm" class="row" method="POST" action="<?php echo e(route('getDistricts')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <div class="col-md-6">
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Filter For sending</span></h5>
                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="division-checkboxes[]" class="checkbox-division ml-2 mr-1" data-filter="division" value="<?php echo e($division->id); ?>" <?php if($ids !=null): ?> <?php $__currentLoopData = $ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($id==$division->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> ><?php echo e($division->name); ?>

                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div>
                                    <?php if(isset($districts)): ?>
                                    <h5><span class="text-success pl-2 pr-1 mt-2 mb-2">District</span></h5>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districtss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $districtss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" id="district_id" name="district-checkboxes[]" class="checkbox-district ml-2 mr-1" data-filter="district" value="<?php echo e($district->id); ?>" <?php if($dids !=null): ?> <?php $__currentLoopData = $dids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $did): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($did==$district->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>><span><?php echo e($district->name); ?></span>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <!-- <div>
                                    <?php if(isset($thanas)): ?>
                                    <h5 style="color:orange;">Thanas</h5>
                                    <?php $__currentLoopData = $thanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thanass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <?php if(isset($districts)): ?>
                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districtss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $districtss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($dids !=null): ?> <?php if(end($dids)==$district->id): ?>
                                        <label>
                                            <input type="checkbox" id="thana_id" name="all_thana" class="checkbox-thana ml-2 mr-1" data-filter="thana" value="<?php echo e($district->id); ?>"><span>All</span>
                                        </label>
                                        <?php endif; ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php $__currentLoopData = $thanass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="thana-checkboxes[]" class="checkbox-thana ml-2 mr-1" data-filter="thana" value="<?php echo e($thana->id); ?>"><span><?php echo e($thana->name); ?></span>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </div> -->


                                
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Reference</span></h5>
                                    <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="reference-checkboxes[]" class="checkbox-reference ml-2 mr-1" data-filter="reference" value="<?php echo e($reference->reference); ?>" <?php if(isset($refs)): ?> <?php $__currentLoopData = $refs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($ref==$reference->reference): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>><span><?php echo e($reference->reference); ?></span>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Blood Group</span></h5>
                                    <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="blood-checkboxes[]" class="checkbox-blood ml-2 mr-1" data-filter="blood_group" value="<?php echo e($blood_group->id); ?>" <?php if(isset($bloods)): ?> <?php $__currentLoopData = $bloods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($blood==$blood_group->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>><span><?php echo e($blood_group->name); ?></span>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Special day wish</span></h5>
                                    <label>
                                        <input type="checkbox" id="dob" name="dob" class="checkbox-district ml-2 mr-1" data-filter="dob" value="dob" <?php if(isset($dob)): ?> <?php if($dob == "dob"): ?> checked <?php endif; ?> <?php endif; ?>><span>Birthday</span>
                                    </label>
                                    <label>
                                        <input type="checkbox" id="m_day" name="m_day" class="checkbox-district ml-2 mr-1" data-filter="m_day" value="m_day" <?php if(isset($m_day)): ?> <?php if($m_day == "m_day"): ?> checked <?php endif; ?> <?php endif; ?>><span>Marriage anniversary</span>
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <h5 class="mt-3"><span class="text-white bg-green pl-1 pr-1 mt-2 mb-2">Totol Person:</span> <?php if(isset($totals)): ?> <b class="text-success"><?php echo e($totals); ?></b> <?php endif; ?></h5>
                                <span class="mr-2"><b>SMS Type:</b></span>
                                <select name="sms_type" class="mb-3 mt-2 p-1 pl-2">
                                    <option value="masking">Masking</option>
                                    <option value="non-masking">Non-Masking</option>
                                </select>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <input type="hidden" name="send" value="message">
                                    <button type="submit" name="send_button" class="btn btn-secondary mt-2">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script>
    $(document).ready(function() {
        $('.checkbox-division').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-district').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-reference').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-blood').change(function() {
            $('#myForm').submit();
        });

        $('.dob').change(function() {
            $('#myForm').submit();
        });

        $('.m_date').change(function() {
            $('#myForm').submit();
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/message_send.blade.php ENDPATH**/ ?>