<?php $__env->startSection('content'); ?>
   



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td>
                                    <!-- Link to Update page -->
                                    <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-warning btn-sm">Update</a>
                                </td>
                                <td>
                                    <!-- Form for delete action -->
                                    <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>

                  
                 <!-- ******************* 
                  form to add new categories 
                  ************************************* -->
                    <button href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Click to Add a category</button>
                 <?php if(session('addSuccess')): ?>
                    <div class="alert alert-success my-2">
                        <?php echo e(session('addSuccess')); ?>

                    </div>
                <?php endif; ?>
                 <?php if(session('addError')): ?>
                    <div class="alert alert-danger my-2">
                        <?php echo e(session('addError')); ?>

                    </div>
                <?php endif; ?>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Add new Catagory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- form to submit  -->
                    <form action="<?php echo e(route('category.create')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Category-name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  
                    
                    </div>
                </div>
                </div>





                   
                </div>
            </div>
        </div>
    </div>

  <?php $__env->stopSection(); ?>

    


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Online_Bidding_System\resources\views/admin\categories.blade.php ENDPATH**/ ?>