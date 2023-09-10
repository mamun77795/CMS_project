

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
                        <div class="col-md-6">
                            <form id="myForm" class="col-md-12" method="GET" action="<?php echo e(route('getDistricts')); ?>">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <h5 style="color:orange;">Divisions</h5>
                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="division-checkboxes[]" class="checkbox-division ml-2 mr-1" data-filter="division" value="<?php echo e($division->id); ?>" <?php if($ids !=null): ?> <?php $__currentLoopData = $ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($id==$division->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> ><?php echo e($division->name); ?>

                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div>
                                    <h5 style="color:orange;">Districts</h5>
                                    <?php if(isset($districts)): ?>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districtss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $districtss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="checkbox" name="district-checkboxes[]" class="checkbox-district ml-2 mr-1" data-filter="district" value="<?php echo e($district->id); ?>" <?php if($dids !=null): ?> <?php $__currentLoopData = $dids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $did): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($did==$district->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>><span><?php echo e($district->name); ?></span>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <h5 style="color:orange;">Thanas</h5>
                                <?php if(isset($thanas)): ?>
                                <?php $__currentLoopData = $thanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thanass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <?php $__currentLoopData = $thanass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label>
                                    <input type="checkbox" name="thana-checkboxes[]" class="checkbox-thana ml-2 mr-1" data-filter="district" value="<?php echo e($thana->id); ?>"><span><?php echo e($thana->name); ?></span>
                                </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <form class=" col-md-6" action="<?php echo e(route('downloadExportxl')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <input type="hidden" id="district_input" value="" name="district">
                            <input type="hidden" id="thana_input" value="" name="thana">
                            <input type="hidden" id="blood_group_input" value="" name="blood_group">
                            <textarea name="message" class="form-control" rows="10"></textarea>
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" name="send-button" class="btn btn-secondary mt-2">Send</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.checkbox-division').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-district').change(function() {
            $('#myForm').submit();
        });

    });
</script>

<script>
    $(function() {
        var district = ""
        var thana = ""
        var blood_group = ""
        var allData = ""
        var selectedDistrict = []
        var fhtml = ""
        var selectedDivision = []
        var dhtml = ""

        var itemValue = ""

        $(".check-division").on("change", function() {
            selectedDivision = []
            dhtml = ""
            updateSelectedDivisions();

        });

        function updateSelectedDivisions() {

            $(".check-division:checked").each(function() {
                selectedDivision.push($(this).val());
            });
            selectedDivision.forEach(item => {
                $.ajax({
                    url: `http://localhost/new-project/public/filter_division`,
                    method: "POST",
                    data: {
                        'division': item
                    },
                    success: function(data) {
                        console.log(data);
                        data.forEach(item => {
                            itemValue += item.name;
                            dhtml += `<input type="checkbox" name="district[]" class="unique-district" value="${item.name}"> ${item.name} <br>`
                            $('#checkbox-district').html(dhtml);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            })
        }

        $(".unique-district").on("click", function() {
            selectedDistrict = []
            fhtml = ""

            updateSelectedItems();

        });

        function updateSelectedItems() {
            $(".unique-district:checked").each(function() {
                selectedDistrict.push($(this).val());
            });
            selectedDistrict.forEach(item => {
                $.ajax({
                    url: `http://localhost/new-project/public/filter_customer`,
                    method: "POST",
                    data: {
                        'district': item
                    },
                    success: function(data) {
                        allData = data;
                        //$('#district_input').val(district);
                        data.forEach(item => {
                            // console.log(item);
                            fhtml += `<input type="checkbox" name="district[]" class="thana" value="${item.thana}"> ${item.thana} <br>`
                            $('#checkbox-thana').html(fhtml);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            })
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/message_send.blade.php ENDPATH**/ ?>