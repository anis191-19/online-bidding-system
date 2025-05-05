<?php $__env->startSection('content'); ?>

<h1>Edit Product</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <!-- Display success or error messages -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Form for editing the product -->
                    <form method="POST" action="<?php echo e(route('products.update', $product->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', $product->name)); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" required><?php echo e(old('description', $product->description)); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="starting_bid">Starting Bid:</label>
                            <input type="number" id="starting_bid" name="starting_bid" class="form-control" value="<?php echo e(old('starting_bid', $product->starting_bid)); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="bid_expiry">Bid Expiry:</label>
                            <input type="date" id="bid_expiry" name="bid_expiry" class="form-control" value="<?php echo e(old('bid_expiry', $product->bid_expiry)); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" class="form-control">
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('images/' . $product->image)); ?>" width="100" height="100" class="mt-2">
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update Product</button>
                        <a href="<?php echo e(route('products.indexforadmin')); ?>" class="btn btn-secondary mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/admin/edit-product.blade.php ENDPATH**/ ?>