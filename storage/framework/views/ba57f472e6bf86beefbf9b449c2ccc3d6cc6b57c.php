

<?php $__env->startSection('page'); ?>
<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Attachement</th>
                <th>Report</th>
                <th>Failed Person Id</th>
                <th>Sender</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($mail->heading); ?>

                </td>
                <td><?php echo e($mail->body); ?></td>
                <td>
                    <img src="<?php echo e(asset('photo')); ?>/<?php echo e($mail->attachement); ?>" alt="" style="height:100px; width: 100px;"/>
                </td>
                <td>
                    Target: <?php echo e($mail->total_mail); ?> <br>
                    Sent: <?php echo e($mail->sent_mail); ?> <br>
                    Failed: <?php echo e($mail->failed_mail); ?> <br>
                </td>
                <td>
                    Failed Ids: 
                    <?php echo e($mail->failed_person_id); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('person', $mail->sender)); ?>">
                        <?php echo e($mail->sender); ?>

                    </a>
                </td>
                <td>
                    <?php echo e($mail->created_at); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/email_report.blade.php ENDPATH**/ ?>