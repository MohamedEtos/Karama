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

                <!-- Slide-->
                <div class="swiper-slide position-relative h-100 w-100">
                  <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                    <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                      style=" will-change: transform; background-image: url(./Front-Store/images/banners/banner-1.jpg)">
                    </div>
                  </div>
                  <div
                    class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                    <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Everything You Need</p>
                    <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                      <span class="text-outline-light">Summer</span> Essentials</h2>
                    <div data-swiper-parallax-y="-25">
                      <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop New Arrivals</a>
                    </div>
                  </div>
                </div>
                <!-- /Slide-->

                <!-- Slide-->
                <div class="swiper-slide position-relative h-100 w-100">
                  <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                    <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                      style=" will-change: transform; background-image: url(./Front-Store/images/banners/banner-2.jpg)">
                    </div>
                  </div>
                  <div
                    class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                    <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Spring Collection</p>
                    <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                      Adidas <span class="text-outline-light">SS21</span></h2>
                    <div data-swiper-parallax-y="-25">
                      <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop Latest Adidas</a>
                    </div>
                  </div>
                </div>
                <!--/Slide-->

                <!-- Slide-->
                <div class="swiper-slide position-relative h-100 w-100">
                  <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                    <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                      style=" will-change: transform; background-image: url(./Front-Store/images/banners/banner-4.jpg)">
                    </div>
                  </div>
                  <div
                    class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                    <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Just Do it</p>
                    <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                      Nike <span class="text-outline-light">SS21</span></h2>
                    <div data-swiper-parallax-y="-25">
                      <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop Latest Nike</a>
                    </div>
                  </div>
                </div>
                <!-- /Slide-->

                <!--Slide-->
                <div class="swiper-slide position-relative h-100 w-100">
                  <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                    <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                      style=" will-change: transform; background-image: url(./Front-Store/images/banners/banner-3.jpg)">
                    </div>
                  </div>
                  <div
                    class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                    <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Look Good Feel Good</p>
                    <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                      <span class="text-outline-light">Sustainable</span> Fashion</h2>
                    <div data-swiper-parallax-y="-25">
                      <a href="./category.html" class="btn btn-psuedo text-white" role="button">Why We Are Different</a>
                    </div>
                  </div>
                </div>
                <!--/Slide-->

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
                                <a class="d-block" href="./category.html">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="">
                                    </picture>
                                </a>
                            </div>


                            @endforeach

                        </div>
                        <div class="marquee-section animation-marquee-50">

                            @foreach ($products as $product)

                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./category.html">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="">
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
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="{{$key++}}00">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="{{asset($mainCats->subCatRelation->catimg)}}" alt="Karama-SC">
                                </picture>
                                    <p class="title-small mb-2 text-muted">قسم</p>
                                    <h4 class="lead fw-bold">{{$mainCats->subCatRelation->name}}</h4>
                                    <a href="{{'products?title='.$mainCats->subCatRelation->name}}" class="btn btn-psuedo align-self-start">تسوق الان</a>
                            </div>
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
                        <img class="img-fluid" src="{{asset('Front-Store/images/front-image/first.jpg')}}" alt="Karama-SC">
                    </picture>
                    <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="img-fluid" src="{{asset('Front-Store/images/front-image/357816973_114855631662728_4202261067649436702_n.jpg')}}" alt="Karama-SC">
                    </picture>
                    <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="img-fluid" src="{{asset('Front-Store/images/front-image/363744914_125960060558186_7383906757758911412_n.jpg')}}" alt="Karama-SC">
                    </picture>
                </div>
            </div>
            <!-- / Homepage Intro-->

            <!-- Homepage Banners-->
            <div class="pt-7 mb-5 mb-lg-10">
                <div class="row g-4">
                    <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                        <picture class="position-relative z-index-10">
                            <img class="w-100 rounded" src="./Front-Store/images/banners/banner-sale.jpg" alt="Karama-SC">
                        </picture>
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                            <div class="py-6 px-5 px-lg-10 text-center w-100">
                                <h2 class="display-1 mb-3 fw-bold text-white"><span class="text-outline-light">%</span> خصومات</h2>
                                <p class="fs-5 fw-light text-white d-none d-md-block">استمتع بتخفيضات ومميزات بطاقه الكرامه ونظام النقاط الاول في فلسطين .</p>
                                <a href="/products?persent=10" class="btn btn-psuedo text-white" role="button">تسوق الان</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6" data-aos="fade-left">

                        <div class="row g-4 justify-content-end">
                        @foreach ($mainCatindex->slice(0,4) as $mainCats4)
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10  d-block bg-light">
                                        <img class="w-100 rounded" src="{{asset($mainCats4->subCatRelation->catimg)}}" alt="Karama-SC">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2">{{$mainCats4->subCatRelation->name}}</p>
                                        <a href="{{'products?title='.$mainCats->subCatRelation->name}}" class="btn btn-psuedo text-white py-2" role="button">تسوق الان</a>
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
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="{{asset('Front-Store/images/footerimage/Picture3.jpg')}}"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="{{asset('Front-Store/images/footerimage/Picture4.png')}}"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="https://scontent.fcai22-1.fna.fbcdn.net/v/t39.30808-6/380524442_161747346979457_4719575090658964206_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_ohc=hVa1y7EOlZIAX8Kprch&_nc_ht=scontent.fcai22-1.fna&oh=00_AfDn8TlJ0MIMGklRlLq3JOzvq0p9bqVCiQ-3IwwX0T-wqA&oe=65F6F94D"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="https://scontent.fcai22-2.fna.fbcdn.net/v/t39.30808-6/430061800_264625656691625_2773649789593442638_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=jWZvdZCCxnwAX_BYUL3&_nc_ht=scontent.fcai22-2.fna&oh=00_AfAYtZi-BNORR-EE6Dhph0E5U9ToxSn7cNjVbZ8UmGPScw&oe=65F7A02E"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="{{asset('Front-Store/images/footerimage/Picture5.png')}}"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="https://scontent.fcai22-2.fna.fbcdn.net/v/t39.30808-6/427961275_248481478306043_96700725318700946_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=VZl59_F2Gv4AX81D9EH&_nc_ht=scontent.fcai22-2.fna&oh=00_AfCfu74au6vFzRep6xIqcCjHx10LOSGmzzCakTayvNUbow&oe=65F821BC"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="https://scontent.fcai22-1.fna.fbcdn.net/v/t39.30808-6/380524442_161747346979457_4719575090658964206_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_ohc=hVa1y7EOlZIAX8Kprch&_nc_ht=scontent.fcai22-1.fna&oh=00_AfDn8TlJ0MIMGklRlLq3JOzvq0p9bqVCiQ-3IwwX0T-wqA&oe=65F6F94D"
                        title=""
                        alt="">
                    </picture>
                  </div>
                  <div class="swiper-slide flex-column align-self-center">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="https://scontent.fcai22-2.fna.fbcdn.net/v/t39.30808-6/380532617_160548627099329_8811326390498668422_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_ohc=GYPqkd4YEcYAX9CHEtK&_nc_ht=scontent.fcai22-2.fna&oh=00_AfB_bB0rgWCXX3Qh7CL9ZLyyYkAYx1bu9pxhxBLrAzNSrg&oe=65F6D763"
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
