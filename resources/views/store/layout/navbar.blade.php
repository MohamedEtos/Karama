    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
        <div class="container-fluid">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <!-- Logo-->
                    <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="{{url('/')}}">
                        <div class="d-flex align-items-center ">
                            <img class="mainlogo" src="{{asset('assets/img/brand/logos-06.svg')}}" alt="">
                        </div>
                    </a>
                    <!-- / Logo-->

                    <!-- Navbar Icons-->
                    <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">

                        <!-- Mobile Nav Toggler-->
                        <li class="d-lg-none">
                            <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menu</span>
                        </li>
                        <!-- /Mobile Nav Toggler-->

                        <!-- Navbar Search-->
                        <li class="d-none d-sm-block">
                            <span class="nav-link text-body search-trigger cursor-pointer">بحث</span>

                            <!-- Search navbar overlay-->
                            <div class="navbar-search d-none">
                                <div class="input-group mb-3 h-100">
                                    <span class="input-group-text px-4 bg-transparent border-0"><i
                                            class="ri-search-line ri-lg"></i></span>
                                    <input type="text" class="form-control text-body bg-transparent border-0"
                                        placeholder="اكتب ما تبحث عنه">
                                    <span
                                        class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent border-0"><i
                                            class="ri-close-circle-line ri-lg"></i></span>
                                </div>
                            </div>
                            <div class="search-overlay"></div>
                            <!-- / Search navbar overlay-->

                        </li>
                        <!-- /Navbar Search-->

                        <!-- Navbar Login-->
                        <li class="ms-1 d-none d-lg-inline-block">
                            <a class="nav-link text-body" href="./login.html">
                                الحساب
                            </a>
                        </li>
                        <!-- /Navbar Login-->

                        <!-- Navbar Cart Icon-->
                        <li class="ms-1 d-inline-block position-relative dropdown-cart">
                            <button class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body"id="bell"
                            
                                type="button">
                                (<span id="countNotify">{{$notifyCount}}</span>)<i  class="fa-regular fa-bell @if ($notifyCount > 0)
                                    fa-shake
                                @endif fa-xl" style="--fa-animation-duration: 2.5s;"></i>
                            </button>
                            <div class="cart-dropdown dropdown-menu overflow-auto " style="max-height: 500px;">

                                <!-- Cart Header-->
                                <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-4">
                                    <h6 class="fw-bolder m-0">لديك ({{$notifyCount}}) اشعارات</h6>
                                    <form class="" id="form">
                                            @csrf
                                            @isset($notifyId)
                                            <input type="hidden" name="uId" value="{{$notifyId->reseverId}}">
                                            {{-- <button id="submit" type="submit"  class="badge badge-pill badge-warning mr-auto my-auto">ضع علامة  تم القراءة</button> --}}
                                            <i id="submitform" class="ri-close-line text-muted ri-lg cursor-pointer btn-close-cart"></i>
                                            @endisset
                                    </form>
                                </div>
                                <!-- / Cart Header-->

                                <!-- Cart Items-->
                                <div>

                                    <!-- Cart Product-->
                                    @forelse ( $notify as $NewData )
                                    <div class="row mx-0 py-4 g-0 border-bottom">
                                        <div class="col-2 position-relative">
                                            <picture class="d-block ">
                                                <img class="img-fluid w-50" src="{{asset($NewData->notifyMerchant->userToDetalis->ProfileImage)}}" alt="HTML Bootstrap Template by Pixel Rocket">
                                            </picture>
                                        </div>
                                        <div class="col-9  offset-1">
                                            <div style="margin-right: 10px">
                                                <h6 class="justify-content-between  d-flex align-items-start mb-2" >
                                                    {{$NewData->notifyMerchant->name}}
                                                {{-- <i class="ri-close-line ms-3"></i> --}}
                                                </h6>
                                                <span class="d-block text-muted fw-bolder text-uppercase fs-9" style="float: right">{{$NewData->messages}}</span>
                                            </div>
                                            <p class="fs-9 text-end text-muted m-0" style="float: left" >{{$NewData->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
    
                                    @empty
                                        
                                    @endforelse
                                                                        <!-- Cart Product-->
                                   
                                
                                <!-- / Cart Summary-->
                              </div>


                        </li>
                        <!-- /Navbar Cart Icon-->


                        <!-- Navbar Login-->
                        {{-- <li class="ms-1 d-none d-lg-inline-block">
                            <a class="nav-link text-body" href="./login.html">
                                Account
                            </a>
                        </li> --}}
                        <!-- /Navbar Login-->


                    </ul>
                    <!-- Navbar Icons-->

                    

                    <!-- Main Navigation-->
                    <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                        id="navbarNavDropdown">

                        <!-- Menu-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown dropdown position-static">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                الاقسام
                              </a>
                                <!-- Menswear dropdown menu-->
                                <div class="dropdown-menu dropdown-megamenu">
                                  <div class="container-fluid">
                                      <div class="row g-0 g-lg-3">
                                          <!-- Menswear Dropdown Menu Links Section-->
                                          <div class="col col-lg-8 py-lg-5">
                                              <div class="row py-3 py-lg-0 flex-wrap gx-4 gy-6">

                                                @foreach ($mainCatindex4 as $mainCats)

                                                  <!-- menu row-->
                                                  <div class="col">
                                                      <h6 class="dropdown-heading" style="float: right">{{$mainCats->subCatRelation->name}}</h6>
                                                      <ul class="list-unstyled">
                                                          <li class="dropdown-list-item"><a class="dropdown-item" href="./category.html">{{$mainCats->name}}</a></li>
                                                          <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./category.html">View All</a></li>
                                                      </ul>
                                                  </div>
                                                  <!-- / menu row-->

                                                  @endforeach





                                              </div>

                                              <div class="align-items-center justify-content-between mt-5 d-none d-lg-flex">

                                                @foreach ($mainCatindex6 as $mainCats )
                                                  <div class="me-5 f-w-20">
                                                      <a class="d-block" href="{{'products?search='.$mainCats->subCatRelation->name}}">
                                                          <picture>
                                                              <img class="img-fluid d-table mx-auto" src="{{asset($mainCats->subCatRelation->catimg)}}" alt="">
                                                          </picture>
                                                      </a>
                                                  </div>
                                                  @endforeach
                                                  
                                              </div>                  </div>
                                          <!-- /Menswear Dropdown Menu Links Section-->

                                          <!-- Menswear Dropdown Menu Images Section-->
                                          <div class="col-lg-4 d-none d-lg-block">
                                              <div class="vw-50 border-start h-100 position-absolute"></div>
                                              <div class="py-lg-5 position-relative z-index-10 px-lg-4">
                                                  <div class="row g-4">
                                                    @foreach ($mainCatindex4 as $mainCatindex )
                                                      <div class="col-12 col-md-6">
                                                          <div class="card justify-content-center d-flex align-items-center bg-transparent">
                                                              <picture class="w-100 d-block mb-2 mx-auto">
                                                                  <img class="w-100 rounded" title="" src="{{asset($mainCatindex->subCatRelation->catimg)}}" alt="HTML Bootstrap Template by Pixel Rocket">
                                                              </picture>
                                                              <a class="fw-bolder link-cover" href="{{'products?search='.$mainCatindex->subCatRelation->name}}">{{$mainCatindex->subCatRelation->name}}</a>
                                                          </div>
                                                      </div>
                                                      @endforeach
                                                      
                                                  </div>
                                                  <a href="./category.html" class="btn btn-link p-0 fw-bolder text-link-border mt-5 text-dark mx-auto d-table">Visit Mens Section</a>
                                              </div>
                                          </div>
                                          <!-- Menswear Dropdown Menu Images Section-->
                                      </div>
                                  </div>
                              </div>
                              <!-- / Menswear dropdown menu-->
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  علامات تجاريه
                                </a>
                                <ul class="dropdown-menu">
                                  @foreach ($merchants as $merchant )
                                    <li><a class="dropdown-item" href="{{'products?search='.$merchant->name}}">{{$merchant->name}}</a></li>
                                  @endforeach
                                </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('products')}}" role="button">
                                   المنتجات
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('products?persent=10')}}" role="button">
                                  خصومات %
                                </a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Pages
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="./index.html">Homepage</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Category</a></li>
                                  <li><a class="dropdown-item" href="./product.html">Product</a></li>
                                  <li><a class="dropdown-item" href="./cart.html">Cart</a></li>
                                  <li><a class="dropdown-item" href="./checkout.html">Checkout</a></li>
                                  <li><a class="dropdown-item" href="./login.html">Login</a></li>
                                  <li><a class="dropdown-item" href="./register.html">Register</a></li>
                                  <li><a class="dropdown-item" href="./forgotten-password.html">Forgotten Password</a></li>
                                </ul>
                              </li>
                          </ul>                    <!-- / Menu-->

                    </div>
                    <!-- / Main Navigation-->

                </div>
            </div>
        </div>
    </nav>
    <!-- / Navbar-->    <!-- / Navbar-->
