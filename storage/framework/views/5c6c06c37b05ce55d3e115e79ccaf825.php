<?php $__env->startSection('content'); ?>
<div class="container p-4">
    <h2 class="text-center fw-bold">Winner List</h2>
    
  

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Bid Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($winner->product_name); ?></td>
                    <td><?php echo e($winner->user_name); ?></td>
                    <td><?php echo e($winner->user_email); ?></td>
                    <td>$<?php echo e(number_format($winner->highest_bid, 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Online_Bidding_System\resources\views/admin/winner_list.blade.php ENDPATH**/ ?>