@extends('admin.layout.admin_master')
@section('css')
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')

@endsection
@section('content')

				<!-- row -->

                @forelse ($ReviewProducts as $product )
                    				<!-- breadcrumb -->
				<div class="breadcrumb-header rounded justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto   ">مراجعه  </h4><span class="   mt-1 tx-13 mr-2 mb-0"> / المنتج رقم {{$product->id}}</span>
						</div>
					</div>

					</div>
				<!-- breadcrumb -->
				<div class="row m-3 ">

                    <div class="card mb-0 col-md-6 ">
                        <div class=" card-body ht-100p h-100">

                            <div class="col-12 d-block d-sm-block d-md-none">
                                <div class=" custom-card  ">
                                    <div class=" ht-100p ">
                                        <div>
                                            <h6 class="card-title mb-1">صور المنتج</h6>
                                            <p class="text-muted card-sub-title">قم بمراجعه الصور اولاً</p>
                                        </div>
                                        <div>
                                            <div class="carousel slide" data-ride="carousel" id="carouselExample3">
                                                <ol class="carousel-indicators">
                                                    <li class="active" data-slide-to="0" data-target="#carouselExample3"></li>
                                                    <li data-slide-to="1" data-target="#carouselExample3"></li>
                                                    <li data-slide-to="2" data-target="#carouselExample3"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->mainImage)}}">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->img2)}}">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->img3)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 h5 ">الاسم :  <span class="bold"> {{$product->name}}</span></div>
                            <div class="col-12 h5 ">المتجر :  <span class="bold"> {{$product->userToProduct->name}}</span></div>
                            <div class="col-12 h5 ">القسم :  <span class="bold"> {{$product->productionToCategoryRealtions->name}}</span></div>
                            <div class="col-12 h5 ">بيانات المنتج :  <span class="bold"> {{$product->productDescription}}</span></div>
                            <div class="col-12 h5 ">تفاصيل المنتج :  <span class="bold"> {{$product->productDetalis}}</span></div>
                            <div class="col-12 h5 ">السعر :  <span class="bold"> {{$product->price}}</span></div>
                            <div class="col-12 h5 ">الخصم :  <span class="bold"> {{$product->discount}}</span></div>
                            <div class="col-12 h5 ">السعر بعد الخصم :  <span class="bold"> {{$product->ThePriceAfterDiscount}}</span></div>
                            <div class="col-12 h5 ">القبول ! :  <span class="bold text-success  ">
                                @if ($product->append == 1)
                                تمت الموافقه
                                @endif
                        </span></div>
                        </div>
                        <div class="card-footer">
                            @if (!$product->append == 1)
                            <form action="{{route('appendProduct')}}" method="post">
                                @csrf
                                @can('قبول منتجات')
                                    <button type="submit" class="btn btn-success btn-block ">موافقه</button>
                                    <input type="hidden" name="status" value="true">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                @endcan

                            </form>
                            @endif

                            @can('رفض منتجات')
                                <a class="btn btn-danger btn-block modal-effect" data-target="#modaldemo{{$product->id}}" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo{{$product->id}}">
                                    {{-- <input type="hidden" name="userId"  value="{{$merchants->userToDetalis->id}}"> --}}
                                    رفض
                                </a>
                            @endcan



                            <!-- delete  Modal effects-->
                            <form action="{{Route('unappendProduct')}}" method="post">
                                @csrf
                                <div class="modal" id="modaldemo{{$product->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">اكتب رساله الرفض الخاصه بالمنتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6></h6>
                                                <textarea rows="5"  class="form-control" name="redjectmass"   type="text">أهلا بك يا {{$product->userToProduct->name}}  &#13;&#10; ناسف علي رفض منتجك  بسبب :&#13;&#10;   </textarea>
                                                {{-- <input type="hidden"   name="merchantId" value="{{Crypt::encrypt()}}"> --}}
                                                <input type="hidden"   name="productsId" value="{{$product->id}}">

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn ripple btn-danger" type="submit">ارسال</button>
                                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Modal effects-->

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-none d-md-block ">
						<div class="card mb-0 custom-card h-100 p-0">
							<div class="card-body  ht-100p ">
								<div>
									<h6 class="card-title mb-1">صور المنتج</h6>
									<p class="text-muted card-sub-title">قم بمراجعه الصور اولاً</p>
								</div>
								<div>
									<div class="carousel slide" data-ride="carousel" id="carouselExample3">
										<ol class="carousel-indicators">
											<li class="active" data-slide-to="0" data-target="#carouselExample3"></li>
											<li data-slide-to="1" data-target="#carouselExample3"></li>
											<li data-slide-to="2" data-target="#carouselExample3"></li>
										</ol>
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->mainImage)}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->img2)}}">
											</div>
											<div class="carousel-item">
												<img alt="img" class="d-block w-100" src="{{asset($product->productionToImgRealtions->img3)}}">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>




				</div>
                @empty

                <h2 class=" mt-5 d-flex justify-content-center text-center text-danger">لا يوجد منتجات تحت المراجعه</h2>

                @endforelse
                <div class="col-12  d-flex justify-content-center">
                    {{$products->links()}}
                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

        @if(Session::has('reject'))
<input id="nofic" type="hidden" value="{{Session::get('reject')}}">
<script>
    window.onload = function not7() {
    notif({
        msg: $('#nofic').val(),
        type: "error"
    });
}
</script>
@endif
@endsection
@section('js')
<!---Internal  Multislider js-->
<script src="{{URL::asset('assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{URL::asset('assets/js/carousel.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
