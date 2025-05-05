<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <!-- css link -->
    <link rel="stylesheet" href="<?php echo e(asset('/user/style.css')); ?>">
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                               
                              <li class="nav-item">
                                    <a class="fw-bold nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                                </li>
                              <li class="nav-item">
                                    <a class="fw-bold nav-link" href="<?php echo e(route('user.account')); ?>">Your Account</a>
                                </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 ">

          <div>
            
 
          </div>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <footer class="text-center text-lg-start text-dark mt-5" style="background-color: #ECEFF1">
   
   <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192"  >
     
     <div class="me-5">
       <span>Get connected with us on social networks:</span>
     </div>
     <div id="contact">
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fa-brands fa-facebook"></i>
       </a>
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fab fa-twitter"></i>
       </a>
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fab fa-google"></i>
       </a>
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fab fa-instagram"></i>
       </a>
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fab fa-linkedin"></i>
       </a>
       <a href="" class="text-white me-4 text-decoration-none">
         <i class="fab fa-github"></i>
       </a>
     </div>
   </section>
   <!-- Section: Social media -->
   <section class="">
     <div class="container text-center text-md-start mt-5">
       <!-- Grid row -->
       <div class="row mt-3">
         <!-- Grid column -->
         <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
           <!-- Content -->
           <h6 class="text-uppercase fw-bold">Premier Bidding</h6>
           <hr
               class="mb-4 mt-0 d-inline-block mx-auto"
               style="width: 60px; background-color: #7c4dff; height: 2px"
               />
           <p>
             Best Online Auction Site Providing 100% Reliable and Secured Auctioning-Bidding Services.
           </p>
         </div>
         <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold">Products</h6>
           <hr
               class="mb-4 mt-0 d-inline-block mx-auto"
               style="width: 60px; background-color: #7c4dff; height: 2px"
               />
           <p>
             <a href="#!" class="text-dark text-decoration-none">Laptop </a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Mobile Phone</a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Smart Watch</a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Electronics</a>
           </p>
         </div>
        

       
         <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold">Useful links</h6>
           <hr
               class="mb-4 mt-0 d-inline-block mx-auto"
               style="width: 60px; background-color: #7c4dff; height: 2px"
               />
           <p>
             <a href="#!" class="text-dark text-decoration-none">Your Account</a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Become an Affiliate</a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Shipping Rates</a>
           </p>
           <p>
             <a href="#!" class="text-dark text-decoration-none">Help</a>
           </p>
         </div>

         <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold">Contact</h6>
           <hr
               class="mb-4 mt-0 d-inline-block mx-auto"
               style="width: 60px; background-color: #7c4dff; height: 2px"
               />
           <p><i class="fas fa-home mr-3"></i> Chittagong,Bangladesh</p>
           <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
           <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
           <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
         </div>
     
       </div>
   
     </div>
   </section>

   <!-- Copyright -->
   <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
        >
     © 2024 Copyright:
     <a class="text-dark" href="#"
        >beattingbd.com</a
       >
   </div>
   <!-- Copyright -->
 </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/layouts/app.blade.php ENDPATH**/ ?>