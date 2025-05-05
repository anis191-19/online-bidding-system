<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Sidebar for categories -->
            <div class="col-md-3">
                <h3>Categories</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="<?php echo e(route('products.indexforuser')); ?>">All</a></li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('products.indexforuser', ['category_id' => $category->id])); ?>">
                                <?php echo e($category->name); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <!-- Main content area -->
            <div class="col-md-9">
                <form action="<?php echo e(route('products.search')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Search for products...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>" class="btn btn-info">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/user\index.blade.php ENDPATH**/ ?>