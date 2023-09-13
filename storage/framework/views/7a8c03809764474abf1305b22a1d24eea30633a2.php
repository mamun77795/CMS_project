<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @page  {
            size: landscape;

        }

        body {
            font-size: 0.8rem;
        }
    </style>

    <title>Elite Paint | King of Color</title>
</head>

<body>
    <div class="col-md-12">
        <table class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Streets</th>
                    <th>Thana</th>
                    <th>District</th>
                    <th>Post Code</th>
                    <th>Blood Group</th>
                    <th>Reference</th>
                    <th>Created By</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($customer->first_name); ?></td>
                    <td><?php echo e($customer->last_name); ?></td>
                    <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->phone); ?></td>
                    <td><?php echo e($customer->street); ?></td>
                    <td><?php echo e($customer->thana); ?></td>
                    <td><?php echo e($customer->district); ?></td>
                    <td><?php echo e($customer->post_code); ?></td>
                    <td><?php echo e($customer->blood_group); ?></td>
                    <td><?php echo e($customer->reference); ?></td>
                    <td><?php echo e($customer->created_by); ?></td>
                    <td><?php echo e($customer->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/exportpdf.blade.php ENDPATH**/ ?>