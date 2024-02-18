@extends( (Auth::User()->subtype == 'merchant') ? 'merchant.layout.merchant_master' : 'layouts.users.master')
@section('css')


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
<input type="hidden" id="UID" value="{{Auth::User()->id}}">

<div class="row mt-5">
    @forelse ($mypoints as $mypoint )
    <div class="col-sm-6 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center pricing ">
                <div class="card-category">{{$mypoint->pointTomerchant->name}}</div>
                <div class="display-4 my-4 w-25 m-auto">            <div class="widget-user-image">
                    <img src="{{URL::asset($mypoint->pointTomerchant->userToDetalis->ProfileImage)}}" class="brround" alt="User Avatar">
                </div></div>
                <ul class="list-unstyled leading-loose">
                    <li> نقاطي <strong>{{$mypoint->points}} </strong></li>
                    <li> السعر <strong>{{$mypoint->price}}</strong></li>
                    <li>  اخر عمليه شراء <strong>{{$mypoint->updated_at->diffForHumans()}}</strong></li>
                    {{-- <li> الحد الادني لستبدال النقاط <strong>{{$mypoint->pointTomerchant->pointRules->transferPoints}}</strong></li> --}}
                </ul>
                <div class="text-center mt-4">
                    <a href="{{URL('MarketProfile/'.$mypoint->pointTomerchant->id)}}" class="btn btn-pink btn-block">زياره المتجر</a>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->

    @empty

    @endforelse


</div>


</div>
</div>
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Piety js -->
<script src="{{URL::asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>




@endsection
