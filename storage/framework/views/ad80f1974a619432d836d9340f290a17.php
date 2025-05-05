<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    
</head>
<body>
    <div class="container">
        <h1><?php echo e($product->name); ?></h1>
        <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="img-fluid" alt="<?php echo e($product->name); ?>">
        <p><?php echo e($product->description); ?></p>
        <p>Starting Bid: $<?php echo e($product->starting_bid); ?></p>
        <p>Start Price: $<?php echo e($product->start_price); ?></p>
        <p>Bid Expiry: <?php echo e($product->bid_expiry); ?></p>
        <p><?php echo e($product->days_left); ?></p>
        <?php if($product->highest_bid !== null): ?>
            <p>Highest Bid: $<?php echo e($product->highest_bid); ?></p>
        <?php else: ?>
            <p>No bids yet</p>
        <?php endif; ?>

        <!-- Bid Form -->
        <form action="#" method="POST" class="mt-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <div class="form-group">
                <label for="bid_amount">Place your bid:</label>
                <input type="number" name="bid_amount" id="bid_amount" class="form-control" min="<?php echo e($product->starting_bid); ?>" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Bid</button>
        </form>

        <a href="<?php echo e(route('products.indexforuser')); ?>" class="btn btn-secondary mt-2">Back to Products</a>
    </div>

 
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/user\productdetails.blade.php ENDPATH**/ ?>