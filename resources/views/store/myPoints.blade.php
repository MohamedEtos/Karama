@extends('store.layout.master')

@section('navbar')
@section('content')

    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <!-- Breadcrumbs-->
        <div class="bg-dark py-3">
            <div class="container-fluid">
                <nav class="m-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                      {{-- <li class="breadcrumb-item breadcrumb-light"><a href="#"> الرئيسية </a></li>
                      <li class="breadcrumb-item breadcrumb-light"><a href="#">/ المنتجات</a></li>
                      <li class="breadcrumb-item  breadcrumb-light active" aria-current="page">{{$product_details->name}}</li> --}}


						<h3 class="breadcrumb-item breadcrumb-light ">
                            <a href="">
                                <img class="profile-user-detials  breadcrumb-light" alt="" src="">
                                <span class="hover-underline-animation">الرئيسية</span>
                            </a>
                        </h3>

                    </ol>
                </nav>            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">



            <!-- / Product Top Section-->

            <div class="row g-0">

                <!-- Related Products-->
                <div class="col-12" data-aos="fade-up">
                    <h2 class=" fw-bolder mt-7 mb-4 text-center">نقاطي</h2>
                    <!-- Swiper Latest -->
                    <div class="swiper-container" data-swiper data-options='{
                        "spaceBetween": 10,
                        "loop": false,
                        "autoplay": {
                          "delay": 5000,
                          "disableOnInteraction": false
                        },
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        },
                        "breakpoints": {
                          "600": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },
                          "1400": {
                            "slidesPerView": 4
                          }
                        }
                      }'>
                      <div class="swiper-wrapper">

                        @foreach ($mypoints as $mypoint )


                            <div class="swiper-slide">
                              <!-- Card Product-->
                              <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                  <div class="card-img position-relative">


                                      <picture class="position-relative overflow-hidden d-block  bg-light text-center" >
                                          <img class="max-hight-image w-50 img-fluid position-relative z-index-10" style="padding: 20px;" title="" src="{{asset($mypoint->pointTomerchant->userToDetalis->ProfileImage)}}" alt="">
                                      </picture>
                                          <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add">
                                                <span class="username">{{$mypoint->pointTomerchant->name}}</span>
                                            </button>
                                          </div>

                                  </div>
                                  <div class="card-body px-4">
                                      <a class="text-decoration-none link-cover" href="{{URL('MarketProfile/'.$mypoint->pointTomerchant->id)}}">
                                        <li> نقاطي <strong>{{$mypoint->points}} </strong></li>

                                      </a>
                                       <small class="text-muted d-block mt-1">
                                        <li> السعر <strong>{{$mypoint->price}}</strong></li>
                                       </small>

                                        <p class="mt-2 mb-0 ">
                                                <li class="text-muted">  اخر عمليه شراء <strong>{{$mypoint->updated_at->diffForHumans()}}</strong></li>

                                        </p>
                                  </div>
                              </div>
                              <!--/ Card Product-->
                            </div>

                        @endforeach

                      </div>

                      <!-- Add Arrows -->
                      <div
                        class="swiper-next top-50  start-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                        <i class="ri-arrow-left-s-line ri-lg"></i></div>
                      <div
                        class="swiper-prev top-50 end-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                        <i class="ri-arrow-right-s-line ri-lg"></i></div>


                    </div>
                    <!-- / Swiper Latest-->
                </div>



                    <!-- Reviews-->
                <div class="col-12 text-center" data-aos="fade-up">
                    <h3 class="fs-4 fw-bolder mt-7 mb-4 reviews">استبدال النقاط</h3>

                    <!-- Review Summary-->
                    <div class="bg-light p-3 py-5 justify-content-between d-flex flex-column flex-lg-row ">
                        <div class="d-flex flex-column align-items-center mb-4 mb-lg-0">
                            <!-- Review Stars Medium-->
                            <div class="rating position-relative d-table">

                            </div>    </div>
                        <div class="d-flex flex-grow-1 flex-column ms-lg-8">

                            @forelse ($mypoints as $mypoint)
                                <div class="d-flex align-items-center justify-content-start mb-2">
                                    <div class=" " style="width:15%">
                                        <!-- Review Stars Small-->
                                        <div class="rating position-relative d-table">
                                            {{$mypoint->pointTomerchant->name}}
                                        </div>
                                    </div>
                                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">

                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{($mypoint->points / $mypoint->pointTomerchant->merchantToRulesPoints->exchangeLimit) * 100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="fw-bold small d-block f-w-4 text-end">{{$mypoint->pointTomerchant->merchantToRulesPoints->exchangeLimit}} </span>
                                </div>
                            @empty

                            @endforelse







                            {{-- <p class="mt-3 mb-0 d-flex align-items-start"><i class="ri-chat-voice-line me-2"></i> 105 customers have reviewed this product</p> --}}
                        </div>
                    </div><!-- / Rewview Summary-->




                    </div>




                <!-- Pagination-->
                <div class="d-flex flex-column justify-content-center f-w-44 mx-auto my-5 text-center">
                    {{-- <small class="text-muted">عرض {{$related_products->count()}} من {{$related_products->total()}} منتج</small> --}}
                    <div class="progress f-h-1 mt-3">
                        {{-- <div class="progress-bar bg-dark" role="progressbar" style="width: {{$related_products->currentPage()/$related_products->lastPage()*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                    </div>
                    {{-- <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a> --}}
                    <div style="margin-top: 20px; padding-right:0px">
                        {{-- {{$related_products->links()}} --}}
                        <a href="/products">تسوق المنتجات</a>
                    </div>
                </div>
                <!-- / Pagination-->
            </div>



                <!-- / Reviews-->




        </div>





        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->




@endsection
