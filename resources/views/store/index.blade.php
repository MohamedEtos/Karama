@extends('store.layout.master')

@section('navbar')
@section('content')


    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->

        <!-- / Top banner -->
        <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
            <!-- Swiper Info -->
            <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
              "spaceBetween": 0,
              "slidesPerView": 1,
              "effect": "fade",
              "speed": 1000,
              "loop": true,
              "parallax": true,
              "observer": true,
              "observeParents": true,
              "lazy": {
                "loadPrevNext": true
                },
                "autoplay": {
                  "delay": 5000,
                  "disableOnInteraction": false
              },
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
                }
              }'>
              <div class="swiper-wrapper">

                @forelse ($adsStore as $adsStores )
                    <!--Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                        <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                            style=" will-change: transform; background-image: url({{asset($adsStores->img1)}})">
                        </div>
                        </div>
                        <div
                        class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                        <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">{{$adsStores->text1}}</p>
                        <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">{{$adsStores->text2}}</h2>
                        <div data-swiper-parallax-y="-25">
                            <a href="{{$adsStores->link}}" class="btn btn-psuedo text-white" role="button">{{$adsStores->text3}}</a>
                        </div>
                        </div>
                    </div>
                    <!--/Slide-->
                @empty
                    <!--Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                        <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                            style=" will-change: transform; background-image: url({{asset('Front-Store/images/front-image/357816973_114855631662728_4202261067649436702_n.jpg')}})">
                        </div>
                        </div>
                        <div
                        class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                        <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">نادي الكرامه الرياضي </p>
                        <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">يرحب بكم </h2>
                        <div data-swiper-parallax-y="-25">
                            <a href="https://www.facebook.com/karamacsclube?locale=ar_AR" class="btn btn-psuedo text-white" role="button">زورو موقعنا الان</a>
                        </div>
                        </div>
                    </div>
                    <!--/Slide-->
                @endforelse


              </div>

              <div class="swiper-pagination swiper-pagination-bullet-light"></div>

            </div>
            <!-- / Swiper Info-->        </section>
        <!--/ Top Banner-->
        <!-- Featured Brands-->
        <div class="brand-section container-fluid" data-aos="fade-in">
            <div class="bg-overlay-sides-white-to-transparent bg-white py-5 py-md-7">
                <section class="marquee marquee-hover-pause">
                    <div class="marquee-body">
                        <div class="marquee-section animation-marquee-50">

                            @foreach ($products as $product)
                                <div class="mx-3 mx-lg-5 f-w-24">
                                    <a class="d-block" href="{{'products?title='.$product->name}}">
                                        <picture>
                                            <img class=" lazy img-fluid d-table mx-auto" data-src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}"  alt="">
                                        </picture>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <div class="marquee-section animation-marquee-50">
                            @foreach ($products as $product)
                                <div class="mx-5 f-w-24">
                                    <a class="d-block" href="{{'products?title='.$product->name}}">
                                        <picture>
                                            <img class=" lazy img-fluid d-table mx-auto" data-src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="">
                                        </picture>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <!--/ Featured Brands-->

        <div class="container-fluid">

            <!-- Featured Categories-->
            <div class="m-0">
                    <!-- Swiper Latest -->
                    <div class="swiper-container overflow-hidden overflow-lg-visible"
                      data-swiper
                      data-options='{
                        "spaceBetween": 25,
                        "slidesPerView": 1,
                        "observer": true,
                        "observeParents": true,
                        "breakpoints": {
                          "540": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                          },
                          "770": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },
                          "1200": {
                            "slidesPerView": 4
                          },
                          "1500": {
                            "slidesPerView": 5
                          }
                        },
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        }
                      }'>
                      <div class="swiper-wrapper">


                        @foreach ($mainCatindex as $key => $mainCats)

                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <a href="{{'products?title='.$mainCats->subCatRelation->name}}">
                                <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="{{$key++}}00">
                                    <picture class="d-block mb-4 img-clip-shape-one">
                                        <img class=" lazy w-100" data-src="{{asset($mainCats->subCatRelation->catimg)}}"  alt="{{$mainCats->subCatRelation->name}}">
                                    </picture>
                                        <p class="title-small index-cat mb-2 text-muted">قسم</p>
                                        <h4 class="lead fw-bold index-cat">{{$mainCats->subCatRelation->name}}</h4>
                                        <a href="{{'products?title='.$mainCats->subCatRelation->name}}" class="btn btn-psuedo align-self-start index-cat">تسوق الان</a>
                                </div>
                            </a>
                        </div>



                          @endforeach

                      </div>

                      <div class="swiper-btn swiper-prev swiper-disabled-hide swiper-btn-side btn-icon bg-white text-dark ms-3 shadow mt-n5"><i class="ri-arrow-left-s-line "></i></div>
                      <div class="swiper-btn swiper-next swiper-disabled-hide swiper-btn-side swiper-btn-side-right btn-icon bg-white text-dark me-3 shadow mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>

                    </div>
                    <!-- / Swiper Latest-->                <!-- SVG Used for Clipath on featured images above-->
                <svg width="0" height="0">
                  <defs>
                  <clipPath id="svg-slanted-one" clipPathUnits="objectBoundingBox">
                      <path d="M0.822,1 H0.016 a0.015,0.015,0,0,1,-0.016,-0.015 L0.158,0.015 A0.016,0.015,0,0,1,0.173,0 L0.984,0 a0.016,0.015,0,0,1,0.016,0.015 L0.837,0.985 A0.016,0.015,0,0,1,0.822,1"></path>
                  </clipPath>
                  </defs>
                </svg>            </div>
            <!-- /Featured Categories-->

            <!-- Homepage Intro-->
            <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
                <div class="bg-text bottom-0 start-0 end-0" data-aos="fade-up">
                    <h2 class="bg-text-title opacity-10"><span class="text-outline-dark">Karama</span>.SC</h2>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right">
                    <p class="text-muted title-small">مرحبا</p>
                    <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark">نادي الكرامه</span> - نادي نابلسي حديث التأسيس بأيدي شبابية</h3>
                    <p class="lead">يهدف لنشر الوعي والتثقيف الرياضي والوطني وتعزيز روح الانتماء والعمل التطوعي من خلال تقديم الأنشطة.</p>
                    <p class="lead">الثقافية والرياضية والمجتمعية بجودة عالية وبالتعاون مع كوادر مؤهلة، وبهمة شباب متطوعين</p>
                    <a target="_blank" href="https://www.facebook.com/karamacsclube" class="btn btn-psuedo" role="button">زورونا علي فيس بوك</a>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 pe-200 SC_Image" data-aos="fade-left">
                    <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                        <img class="lazy img-fluid" data-src="{{asset('Front-Store/images/front-image/first.jpg')}}" src="" alt="Karama-SC">
                    </picture>
                    <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="lazy img-fluid" data-src="{{asset('Front-Store/images/front-image/357816973_114855631662728_4202261067649436702_n.jpg')}}" src="" alt="Karama-SC">
                    </picture>
                    <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="lazy img-fluid" data-src="{{asset('Front-Store/images/front-image/363744914_125960060558186_7383906757758911412_n.jpg')}}" src="" alt="Karama-SC">
                    </picture>
                </div>
            </div>
            <!-- / Homepage Intro-->

            <!-- bigsale Products-->

            <div class="row g-0">
                <div class="col-12" data-aos="fade-up">
                    <h1 data-aos="fade-right" data-aos-delay="300" class="fw-bolder mt-7 mb-4 text-center ">اكبر الخصومات <b>%</b></h1>
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

                        @foreach ($bigSale->take(15) as $product )


                            <div class="swiper-slide">
                              <!-- Card Product-->
                              <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                  <div class="card-img position-relative">

                                    @if($product->discount > 0)
                                    <div class="card-badges  ">
                                        <span class="badge badge-card text-success "><span class="f-w-2  bg-danger rounded-circle  d-block me-1 "></span>
                                            {{$product->discount}}
                                        </span>
                                    </div>
                                    <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted ">
                                        <i class="fa-solid fa-percent percent_cus text-success"></i>
                                    </span>
                                @endif
                                      <picture class="position-relative overflow-hidden d-block bg-light text-center">
                                          <img class=" lazy max-hight-image img-fluid position-relative z-index-10" title=""data-src="{{asset($product->productionToImgRealtions->mainImage)}}" src="" alt="">
                                      </picture>
                                          <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add">
                                                <img class=" lazy profile-user" alt="" data-src="{{asset($product->userToProduct->userToDetalis->ProfileImage  )}}" src="">
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
                                            <span class="text-danger">₪{{$product->ThePriceAfterDiscount}}</span>
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






            <!-- Homepage Banners-->
            <div class="pt-7 mb-5 mb-lg-10">
                <div class="row g-4">
                    <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                        <picture class="position-relative z-index-10">
                            <img class="lazy w-100 rounded"  src="./Front-Store/images/banners/banner-sale.jpg" alt="Karama-SC">
                        </picture>
                        <a href="/products?persent=10" class=" text-decoration-none">
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                                <div class="py-6 px-5 px-lg-10 text-center w-100">
                                    <h2 class="display-1 mb-3 fw-bold text-white"><span class="text-outline-light">%</span> خصومات</h2>
                                    <p class="fs-5 fw-light text-white d-none d-md-block">استمتع بتخفيضات ومميزات بطاقه الكرامه ونظام النقاط الاول في فلسطين .</p>
                                    <a href="/products?persent=10" class="btn btn-psuedo text-white" role="button">تسوق الان</a>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xl-6" data-aos="fade-left">

                        <div class="row g-4 justify-content-end">
                        @foreach ($mainCatindex->slice(0,4) as $mainCats4)
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10  d-block bg-light">
                                        <img class=" lazy w-100 rounded" data-src="{{asset($mainCats4->subCatRelation->catimg)}}" src="" alt="Karama-SC">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2">{{$mainCats4->subCatRelation->name}}</p>
                                        <a href="{{'products?title='.$mainCats4->subCatRelation->name}}" class="btn btn-psuedo text-white py-2" role="button">تسوق الان</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <!-- / Homepage Banners-->

            <!-- Instagram-->
            <!-- Swiper Instagram -->
            <div data-aos="fade-in">
              <h3 class="title-small text-muted text-center mb-3 mt-5">
                Karama-SC#
                <i class="fa-brands fa-facebook"></i>
            </h3>
            <div class="overflow-hidden">
              <div class="swiper-container swiper-overflow-visible"
                data-swiper
                data-options='{
                    "spaceBetween": 20,
                    "loop": true,
                    "autoplay": {
                      "delay": 5000,
                      "disableOnInteraction": false
                    },
                    "breakpoints": {
                      "400": {
                        "slidesPerView": 2
                      },
                      "600": {
                        "slidesPerView": 3
                      },
                      "999": {
                        "slidesPerView": 5
                      },
                      "1024": {
                        "slidesPerView": 6
                      }
                    }
                  }'>
                <div class="swiper-wrapper  mb-5">

                  <!-- Start of instagram slideshow loop for items-->
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/Picture3.jpg')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/Picture4.png')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/370535814_145500201937505_1366347796724185244_n.jpg')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/368186172_140638125757046_7431452159997000191_n.jpg')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/Picture5.png')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/376845284_154319064388952_4265585874842819422_n.jpg')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="lazy rounded shadow-sm img-fluid"
                        data-zoomable
                        data-src="{{asset('Front-Store/images/footerimage/428523398_259891790498345_41232519870495654_n.jpg')}}"
                        src=""
                        title=""
                        alt="">
                    </picture>
                  </div>

                  <!-- / end of items loop-->

                </div>
              </div>
            </div>
            </div>
            <!-- /Swiper Instagram-->
            <!-- / Instagram-->

        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->




@endsection
