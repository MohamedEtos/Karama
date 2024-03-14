@extends('layouts.users.master')

@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/nestDropdown.css')}}">

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

.card{
	border-radius: 10px;
}

.card-img-top{
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
}

.mid{
	background: #ECEDF1;
}

small.key{
	text-decoration: underline;
	cursor: pointer;
}
.btn-danger{
	color: #FFCBD2;
}
.btn-danger:focus{
	box-shadow: none;
}
small.justify-content-center{
	font-size: 9px;
	cursor: pointer;
	text-decoration: underline;
}

@media screen and (max-width:600px){
    .col-sm-4{
        margin-bottom: 50px;
    }
}
</style>
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header mt-3 justify-content-between mb-2 rounded ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">العروض والمنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
                {{-- <input type="hidden" id="UID" value="{{Auth::User()->id}}"> --}}

					<div class="row ">

                        @foreach ($products as $product)
						<div class="col-sm-3">
								<a href="">
								<div class="card">
								  <img src="{{asset($product->productionToImgRealtions->mainImage)}}" class="card-img-top" width="100%">
								  <div class="card-body pt-2 px-0">
									<div class="d-flex flex-row tx-20 justify-content-between mb-0 px-3">
									  <small class="text-muted tx-20 mt-1">عرض المتجر</small>
									  <h3>&#8362;22,495</h3>
									</div>
									<hr class="mt-2 mx-3">
									<div class="d-flex flex-row justify-content-between px-3 pb-4">
									  <div class="d-flex flex-column"><span class="text-muted">خصم</span><small class="text-muted">L/100KM&ast;</small></div>
									  <div class="d-flex flex-column"><h5 class="mb-0">% <b>{{$product->discount}}</b></h5><small class="text-muted text-right">(city/Hwy)</small></div>
									</div>
									<div class="d-flex flex-row justify-content-between p-3 mid">
									  <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small><div class="d-flex flex-row"><img src="https://imgur.com/iPtsG7I.png" width="35px" height="25px"><div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div></div></div>
									  <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small><div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png"><h6 class="ml-1">135 hp&ast;</h6></div></div>
									</div>
									<small class="text-muted key pl-3">Standard key Features</small>
									<div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block"><small>BUILD & PRICE</small></button></div>
									<small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
								  </div>
								</div>
							</a>
							</div>
						@endforeach

					</div>
					<div class="col-12 w-100 pagination ">
						{{$products->links()}}
					</div>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
{{-- <script src="{{URL::asset('assets/js/rangeliderNavbar.js')}}"></script> --}}




<script>


</script>
@endsection
