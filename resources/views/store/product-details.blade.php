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
                            <a href="{{url('MarketProfile/'.$merchantData->id)}}">
                                <img class="profile-user-detials  breadcrumb-light" alt="" src="{{asset($merchantData->userToDetalis->ProfileImage)}}">
                                <span class="hover-underline-animation">{{$merchantData->name}}</span>
                            </a>
                        </h3>

                    </ol>
                </nav>            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">

            <!-- Product Top Section-->
            <div class="row g-9" data-sticky-container>

                <!-- Product Images-->
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="row g-3" data-aos="fade-right">
                        <div class="col-12">
                            <picture>
                                <img class="img-fluid w-100 max-h-product" data-zoomable src="{{asset($product_details->productionToImgRealtions->mainImage)}}" alt="Karama-SC">
                            </picture>
                        </div>
                        <div class="col-12">
                            <picture>
                                <img class="img-fluid w-100 max-h-product" data-zoomable src="{{asset($product_details->productionToImgRealtions->img2)}}" alt="Karama-SC">
                            </picture>
                        </div>
                        <div class="col-12">
                            <picture>
                                <img class="img-fluid w-100 max-h-product" data-zoomable src="{{asset($product_details->productionToImgRealtions->img3)}}" alt="Karama-SC">
                            </picture>
                        </div>

                    </div>
                </div>
                <!-- /Product Images-->

                <!-- Product Information-->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="sticky-top top-5">
                        <div class="pb-3" data-aos="fade-in">
                            <div class="d-flex align-items-center mb-3">
                                <p class="small fw-bolder text-uppercase tracking-wider text-muted m-0 me-4">KiiKii</p>
                                <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                                data-pixr-scrollto
                                data-target=".reviews">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 80%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>        <small class="text-muted d-inline-block ms-2 fs-bolder">({{$productRevew}} reviews)</small>
                            </div>
                            </div>

                            <h1 class="mb-1 fs-2 fw-bold">{{$product_details->name}}</h1>
                            <div class="d-flex justify-content-start align-items-center">
                                <h4 class="fs-4 m-0 ">₪{{$product_details->ThePriceAfterDiscount}}</h4>
                                <s class="text-muted" style="padding-right: 20px">₪{{$product_details->price}}</s>
                                <span class="text-muted h4" style="padding-right: 20px">% {{$product_details->discount}} خصم</span>
                            </div>
                            <div class="border-top mt-4 mb-3 product-option">
                                <small class="text-uppercase pt-4 d-block fw-bolder">
                                    <span class="text-muted">بيانات التواصل</span> : <span class="selected-option fw-bold"
                                        data-pixr-product-option="size">{{$merchantData->userToDetalis->phone}}</span>
                                </small>
                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                            <div class="form-check-option form-check-rounded">
                                                <input
                                                    type="radio"
                                                    name="product-option-sizes"
                                                    value="{{$merchantData->userToDetalis->phone}}"
                                                    id="option-sizes-0">
                                                <label for="option-sizes-0">

                                                    <small><i class="fa-brands fa-whatsapp"></i></small>
                                                </label>
                                            </div>                    <div class="form-check-option form-check-rounded">
                                                <input
                                                    type="radio"
                                                    name="product-option-sizes"
                                                    value="{{$merchantData->userToDetalis->phone}}"
                                                    checked
                                                    id="option-sizes-1">
                                                <label for="option-sizes-1">

                                                    <small>  <i class="fa-solid fa-phone"></i></small>
                                                </label>
                                            </div>                    <div class="form-check-option form-check-rounded">
                                                <input
                                                    type="radio"
                                                    name="product-option-sizes"
                                                    value="{{$merchantData->userToDetalis->facebook}}"

                                                    id="option-sizes-2">
                                                <label for="option-sizes-2">

                                                    <small><i class="fa-brands fa-facebook-f"></i></small>
                                                </label>
                                            </div>                    <div class="form-check-option form-check-rounded">
                                                <input
                                                    type="radio"
                                                    name="product-option-sizes"
                                                    value="{{$merchantData->userToDetalis->website}}"
                                                    id="option-sizes-3">
                                                <label for="option-sizes-3">

                                                    <small><i class="fa-solid fa-link"></i></small>
                                                </label>
                                            </div>                    <div class="form-check-option form-check-rounded">
                                                <input
                                                    type="radio"
                                                    name="product-option-sizes"
                                                    value="{{$merchantData->userToDetalis->location}}"
                                                    id="option-sizes-4">
                                                <label for="option-sizes-4">

                                                    <small><i class="fa-solid fa-location-dot"></i></small>
                                                </label>
                                            </div>
                                                          </div>
                            </div>
                            <div class="mb-3 ">
                                <small class="text-uppercase pt-4 d-block fw-bolder text-muted">
                                    الفروع:
                                </small>
                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                    {{-- <picture class="me-2">
                                        <img class="f-w-24 p-2 bg-light border-bottom border-dark border-2 cursor-pointer" src="../Front-store/images/products/product-page-thumb-1.jpeg" alt="Karama-SC">
                                    </picture>
                                    <picture>
                                        <img class="f-w-24 p-2 bg-light cursor-pointer" src="../Front-store/images/products/product-page-thumb-2.jpeg" alt="Karama-SC">
                                    </picture> --}}
                                    <p class="text-muted">{{$merchantData->userToDetalis->location}}</p>

                                </div>
                            </div>
                            <div class="mb-3 border-top">
                                <small class="text-uppercase pt-4 d-block fw-bolder text-muted">
                                    {{$merchantData->userToDetalis->bio}}
                                </small>
                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                    {{-- <picture class="me-2">
                                        <img class="f-w-24 p-2 bg-light border-bottom border-dark border-2 cursor-pointer" src="../Front-store/images/products/product-page-thumb-1.jpeg" alt="Karama-SC">
                                    </picture>
                                    <picture>
                                        <img class="f-w-24 p-2 bg-light cursor-pointer" src="../Front-store/images/products/product-page-thumb-2.jpeg" alt="Karama-SC">
                                    </picture> --}}

                                </div>
                            </div>
                            <a target="_blank" href="https://wa.me/{{$merchantData->userToDetalis->whatsapp}}" class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">مراسله المتجر</a>

                            <!-- Product Highlights-->
                                <div class="my-5">
                                    <div class="row">
                                        <a target="_blank" href="https://wa.me/{{$merchantData->userToDetalis->whatsapp}}" class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="fa-brands fa-whatsapp fa-2xl"></i>
                                                <small class="d-block h6 mt-2" style="padding-top: 15px">WhatsApp</small>
                                            </div>
                                        </a>
                                        <a target="_blank" href="{{$merchantData->userToDetalis->facebook}}" class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="fa-brands fa-facebook-f fa-2xl"></i>
                                                <small class="d-block h6 mt-2" style="padding-top: 15px">FaceBook</small>
                                            </div>
                                        </a>
                                        <a target="_blank" href="tel:{{$merchantData->userToDetalis->phone}}" class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="fa-solid fa-phone fa-2xl"></i>
                                                <small class="d-block h6 mt-2" style="padding-top: 15px">Call  </small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <!-- / Product Highlights-->

                            <!-- Product Accordion -->
                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <h5>وصف المنتج</h5>
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <p class="m-0">{{$product_details->productDescription}}.</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5>تفاصيل المنتج</h5>
                                      </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProduct">
                                      <div class="accordion-body">
                                        <p class="m-0">{{$product_details->productDetalis}}.</p>

                                      </div>
                                    </div>
                                  </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h5>قسم المنتج</h5>
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                <span class="col-4 fw-bolder">{{$product_details->productionToCategoryRealtions->name}}</span>
                                                <span class="col-4 fw-bolder">{{$product_details->subCatMerchant->name}}</span>
                                            </li>

                                        </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- / Product Accordion-->
                        </div>                    </div>
                </div>
                <!-- / Product Information-->
            </div>
            <!-- / Product Top Section-->

            <div class="row g-0">

                <!-- Related Products-->
                <div class="col-12" data-aos="fade-up">
                    <h3 class="fs-4 fw-bolder mt-7 mb-4">ذ ذات صله</h3>
                    <!-- Swiper Latest -->
                    <div class="swiper-container" data-swiper data-options='{
                        "spaceBetween": 10,
                        "loop": true,
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

                        @foreach ($related_products as $related_product )


                            <div class="swiper-slide">
                              <!-- Card Product-->
                              <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                  <div class="card-img position-relative">

                                    @if($related_product->discount > 0)
                                    <div class="card-badges  ">
                                        <span class="badge badge-card text-success "><span class="f-w-2  bg-danger rounded-circle  d-block me-1 "></span>
                                            {{$related_product->discount}}
                                        </span>
                                    </div>
                                    <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted ">
                                        <i class="fa-solid fa-percent percent_cus text-success"></i>
                                    </span>
                                @endif
                                      <picture class="position-relative overflow-hidden d-block bg-light text-center">
                                          <img class="max-hight-image img-fluid position-relative z-index-10" title="" src="{{asset($related_product->productionToImgRealtions->mainImage)}}" alt="">
                                      </picture>
                                          <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add">
                                                <img class="profile-user" alt="" src="{{asset($related_product->userToProduct->userToDetalis->ProfileImage  )}}">
                                                <span class="username">{{ $related_product->userToProduct->name }}</span>
                                            </button>
                                          </div>

                                  </div>
                                  <div class="card-body px-0">
                                      <a class="text-decoration-none link-cover" href="{{url('product-details/'.Crypt::encrypt($related_product->id))}}">{{$related_product->name}}</a>
                                       <small class="text-muted d-block">{{$related_product->productDescription}}</small>

                                        <p class="mt-2 mb-0 ">
                                            @if ($related_product->discount > 0)
                                            <s class="text-muted">₪{{$related_product->price}}</s>
                                            @endif
                                            <span class="text-danger">₪{{$related_product->ThePriceAfterDiscount}}</span>
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

                <!-- Pagination-->
                <div class="d-flex flex-column justify-content-center f-w-44 mx-auto my-5 text-center">
                    {{-- <small class="text-muted">عرض {{$related_products->count()}} من {{$related_products->total()}} منتج</small> --}}
                    <div class="progress f-h-1 mt-3">
                        {{-- <div class="progress-bar bg-dark" role="progressbar" style="width: {{$related_products->currentPage()/$related_products->lastPage()*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> --}}
                    </div>
                    {{-- <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a> --}}
                    <div style="margin-top: 20px; padding-right:0px">
                        {{-- {{$related_products->links()}} --}}
                        <a href="/products">كل المنتجات</a>
                    </div>
                </div>
                <!-- / Pagination-->
            </div>

                <!-- / Reviews-->



                            <!-- Products-->
            <div class="row g-4">

                @foreach ($products as $product)

                    <div class="col-12 col-sm-6 col-lg-3">
                        <!-- Card Product-->
                        <div class="card border border-transparent position-relative overflow-hidden h-auto  transparent">
                            <div class="card-img position-relative">

                                @if($product->discount > 0)
                                    <div class="card-badges  ">
                                        <span class="badge badge-card  text-success"><span class="f-w-2  bg-danger rounded-circle  d-block me-1 "></span>
                                            {{$product->discount}}
                                        </span>
                                    </div>
                                    <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted">
                                        <i class="fa-solid fa-percent  percent_cus text-success"></i>
                                    </span>
                                @endif

                                <picture class="position-relative overflow-hidden d-block bg-light text-center">
                                    <img class="max-hight-image img-fluid position-relative z-index-10" title="" src="{{asset($product->productionToImgRealtions->mainImage)}}" alt="">
                                </picture>
                                    <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                        <button class="btn btn-quick-add">
                                            <img class="profile-user" alt="" src="{{$product->userToProduct->userToDetalis->ProfileImage}}">
                                            <span class="username">{{ $product->userToProduct->name }}</span>
                                        </button>
                                    </div>
                            </div>
                            <div class="card-body px-0">
                                <a class="text-decoration-none link-cover" href="{{url('product-details/'.Crypt::encrypt($product->id))}}">{{$product->name}}</a>
                                <small class="text-muted d-block">{{$product->productDescription}}</small>
                                        <p class="mt-2 mb-0 ">
                                            @if ($product->discount > 0)
                                            <s class="text-muted">₪{{$product->price}}</s>
                                            @endif
                                            <span class="text-danger m-2">₪{{$product->ThePriceAfterDiscount}}</span>
                                        </p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    @endforeach


            </div>
            <!-- / Products-->
        </div>

                        <!-- Pagination-->
                        <div class="d-flex flex-column justify-content-center f-w-44 mx-auto my-5 text-center">
                            <small class="text-muted">عرض {{$products->count()}} من {{$products->total()}} منتج</small>
                            <div class="progress f-h-1 mt-3">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: {{$products->currentPage()/$products->lastPage()*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a> --}}
                            <div style="margin-top: 20px; padding-right:0px">
                                {{$products->links()}}
                                {{-- <a href="/products">كل المنتجات</a> --}}
                            </div>
                        </div>
                        <!-- / Pagination-->



        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->




@endsection
