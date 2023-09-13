

<?php $__env->startSection('page'); ?>
<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Message</th>
                <th>Report</th>
                <th>Failed Person Id</th>
                <th>Type</th>
                <th>Sender</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($message->message); ?>

                </td>
                <td>
                    Target: <?php echo e($message->total_sms); ?> <br>
                    Sent: <?php echo e($message->sent_total); ?> <br>
                    Failed: <?php echo e($message->sending_failed); ?> <br>
                </td>
                <td>
                    Failed Ids: 
                    <?php echo e($message->failed_person_id); ?>

                </td>
                <td>
                    <?php echo e($message->sms_type); ?>

                </td>
                <td>
                    <?php echo e($message->sender_email); ?>

                </td>
                <td>
                    <?php echo e($message->created_at); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\new-project\app\Modules/Customer/resources/views/ind_msg_send.blade.php ENDPATH**/ ?>