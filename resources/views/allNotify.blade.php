@extends( (Auth::User()->subtype == 'merchant') ? 'merchant.layout.merchant_master' : 'layouts.users.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css-rtl/allNotify.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				{{-- <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex bg-danger title-brand">
							<h4 class="content-title  mb-0 my-auto   p-3 text-white">Adiddas</h4>
						</div>
					</div>

				</div> --}}

{{--				<div class="row  title-brand mb-3 mt-2">--}}
{{--					<div class="col-12 p-2 text-white">--}}
{{--						<h3><a href="" class="text-white"></a></h3>--}}
{{--					</div>--}}
{{--				</div>--}}
				<!-- breadcrumb -->
@endsection
@section('content')
{{-- <input type="hidden" id="UID" value="{{Auth::User()->id}}"> --}}

<div class="row mt-5">
    <div class="col-md-8 col-xl-7 mx-auto">
        <div class="card">
            <div class="card-title border-bottom">
                <div class="row p-5">
                    <div class="col-6 h4">كل الاشعارات</div>
                    <div class="col-6 tx-22 ">
                        <i class="fa-regular fa-bell fa-xl  float-left "></i>
                    </div>
                </div>
            </div>
            <div class=" card-body">
                <div class="main-chat-body" id="ChatBody">
                    <div class="content-inner  notify-scroll">

                        @forelse ($allNotify as $notifcation)
                            <div class="media border-bottom">
                                <div class="main-img-user online"><img alt="" src="{{URL::asset($notifcation->notifyMerchant->userToDetalis->ProfileImage)}}"></div>
                                <div class="media-body">
                                    <div class="main-msg-wrapper left tx-16">
                                       {{$notifcation->messages }}

                                    </div>
                                    <div>
                                        <span>{{$notifcation->created_at->diffForHumans()}}</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h1 class="m-auto text-center">لا يوجد اشعارات</h1>
                            <div class="text-center ">
                                <a href="{{url('/')}}" class="w-100 mt-5 btn btn-lg  btn-danger mt-3">الرئيسية</a>
                            </div>
                        @endforelse



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
@endsection
@section('js')





@endsection
