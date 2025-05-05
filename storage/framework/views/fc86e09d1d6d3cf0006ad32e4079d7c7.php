<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!-- boostrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- boostrap icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- css link -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- material symbol link for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- font awsome kit -->
    <script src="https://kit.fontawesome.com/a48a021ab7.js" crossorigin="anonymous"></script>
</head>
<body>
    <header >
         <!-- nav bar -->
         <div class="fixed-top bg-light">
            <nav class="navbar  topNavbar navbar-expand-lg  border-bottom py-0 px-xl-5 topNavbar rounded" >
                <div class="container-fluid mx-xl-4">
                  <a class="navbar-toggler " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <span class="material-symbols-outlined">
                      menu
                      </span>
                  </a>
                  
                  <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-symbols-outlined">
                        menu
                        </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex mx-auto mt-3" role="search">
                    
                          <div class="input-group mb-3">
                            <input type="text" class="form-control text-center " type="search" placeholder="Search Items" aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-success" type="submit"id="button-addon2"><span class="material-symbols-outlined ">
                              search
                              </span></button>
                          </div>
                      </form>
                    <ul class="navbar-nav  mb-2 mb-lg-0 ">
                      
                      
                    
                      
                      <li class="nav-item">
                      
                                                <!-- Button trigger modal -->
                      <button type="button" class="btn nav-link text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        logout
                      </button>

                     

                      </li>
                      
                      <li class="nav-item dropdown">
                        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-symbols-outlined">
                                person_add
                                </span>
                          </button>
                        <ul class="dropdown-menu mt-2 shadow dropdown-menu-end">
                          <li><a class="dropdown-item" href="#">Log In </a></li>
                          <li><a class="dropdown-item" href="#">Sign Up</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                    </ul>
                    
                   
                  </div>
                </div>
              </nav>
         </div>
         <!-- offcanvas sidebar -->
        
         
          
          <div class="offcanvas offcanvas-start sidebar-nav border-0 bg-light shadow" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <div class="offcanvas-title " id="offcanvasExampleLabel">
                 <div>
                  <a class="navbar-brand px-3" href="#">
                    <img class="h-25 w-25"rounded-circle src="images/bidding.png" alt="">
                  </a>
                  <div class="text-success ps-3 fs-5 fw-bold">
                    online Bidding System
                   </div>
                 </div>
                  <hr class="text-dark mt-4 fw-bold px-0">
              </div>
               
                
               
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <nav>
                <ul class="navbar-nav">
                  <li>
                     <a href="#" class="nav-link active px-3   ">
                      <span class="text-dark"><i class="bi bi-house-door"></i></span>
                      Home
                     </a>
                  </li>
                  <li>
                     <a href="#" class="nav-link active px-3 ">
                      <span >
                        <i class="fa-solid fa-list"></i>
                        </span>
                      Categories
                     </a>
                  </li>
                  <li>
                     <a href="#" class="nav-link active px-3  ">
                      <span>
                        <i class="fa-solid fa-rectangle-list"></i>
                      </span>
                      Products
                     </a>
                  </li>
                  <hr class="text-dark fw-bold px-0 mb-4">
                  <li>
                    <a href="#" class="nav-link active px-3">
                     <span>
                      <i class="fa-solid fa-magnifying-glass-dollar"></i>
                     </span>
                     Bids
                    </a>
                 </li>
                  <li>
                    <a href="#" class="nav-link active px-3">
                     <span>
                      <i class="fa-solid fa-users"></i>
                     </span>
                     Users
                    </a>
                 </li>
                </ul>
              </nav>
          
            </div>
          </div>
         
    </header>
    <main class="">
        
<!-- resources/views/products/create.blade.php -->
<div class="mb-5">
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi molestiae rem est sint culpa ratione soluta necessitatibus mollitia, incidunt saepe id ipsam officiis, ipsa praesentium tempora assumenda delectus quaerat laborum?</p>
</div>
<div class="mb-5">
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi molestiae rem est sint culpa ratione soluta necessitatibus mollitia, incidunt saepe id ipsam officiis, ipsa praesentium tempora assumenda delectus quaerat laborum?</p>
</div>
<div class="mb-5">
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi molestiae rem est sint culpa ratione soluta necessitatibus mollitia, incidunt saepe id ipsam officiis, ipsa praesentium tempora assumenda delectus quaerat laborum?</p>
</div>
<div class="container mt-5">
<h1>Add Product</h1>

<form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="starting_bid">Starting Bid:</label>
        <input type="number" id="starting_bid" name="starting_bid" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="start_price">Start Price:</label>
        <input type="number" id="start_price" name="start_price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="bid_expiry">Bid Expiry:</label>
        <input type="date" id="bid_expiry" name="bid_expiry" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

</div>
 

    
  </main>
<!-- footer section -->
  <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
   
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
  

    


   <!-- boostrap js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\SD_Project\Online_Bidding_System\resources\views/admin\addproduct.blade.php ENDPATH**/ ?>