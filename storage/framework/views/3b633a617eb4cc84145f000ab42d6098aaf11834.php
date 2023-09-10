

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
                <input type="hidden" id="district_input" value="" name="district">
                <input type="hidden" id="thana_input" value="" name="thana">
                <input type="hidden" id="blood_group_input" value="" name="blood_group">
                <button type="submit" name="btn_excel" style="border: none; background:none;" class="mt-3 ml-1"><img src="<?php echo e(asset('assets/dist/img/xlicon.png')); ?>" style="height: 22px; width:22px;" /></button>
                <button type="submit" name="btn_pdf" style="border: none; background:none;" class="mt-3 ml-1"><img src="<?php echo e(asset('assets/dist/img/pdficon.png')); ?>" style="height: 22px; width:22px;" /></button>
            </div>
        </form>
    </div>
    <div class="col-md-12">

        <div class="d-flex justify-content-center">
            <h5>Filter:</h5>
            <select name="district" id="district" class="ml-1 mr-1">
                <option value="">District</option>
                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($district->district_id); ?>"><?php echo e($district->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="thana" id="thana" class="ml-1 mr-1">
                <option>Thana</option>
            </select>
            <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                <option value="">Blood Group</option>
                <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($blood_group->name); ?>"><?php echo e($blood_group->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

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
        var district = ""
        var thana = ""
        var blood_group = ""

        $('#district').on('change', function() {
            district = this.value;
            var html = "";
            var blood_group = "";
            var tbody = "";
            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district
                },
                success: function(data) {
                    $('#district_input').val(district);
                    html += "<option value=''>Thana</option>"
                    data.forEach(item => {
                        if (district != null) {
                            html += `<option value='${item.thana}'>${item.thana}</option>`
                        }
                        $('#thana').html(html)
                        tbody += "<tr>"
                        tbody += "<td>"
                        tbody += `<b>First Name: </b>${item.first_name}<br>`
                        tbody += `<b>Last Name: </b>${item.last_name}<br>`
                        tbody += `<b>Email: </b>${item.email}<br>`
                        tbody += `<b>Phone: ${item.phone}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Street: </b>${item.street}<br>`
                        tbody += `<b>Thana: </b>${item.thana}<br>`
                        tbody += `<b>District: </b>${item.district}<br>`
                        tbody += `<b>Post Code: ${item.post_code}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Blood Group: </b>${item.blood_group}<br>`
                        tbody += `<b>Reference: </b>${item.reference}<br>`
                        tbody += "</td>"
                        tbody += `<td style="display: flex;">`
                        tbody += `<a href="<?php echo e(url('customers/${item.id}/edit')); ?>" ><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>`
                        tbody += `<form action="<?php echo e(url('customers/${item.id}')); ?>" method="post">`
                        tbody += `<?php echo csrf_field(); ?>`
                        tbody += `<?php echo method_field('delete'); ?>`
                        tbody += `<button type="submit" class="text-danger border-white"><i class="fas fa-trash"></i></button>`
                        tbody += `</form>`
                        tbody += "</td>"
                        tbody += "</tr>"
                        $('#tbody').html(tbody)
                    })
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        $('#thana').on('change', function() {
            thana = this.value;
            var html = "";
            var tbody = "";
            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district,
                    'thana': thana
                },
                success: function(data) {
                    $('#thana_input').val(thana);
                    data.forEach(item => {
                        tbody += "<tr>"
                        tbody += "<td>"
                        tbody += `<b>First Name: </b>${item.first_name}<br>`
                        tbody += `<b>Last Name: </b>${item.last_name}<br>`
                        tbody += `<b>Email: </b>${item.email}<br>`
                        tbody += `<b>Phone: ${item.phone}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Street: </b>${item.street}<br>`
                        tbody += `<b>Thana: </b>${item.thana}<br>`
                        tbody += `<b>District: </b>${item.district}<br>`
                        tbody += `<b>Post Code: ${item.post_code}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Blood Group: </b>${item.blood_group}<br>`
                        tbody += `<b>Reference: </b>${item.reference}<br>`
                        tbody += "</td>"
                        tbody += `<td style="display: flex;">`
                        tbody += `<a href="<?php echo e(url('customers/${item.id}/edit')); ?>" ><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>`
                        tbody += `<form action="<?php echo e(url('customers/${item.id}')); ?>" method="post">`
                        tbody += `<?php echo csrf_field(); ?>`
                        tbody += `<?php echo method_field('delete'); ?>`
                        tbody += `<button type="submit" class="text-danger border-white"><i class="fas fa-trash"></i></button>`
                        tbody += `</form>`
                        tbody += "</td>"
                        tbody += "</tr>"
                        $('#tbody').html(tbody)
                    })
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

        $('#blood_group').on('change', function() {
            var html = "";
            var tbody = "";
            blood_group = this.value;

            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district,
                    'thana': thana,
                    'blood_group': blood_group
                },
                success: function(data) {
                    $('#blood_group_input').val(blood_group);

                    data.forEach(item => {
                        tbody += "<tr>"
                        tbody += "<td>"
                        tbody += `<b>First Name: </b>${item.first_name}<br>`
                        tbody += `<b>Last Name: </b>${item.last_name}<br>`
                        tbody += `<b>Email: </b>${item.email}<br>`
                        tbody += `<b>Phone: ${item.phone}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Street: </b>${item.street}<br>`
                        tbody += `<b>Thana: </b>${item.thana}<br>`
                        tbody += `<b>District: </b>${item.district}<br>`
                        tbody += `<b>Post Code: ${item.post_code}`
                        tbody += "</td>"
                        tbody += "<td>"
                        tbody += `<b>Blood Group: </b>${item.blood_group}<br>`
                        tbody += `<b>Reference: </b>${item.reference}<br>`
                        tbody += "</td>"
                        tbody += `<td style="display: flex;">`
                        tbody += `<a href="<?php echo e(url('customers/${item.id}/edit')); ?>" ><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>`
                        tbody += `<form action="<?php echo e(url('customers/${item.id}')); ?>" method="post">`
                        tbody += `<?php echo csrf_field(); ?>`
                        tbody += `<?php echo method_field('delete'); ?>`
                        tbody += `<button type="submit" class="text-danger border-white"><i class="fas fa-trash"></i></button>`
                        tbody += `</form>`
                        tbody += "</td>"
                        tbody += "</tr>"
                        $('#tbody').html(tbody)
                    })
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/index.blade.php ENDPATH**/ ?>