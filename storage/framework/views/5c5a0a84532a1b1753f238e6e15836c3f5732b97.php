

<?php $__env->startSection('page'); ?>
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12 d-flex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 row">
                        <div class="col-md-12">
                                <h6>Division</h6>
                                <form action=""  method="">
                                    <div id="checkbox-division">
                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="checkbox" name="division[]" class="check-division" value="<?php echo e($division->id); ?>"> <?php echo e($division->name); ?> <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <h6>District</h6>
                                <form action="" method="">
                                    <div id="checkbox-district">
                                    <input type="checkbox" name="district[]" class="unique-district" id="check-district" value="Dhaka"> Dhaka <br>
                                    </div>
                                    <!-- <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="checkbox" name="district[]" class="check-district" id="check-district" value="<?php echo e($district->name); ?>"> <?php echo e($district->name); ?> <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                                </form>
                            </div>
                            <div class="col-md-12">
                                <h6>Thana</h6>
                                <form action=""  method="">
                                    <div id="checkbox-thana">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <form class="form col-md-6" action="<?php echo e(route('downloadExportxl')); ?>" method="POST">
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
<script>
    $(function() {
        var district = ""
        var thana = ""
        var blood_group = ""
        var allData = ""
        var selectedDistrict = []
        var fhtml=""
        var selectedDivision = []
        var dhtml=""

        var itemValue = ""

        $(".check-division").on("change", function() {
            selectedDivision = []
            dhtml=""
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
                            itemValue+=item.name;
                            dhtml+= `<input type="checkbox" name="district[]" class="unique-district" value="${item.name}"> ${item.name} <br>`
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
            fhtml=""

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
                            fhtml+= `<input type="checkbox" name="district[]" class="thana" value="${item.thana}"> ${item.thana} <br>`
                            $('#checkbox-thana').html(fhtml);
                        })
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
                
            })
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/message_send.blade.php ENDPATH**/ ?>