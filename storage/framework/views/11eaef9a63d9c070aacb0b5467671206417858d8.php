<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .font{
            font-size: 0.9rem;
        }
        h1, h2{
            font-size: 1.5rem;
        }
    </style>
</head>

<body class="">
    <div class="container font m-5">
        <div class="row">
            <div class="col-md-6 m-auto bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
                <h1>Customer Information</h1>
                <?php if($customer == ""): ?>
                <form class="form" action="<?php echo e(route('crm-modules.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?> 
                <?php else: ?>
                <form class="form" action="<?php echo e(route('crm-modules.update', $customer->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?> 
                    <?php echo method_field('put'); ?>
                <?php endif; ?>

                    <!-- Personal Information -->
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
                        <!-- Address Information -->
                        <h2>Address</h2>
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
                        <!-- Additional Information -->
                        <h2>Additional Information</h2>
                        <label for="company">Company Name:</label>
                        <input class="form-control" type="text" id="company" name="company" value="<?php if($customer != ''): ?><?php echo e($customer->company); ?><?php endif; ?>">
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea class="form-control" id="notes" name="notes" rows="4" cols="50"><?php if($customer != ''): ?><?php echo e($customer->notes); ?><?php endif; ?>
                        </textarea>
                    </div>
                    <!-- Submit Button -->
                    <button class="btn btn-success mt-3 mb-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH D:\Ampps\www\new-project\app\Modules/CrmModule/resources/views/crmform.blade.php ENDPATH**/ ?>