@extends('admin.layout.admin_master')
@section('css')
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header rounded justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-light ">مراجعه  </h4><span class=" text-light mt-1 tx-13 mr-2 mb-0">/ المنتج رقم {{$product->id}}</span>
						</div>
					</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row m-3">


					<div class="col-lg-6 col-md-6">
						<div class="card custom-card">
							<div class="card-body ht-100p">
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

                    <div class="card col-md-6">
                        <div class=" card-body">
                            <div class="col-12 h5 ">الاسم :  <span class="bold"> {{$product->name}}</span></div>
                            <div class="col-12 h5 ">المتجر :  <span class="bold"> {{$product->userToProduct->name}}</span></div>
                            <div class="col-12 h5 ">القسم :  <span class="bold"> {{$product->productionToCategoryRealtions->name}}</span></div>
                            <div class="col-12 h5 ">بيانات المنتج :  <span class="bold"> {{$product->productDescription}}</span></div>
                            <div class="col-12 h5 ">تفاصيل المنتج :  <span class="bold"> {{$product->productDetalis}}</span></div>
                            <div class="col-12 h5 ">السعر :  <span class="bold"> {{$product->price}}</span></div>
                            <div class="col-12 h5 ">الخصم :  <span class="bold"> {{$product->discount}}</span></div>
                            <div class="col-12 h5 ">السعر بعد الخصم :  <span class="bold"> {{$product->ThePriceAfterDiscount}}</span></div>
                            <div class="col-12 h5 ">القبول ! :   
                                @if ($product->append == 1)
                                <span class="bold text-success  ">تمت الموافقه</span> <i class="fa-regular fa-circle-check text-success"></i>
                                @elseif ($product->append == 2)
                                <span class="bold text-danger  ">مرفوضه</span> <i class="fa-regular fa-circle-xmark text-danger"></i>
                                @elseif ($product->append == 0)
                                <span class="bold text-warning  ">بانتظار الاجراء</span> <i class="fa-regular fa-circle-xmark text-warning"></i>
                                @endif
                        </span></div>
                        </div>
                        <div class="card-footer">
                            @if ($product->append == 0)
                            <form action="{{route('appendProduct')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block ">موافقه</button>
                                <input type="hidden" name="status" value="true">
                                <input type="hidden" name="id" value="{{$product->id}}">
                            </form>
                            @elseif ($product->append == 2)
                            <form action="{{route('appendProduct')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block ">موافقه</button>
                                <input type="hidden" name="status" value="true">
                                <input type="hidden" name="id" value="{{$product->id}}">
                            </form>
                            @endif


                            @if($product->append == 1)
                                <a class="btn btn-danger btn-block modal-effect mt-1" data-target="#modaldemo1" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo1">
                                    {{-- <input type="hidden" name="userId"  value="{{$merchants->userToDetalis->id}}"> --}}
                                    رفض
                                </a>
                            @endif
                            @if($product->append == 0)
                                <a class="btn btn-danger btn-block modal-effect mt-1" data-target="#modaldemo1" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo1">
                                    {{-- <input type="hidden" name="userId"  value="{{$merchants->userToDetalis->id}}"> --}}
                                    رفض
                                </a>
                            @endif


                        
                        <!-- delete  Modal effects-->
                        <form action="{{Route('unappendProduct')}}" method="post">
                            @csrf
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">اكتب رساله الرفض الخاصه بالمنتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6></h6>
                                            <textarea rows="5"  class="form-control" name="redjectmass"   type="text">أهلا بك يا {{$product->userToProduct->name}} &#13;&#10; ناسف علي رفض منتجك  بسبب &#13;&#10;   </textarea>
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

                    @if($product->append == 2)
                    <div class="col-12 card">
                        <p class="card-body">سبب الرفض</p>
                    </div>
                    @endif

                    <div class="col-12">
                        <a href="{{route('allProducts')}}" class="btn btn-info btn-block ">الرجوع لجدول المنتجات </a>
                    </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!---Internal  Multislider js-->
<script src="{{URL::asset('assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{URL::asset('assets/js/carousel.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection