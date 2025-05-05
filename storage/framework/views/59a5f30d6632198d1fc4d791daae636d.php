<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <!-- Sidebar for categories -->
        <div class="col-md-3">
            <h3>Categories</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?php echo e(route('home')); ?>">All</a>
                </li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a href="<?php echo e(route('home', ['category_id' => $category->id])); ?>">
                            <?php echo e($category->name); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Main content area -->
        <div class="col-md-6">
            <div class="card">
                <div class="h-100">
                    <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <p><?php echo e($product->description); ?></p>
                    <p>Starting Bid: $<?php echo e($product->starting_bid); ?></p>
                    <p>Highest Bid: $<?php echo e($product->highest_bid ?? 'No bids yet'); ?></p>
                    
                    <?php if($product->days_left === 'Expired'): ?>
                        <p>Winner: <?php echo e($product->highest_bidder_name ?? 'No winner'); ?></p>
                    <?php else: ?>
                        <p>Highest Bidder: <?php echo e($product->highest_bidder_name ?? 'No bids yet'); ?></p>
                    <?php endif; ?>
                    
                    <p><?php echo e($product->days_left); ?></p>

                    <?php if($product->days_left !== 'Expired'): ?>
                        <!-- Bid form -->
                        <form action="<?php echo e(route('bid.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Bid amount input -->
                            <div class="form-group">
                                <label for="bid_amount">Your Bid:</label>
                                <input type="number" name="bid_amount" id="bid_amount" class="form-control" min="0.01" step="0.01" placeholder="Enter your bid" required>
                            </div>
                            
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success mt-3">Place a Bid</button>
                        </form>
                    <?php else: ?>
                        <p class="text-danger">This auction has expired. No more bids can be placed.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/user/productdetails.blade.php ENDPATH**/ ?>