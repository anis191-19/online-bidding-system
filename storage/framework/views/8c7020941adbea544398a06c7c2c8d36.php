<?php $__env->startSection('content'); ?>
<!-- analytic section  -->
 <section class="analytics p-5">
 <div class="row">
  <div class="col-sm-3 shadow bg-body p-0 mx-auto rounded" >
    <div class="card h-100" >
      <div class="card-body">
        <h4 class="card-title text-center fw-bold">Total auctions</h4>
        <h1 class="text-center fw-bold " style="color: lightblue;">55,000</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-3 shadow bg-body p-0 mx-auto rounded">
    <div class="card h-100">
      <div class="card-body">
        <h4 class="card-title text-center fw-bold">Total Users</h4>
        <h1 class="text-center fw-bold"  style="color: lightpink;">55,000</h1>
      
      </div>
    </div>
  </div>
  <div class="col-sm-3 shadow bg-body p-0 mx-auto rounded">
    <div class="card  h-100" >
      <div class="card-body">
        <h4 class="card-title text-center  fw-bold">Active Auctions</h4>
        <h1 class="text-center fw-bold " style="color: thistle;">55,000</h1>
      </div>
    </div>
  </div>
  
</div>
 </section>
<!-- bids section -->
 <h1 class="text-center">Welcome to Admin Dashboard</h1>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>