<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <span class="text-danger"><?php if(isset($error)): ?> <?php echo e($error); ?> <?php endif; ?></span>
                        <form method="POST" action="<?php echo e(route('reset-password.post')); ?>">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="token" value="<?php echo e($token); ?>">

                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 mt-2 d-flex">
                                    <button type="submit" class="btn btn-secondary ms-auto">
                                        <?php echo e(__('Reset Password')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH E:\xampp\htdocs\new-project\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>