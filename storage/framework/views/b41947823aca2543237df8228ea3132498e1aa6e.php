

<?php $__env->startSection('page'); ?>

<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
        <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 30%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
            User Information Form
        </div>
            <?php if($user == ""): ?>
            <form action="<?php echo e(route('users.store')); ?>" class="col-md-12" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php else: ?>
                <form action="<?php echo e(route('users.update', $user->id)); ?>" class="col-md-12" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php if($user !=''): ?> <?php echo e($user->name); ?> <?php endif; ?>" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="<?php if($user !=''): ?> <?php echo e($user->email); ?> <?php endif; ?>" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="<?php if($user !=''): ?> <?php echo e($user->mobile); ?> <?php endif; ?>" placeholder="Enter mobile number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if(($user =='')): ?>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <?php if(($user =='')): ?>
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" class="form-control">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->designation); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            <div class="btn-group">
                            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-danger mt-3 mb-3" style="margin-left:100%;">Cancel</a>
                            <button class="btn btn-success mt-3 mb-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\resources\views/pages/erp/user/create.blade.php ENDPATH**/ ?>