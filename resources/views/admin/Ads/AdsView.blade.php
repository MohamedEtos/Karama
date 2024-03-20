@extends('admin.layout.admin_master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 {{-- Toggle Button  --}}
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 {{-- Toggle Button  --}}
 <!-- Internal Data table css -->

<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/libs.bundle.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/theme.bundle.css')}}" rel="stylesheet">

<style>
    .modal-lg{
        max-width: 75% !important
    }
</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto  ">الاعلانات</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


{{-- row --}}
<div class="col-xl-12 ">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title mg-b-0">جدول الاعلانات</h3>
                <a href="{{route('StoreAdsView')}}" class="mdi mdi-dots-horizontal h3 text-gray"> اضافه اعلات</a>
            </div>
            {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive  userlist-table">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                        <tr  class="text-right">
                            <th class="wd-lg-5p  text-right"><span>صوره المتجر</span></th>
                            <th class="wd-lg-10p text-right"><span>المتجر</span></th>
                            <th class="wd-lg-10p text-right"><span>صوره الاعلان </span></th>
                            <th class="wd-lg-10p text-right"><span>بدايه الاعلان</span></th>
                            <th class="wd-lg-10p text-right"><span>نهايه الاعلان</span></th>
                            <th class="wd-lg-10p text-right"><span>حاله الاعلان</span></th>
                            <th class="wd-lg-10p text-right"><span>تكلفه اليوم الواحد</span></th>

                            <th class="wd-lg-10p text-right"> تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $AdsStore as $AdsStores)

                        <tr class="">
                            <a href="">
                                <td class="text-right">
                                    <img alt="avatar" class="wd-50p wd-sm-70" src="{{asset($AdsStores->User->userToDetalis->ProfileImage)}}">
                                </td>
                                <td class="text-right">
                                    {{$AdsStores->User->name}}
                                </td>
                                <td class="text-right">
                                    <img alt="avatar" class="wd-50p wd-sm-70" src="{{asset($AdsStores->img1)}}">
                                </td>

                                <td class="text-right">
                                    ({{Carbon\Carbon::parse($AdsStores->startAds)->diffForHumans()}})
                                    <small>({{Carbon\Carbon::parse($AdsStores->startAds)->toDateString()}})</small>
                                </td>
                                <td class="text-right">
                                    ({{Carbon\Carbon::parse($AdsStores->endAds)->diffForHumans()}})
                                    <small>({{Carbon\Carbon::parse($AdsStores->endAds)->toDateString()}})</small>
                                </td>
                                <td class="text-right">
                                    @if ($AdsStores->status == 'active')
                                        <span class="text-success">مفعل</span>
                                    @elseif($AdsStores->status == 'Stop')
                                        <span class="text-warning">تم الايقاف</span>
                                    @elseif($AdsStores->status == 'activeAT')
                                        <span class="text-success">سيبدا بعد ({{Carbon\Carbon::parse($AdsStores->startAds)->diffForHumans()}})</span>
                                    @else
                                        <span class="text-danger">انتهي</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    {{$AdsStores->price}}
                                </td>
                                <td class="text-right ">





                                    @if ($AdsStores->status == 'Stop' || $AdsStores->status == 'انتهي')
                                    <a href="#" class="btn ripple btn-sm btn-success" data-target="#modaldemosPlay{{$AdsStores->id}}" data-toggle="modal" href="">
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                    <!-- Large Modal -->
                                    <div class="modal" id="modaldemosPlay{{$AdsStores->id}}">
                                        <form action="{{route('resumeAds')}}" id="resumeAds" method="post">

                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">عرض الاعلان </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                        @csrf

                                                    <div class="col-12 mt-4 ">
                                                        <label for="startAds" class="form-label">تاريخ البدايه</label>
                                                        <input name="startAds" class="form-control " id="startAds"
                                                        onchange="setDate()"
                                                        value=""
                                                        min="10000000"
                                                        minlength="8" maxlength="8"  type="datetime-local"   required >
                                                        <div class="valid-feedback">
                                                            ممتاز !
                                                        </div>
                                                        <div class="invalid-feedback" id="startAds_error">
                                                            اختر تاريخ البدايه
                                                        </div>
                                                        @error('startAds')
                                                        <div class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                       @enderror
                                                      </div>

                                                      <input type="hidden" name="AdsId" value="{{Crypt::encrypt($AdsStores->id)}}">

                                                    <div class="col-12 mt-4 ">
                                                        <label for="endAds" class="form-label">تاريخ الانتهاء</label>
                                                        <input name="endAds" class="form-control " id="endAds"
                                                        value=""

                                                        min="10000000"
                                                        minlength="8" maxlength="8"  type="datetime-local"   required >
                                                        <div class="valid-feedback">
                                                            ممتاز !
                                                        </div>
                                                        <div class="invalid-feedback" id="endAds_error">
                                                            اختر تاريخ النهايه
                                                        </div>
                                                        @error('endAds')
                                                        <div class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                       @enderror
                                                      </div>


                                                </div>
                                                <div class="modal-footer">
                                                    {{-- <button class="btn ripple btn-danger btn-block " type="button">تم</button> --}}
                                                    <button class="btn ripple btn-danger btn-block" form="resumeAds"  type="submit">تم</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!--End Large Modal -->
                                    @endif


                                    @if ($AdsStores->status != 'Stop')
                                        <a  class="btn ripple btn-sm btn-warning text-center"  href="{{url('admin/StopAds/'.Crypt::encrypt($AdsStores->id))}}">
                                            <i class="fa-solid fa-stop"></i>
                                        </a>
                                    @endif


                                    <a href="#" class="btn ripple btn-sm btn-primary" data-target="#modaldemos{{$AdsStores->id}}" data-toggle="modal" href="">
                                        <i class="fa-brands fa-searchengin"></i>
                                    </a>



                                    <!-- Large Modal -->
                                    <div class="modal" id="modaldemos{{$AdsStores->id}}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">عرض الاعلان </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

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


                                                        <!--Slide-->
                                                        <div class="swiper-slide position-relative h-100 w-100">
                                                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                                                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                                                            style=" will-change: transform; background-image: url(/Front-Store/images/banners/banner-3.jpg)">
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

                                                </div>
                                                <div class="modal-footer">
                                                    {{-- <button class="btn ripple btn-danger btn-block " type="button">تم</button> --}}
                                                    <button class="btn ripple btn-danger btn-block" data-dismiss="modal" type="button">تم</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Large Modal -->




                                    <a class="btn btn-sm btn-danger modal-effect" data-target="#modaldemo{{$AdsStores->id}}" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo{{$AdsStores->id}}">
                                        {{-- <input type="hidden" name="userId"  value="{{$AdsStores->userToDetalis->id}}"> --}}
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                    <form action="{{route('deleteAds')}}" method="post">
                                        @csrf
                                        <!-- delete  Modal effects-->
                                        <div class="modal" id="modaldemo{{$AdsStores->id}}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content modal-content-demo">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">هل انت متاكد من عمليه الحذف</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>سيتم حذف الاعلان ولن تسطيع الرجوع في العمليه</h6>
                                                        <p class="text-center"><i class="fa-solid fa-triangle-exclamation tx-50 mb-2 text-warning fa-xl"></i></p>
                                                        <input type="hidden"   name="AdsId" value="{{Crypt::encrypt($AdsStores->id)}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn ripple btn-danger" type="submit">تاكيد</button>
                                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal effects-->
                                    </form>

                                </td>

                            </a>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- <ul class="pagination mt-4 mb-0 float-left">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul> --}}
            {{-- {{$product->links()}} --}}

        </div>
    </div>
</div>
{{-- /row --}}


<!-- Button trigger modal -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">

</div>
</div>
</div>

@if(Session::has('success'))
<input id="nofic" type="hidden" value="{{Session::get('success')}}">
<script>
    window.onload = function not7() {
    notif({
        msg: $('#nofic').val(),
        type: "success"
    });
}
</script>
@endif

@endsection

@section('js')
<!-- Internal Data tables -->
<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script> // now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/dataTables.buttons.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
<script src="{{URL::asset('Front-Store/js/vendor.bundle.js')}}"></script>

<!-- Theme JS -->
<script src="{{URL::asset('Front-Store/js/theme.bundle.js')}}"></script>


<script>
	// date auto set date
	// document.getElementById('startAds').valueAsDate = new Date();
	// document.getElementById('endAds').valueAsDate = new Date();

var now = new Date();
now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
document.getElementById('startAds').value = now.toISOString().slice(0,16);

</script>

@endsection
