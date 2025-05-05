<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Account Details</h1>

       <div class="row g-5">
       <div class="col card col-md-3">
            <div class="card-header">Your Account</div>

            <div class="card-body">
                <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
                <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                <!-- Add more user details here as needed -->

                <!-- Optionally, include a form for updating user details -->
                <a href="<?php echo e(route('user.update')); ?>" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
        <div class="col card col-md-6">
                    <h1>Your Bidding History</h1>

            <?php if($biddings->isEmpty()): ?>
                <p>You have not placed any bids yet.</p>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Bid Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $biddings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($bidding->product->name); ?></td>
                                <td>$<?php echo e(number_format($bidding->bid_amount, 2)); ?></td>
                                <td><?php echo e($bidding->created_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <a href="<?php echo e(route('bidding.download')); ?>" class="btn btn-secondary">Download Bidding History as PDF</a>
        </div>

        

       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Online_Bidding_System\resources\views/user/account.blade.php ENDPATH**/ ?>