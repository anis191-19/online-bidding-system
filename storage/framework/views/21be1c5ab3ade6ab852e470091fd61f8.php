<?php $__env->startSection('content'); ?>
<div class="bid-banner p-5">
     
    <div class=" fw-bold fs-1  text-white text-center">Welcome To Our <br>ONLINE BIDDING SYSTEM</div>
    <h1 class=" fw-bold fs-1  text-white text-center">BETTER...FASTER...MORE</h1>
    
    
</div>


    
<div class="container ">
<div class="py-4 ">
    <h1 class="text-center my-3 text-success fw-bold bg-white">Products List For Bidding</h1>
    <div class="d-flex flex-row ">
        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary mb-2">All</a>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('home', ['category_id' => $category->id])); ?>" class="btn btn-secondary mb-2 mx-2">
                <?php echo e($category->name); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col mb-5">
    <div class="card h-75">
    <img src="<?php echo e(asset('images/' . $product->image)); ?>" class="card-img-top h-100" alt="<?php echo e($product->name); ?>">
      
    </div>
    <div class="my-2">
      <h5 class="card-title fw-bold"><?php echo e($product->name); ?></h5>
        <p class="card-text"><?php echo e($product->description); ?></p>
        <a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>" class="btn btn-info">Details</a>
      </div>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</div>

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Online_Bidding_System\resources\views/home.blade.php ENDPATH**/ ?>