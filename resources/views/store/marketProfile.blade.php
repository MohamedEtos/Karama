@extends('store.layout.master')

@section('navbar')
@section('content')
<div class="container-fulid  h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 p-0">
        <div class="card" >
          <div class=" text-white coverImage d-flex flex-row bg-overlay-dark bg-pos-center-center " style="background-image: url({{asset($marketData->userToDetalis->coverImage)}}); height:300px;">
            <div class="ms-4 mt-5  d-flex flex-column profile_image " data-aos="fade-right" data-aos-delay="300" style="width: 150px; z-index:300">
              <img src="{{asset($marketData->userToDetalis->ProfileImage)}}" alt="Generic placeholder image" class="img-fluid img-thumbnail z-index-20  mt-4 mb-2" style="width: 150px; z-index: 1">
              {{-- <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                Edit profile
              </button> --}}
            </div>
            <div class="ms-3 bg-img-cover text-light " data-aos="fade-right" data-aos-delay="300" style="margin-top: 230px; z-index:300" >
              <h3 class="bold">{{$marketData->name}}</h3>
              <p class="bold">{{$marketData->userToDetalis->userToCategory->name}}</p>
            </div>
          </div>
          <div class="p-4 text-dark" style="background-color: #f8f9fa88; z-index:250">
            <div class="d-flex justify-content-end text-center py-1 p-3"data-aos="fade-left" data-aos-delay="300" style="z-index:300">
              <div>
                <p class="mb-1 h5">{{$visetorCounter}}</p>
                <p class="small text-muted mb-0">الزوار</p>
              </div>
              {{-- <div class="px-3">
                <p class="mb-1 h5">{{$usersPoints}}</p>
                <p class="small text-muted mb-0">نقاط العملاء</p>
              </div> --}}
              <div class="px-3">
                <p class="mb-1 h5">{{$usersPoints}}</p>
                <p class="small text-muted mb-0">نقاط العملاء</p>
              </div>
              <div>
                <p class="mb-1 h5">{{$pointlimit->transferPoints}}</p>
                <p class="small text-muted mb-0">علي 100 نقطه </p>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid" data-aos="fade-in">
    <!-- Category Toolbar-->
        <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                      <li class="breadcrumb-item"><a href="#"></a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$marketData->name}}</li>
                    </ol>
                </nav>        <h1 class="fw-bold fs-3 mb-2">تم العثور علي ({{$productt->total()}})</h1>
                <p class="m-0 text-muted small">عرض {{$productt->count()}} من {{$productt->total()}} منتج</p>
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                <!-- Filter Trigger-->
                <button class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                    <i class="ri-equalizer-line me-2"></i> Filters
                </button>
                <!-- / Filter Trigger-->

                <!-- Sort Options-->
                    <select class="form-select form-select-sm border-0 bg-light p-3 m-3 pe-5 lh-1 fs-7">
                        <option selected>Sort By</option>
                        <option value="1">Hi Low</option>
                        <option value="2">Low Hi</option>
                        <option value="3">Name</option>
                    </select>
                <!-- / Sort Options-->
            </div>
        </div>            <!-- /Category Toolbar-->

    <!-- productt-->
    <div class="row g-4">

        @foreach ($productt as $product)

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
    <!-- / productt-->

    <!-- Pagination-->
    <div class="d-flex flex-column justify-content-center f-w-44 mx-auto my-5 text-center">
        <small class="text-muted">عرض {{$productt->count()}} من {{$productt->total()}} منتج</small>
        <div class="progress f-h-1 mt-3">
            <div class="progress-bar bg-dark" role="progressbar" style="width: {{$productt->currentPage()/$productt->lastPage()*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        {{-- <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load More</a> --}}
        <div style="margin-top: 20px; padding-right:0px">
            {{-- {{ $productt->total() }} --}}

            {{$productt->links()}}

            <a href="/products">كل المنتجات</a>
        </div>

    </div>            <!-- / Pagination-->
</div>

        <!-- Featured Brands-->
        <div class="brand-section container-fluid" data-aos="fade-in">
            <div class="bg-overlay-sides-white-to-transparent  py-5 py-md-7">
                <section class="marquee marquee-hover-pause">
                    <div class="marquee-body">
                        <div class="marquee-section animation-marquee-50">


                            @foreach ($products as $product)

                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="{{'/products?title='.$product->name}}">
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
                                <a class="d-block" href="{{'/products?title='.$product->name}}">
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
    <div class="offcanvas-header pb-0 d-flex align-items-center">
      <h5 class="offcanvas-title" id="offcanvasFiltersLabel">فلاتر البحث</h5>
      <button type="button" class="btn-close text-reset"  data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="d-flex flex-column justify-content-between w-100 h-100">

        <!-- Filters-->
      <div>

          <form action="{{url('product/')}}" method="GET">

          <!-- Price Filter -->
          <div class="py-4 widget-filter widget-filter-price border-top">
            <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
              data-bs-toggle="collapse" href="#filter-modal-title" role="button" aria-expanded="true"
              aria-controls="filter-modal-price">
              بحث
            </a>
            <div id="filter-modal-title" class="collapse show">
              <div class="d-flex justify-content-between align-items-center mt-3">
                  <div class="input-group mb-0 ms-2 border">
                      {{-- <input type="text" placeholder=" ... اكتب ما تبحث عنه" name="title" min="00" max="10000" step="any" class="filter-max form-control filter-search rounded" aria-label="Search"> --}}
                          <input type="text" name="title" class="form-control py-2 filter-search rounded" placeholder=" ... اكتب ما تبحث عنه"
                          aria-label="Search">
                          <span class="input-group-text bg-transparent p-2 position-absolute top-10 end-0 border-0 z-index-20"><i
                          class="ri-search-2-line text-muted"></i></span>
                  </div>
              </div>

          </div>
          </div>
          <!-- / Price Filter -->

          <!-- Price Filter -->
          <div class="py-4 widget-filter widget-filter-price border-top">
            <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
              data-bs-toggle="collapse" href="#filter-modal-price" role="button" aria-expanded="true"
              aria-controls="filter-modal-price">
              السعر
            </a>
            <div id="filter-modal-price" class="collapse show">
              <div class="filter-price mt-6"></div>
              <div class="d-flex justify-content-between align-items-center mt-7">
                  <div class="input-group mb-0 me-2 border">
                      <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">₪</span>
                      <input type="number" name="startPrice" min="00" max="10000" step="any" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                  </div>
                  <div class="input-group mb-0 ms-2 border">
                      <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">₪</span>
                      <input type="number" name="endPrice" min="00" max="10000" step="any" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                  </div>
              </div>

          </div>
          </div>
          <!-- / Price Filter -->

          <!-- Brands Filter -->
          <div class="py-4 widget-filter border-top">
            <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
              data-bs-toggle="collapse" href="#filter-modal-brands" role="button" aria-expanded="true"
              aria-controls="filter-modal-brands">
              علامات تجاريه
            </a>
            <div id="filter-modal-brands" class="collapse show">
              <div class="input-group my-3 py-1">
                <input type="text" class="form-control py-2 filter-search rounded" placeholder=" ... بحث"
                  aria-label="Search">
                <span class="input-group-text bg-transparent p-2 position-absolute top-10 end-0 border-0 z-index-20"><i
                    class="ri-search-2-line text-muted"></i></span>
              </div>
              <div class="simplebar-wrapper">
                <div class="filter-options" data-pixr-simplebar>

                  @foreach ($merchants as $i => $merchantsBrands )


                  <div class="form-group form-check-custom mb-1">
                      <input type="checkbox" name="brandName[]" value="{{$merchantsBrands->id}}" class="form-check-input" id="filter-brands-modal-{{$i}}">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex align-items-center"
                          for="filter-brands-modal-{{$i}}">{{$merchantsBrands->name}}  <span
                              class="text-muted ms-1 fs-9">
                              {{-- ({{count($merchants)}}) --}}
                          </span></label>
                  </div>
                  @endforeach


                  </div>
              </div>
            </div>
          </div>
          <!-- / Brands Filter -->

          {{-- <!-- Sizes Filter -->
          <div class="py-4 widget-filter border-top">
            <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
              data-bs-toggle="collapse" href="#filter-modal-sizes" role="button" aria-expanded="true"
              aria-controls="filter-modal-sizes">
              Sizes
            </a>
            <div id="filter-modal-sizes" class="collapse show">
              <div class="filter-options mt-3">
                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-0">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-0">6.5</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-1">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-1">7</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-2">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-2">7.5</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-3">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-3">8</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-4">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-4">8.5</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-5">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-5">9</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-6">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-6">9.5</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-7">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-7">10</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-8">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-8">10.5</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-9">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-9">11</label>
                </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-10">
                    <label class="form-check-label fw-normal" for="filter-sizes-modal-10">11.5</label>
                </div>            </div>
            </div>
          </div>
          <!-- / Sizes Filter --> --}}

          <!-- Colour Filter -->
          {{-- <div class="py-4 widget-filter border-top">
            <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
              data-bs-toggle="collapse" href="#filter-modal-colour" role="button" aria-expanded="true"
              aria-controls="filter-modal-colour">
              Colour
            </a>
            <div id="filter-modal-colour" class="collapse show">
              <div class="filter-options mt-3">
                <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-primary">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-0">
                    <label class="form-check-label" for="filter-colours-modal-0"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-success">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-1">
                    <label class="form-check-label" for="filter-colours-modal-1"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-2">
                    <label class="form-check-label" for="filter-colours-modal-2"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-3">
                    <label class="form-check-label" for="filter-colours-modal-3"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-4">
                    <label class="form-check-label" for="filter-colours-modal-4"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-dark">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-5">
                    <label class="form-check-label" for="filter-colours-modal-5"></label>
                </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-secondary">
                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-6">
                    <label class="form-check-label" for="filter-colours-modal-6"></label>
                </div>            </div>
            </div>
          </div> --}}
          <!-- / Colour Filter -->
                      <!-- discound Filter -->
                      <div class="py-4 widget-filter widget-filter-discound border-top">
                          <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-discound" role="button" aria-expanded="true"
                            aria-controls="filter-modal-price">
                            خصومات
                          </a>
                          <div id="filter-modal-discound" class="collapse show">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                    {{-- <input type="text" placeholder=" ... اكتب ما تبحث عنه" name="title" min="00" max="10000" step="any" class="filter-max form-control filter-search rounded" aria-label="Search"> --}}
                                        {{-- <input type="text" name="title" class="form-control py-2 filter-search rounded" placeholder=" ... اكتب ما تبحث عنه"> --}}

                                        <select name="persent"  class="form-control persent form-control-sm" id="">
                                            <option value="">حدد نسبه خصم %</option>
                                            <option value="10">10%</option>
                                            <option value="20">20%</option>
                                            <option value="30">30%</option>
                                            <option value="40">40%</option>
                                            <option value="50">50%</option>
                                            <option value="60">60%</option>
                                            <option value="70">70%</option>
                                            <option value="80">80%</option>
                                            <option value="90">90%</option>
                                        </select>
                            </div>

                        </div>
                      </div>

                        <!-- / discound Filter -->
        </div>
        <!-- / Filters-->

        <!-- Filter Button-->
        <div class="border-top pt-3">
          <button href="#" type="submit" class="btn w-100 btn-dark mt-2 d-block hover-lift-sm hover-boxshadow" data-bs-dismiss="offcanvas" aria-label="Close">بحث</button>
        </div>
        <!-- /Filter Button-->
      </form>
      </div>
    </div>
  </div>

@endsection
