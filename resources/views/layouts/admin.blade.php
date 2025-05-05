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
    <link rel="stylesheet" href="{{ asset('/admin/style.css') }}">

    <!-- material symbol link for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- font awsome kit -->
    <script src="https://kit.fontawesome.com/a48a021ab7.js" crossorigin="anonymous"></script>
</head>
<body style=" background-color: aliceblue;">
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
                      
                      
                    
                     
                      
                 @auth('admin')
                                <li class="nav-item text-center my-auto">
                                 
                                     <h4> {{ Auth::guard('admin')->user()->name }}
                                     </h4>
                                    </li>
                            @else
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login.form') }}">Login</a>
                              </li>
                    @endauth
                       
                    
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
                    <img class="h-25 w-25"rounded-circle src="{{url('images/bidding.png')}}" alt="">
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
                     <a href="{{url('admin/admin_dashboard')}}" class="nav-link active px-3   ">
                      <span class="text-dark"><i class="bi bi-house-door"></i></span>
                      Home
                     </a>
                  </li>
                  <li>
                    <a href="{{url('/categories/admin')}}" class="nav-link active px-3 ">
                      <span >
                        <i class="fa-solid fa-list"></i>
                        </span>
                      Categories
                     </a>
                  </li>
                  <li>
                     <a href="{{url('/admin/products')}}" class="nav-link active px-3  ">
                      <span>
                        <i class="fa-solid fa-rectangle-list"></i>
                      </span>
                      Products
                     </a>
                  </li>
                  <hr class="text-dark fw-bold px-0 mb-4">
                  <!-- <li>
                    <a href="#" class="nav-link active px-3">
                     <span>
                      <i class="fa-solid fa-magnifying-glass-dollar"></i>
                     </span>
                     Bids
                    </a>
                 </li> -->
                  <li>
                    <a href="{{url('admin/users')}}" class="nav-link active px-3">
                     <span>
                      <i class="fa-solid fa-users"></i>
                     </span>
                     Users
                    </a>
                 </li>
                 
                 <li>
                    <a href="{{url('/admin/winner-list')}}" class="nav-link active px-3 ">
                    <i class="fa-solid fa-magnifying-glass-dollar"></i>
                     Winners List
                    </a>
                 </li>
                 <li>
                    <a href="{{url('admin/logout')}}" class="nav-link active px-3 ">
                     <span>
                     <i class="bi bi-box-arrow-right"></i>
                     </span>
                     Sign Out 
                    </a>
                 </li>
                </ul>
              </nav>
          
            </div>
          </div>
         
    </header>
    <main >
   
         @yield('content')

 

    
  </main>

  

    


   <!-- boostrap js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>