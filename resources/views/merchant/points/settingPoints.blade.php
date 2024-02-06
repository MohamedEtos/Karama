@extends('merchant.layout.merchant_master')
@section('css')


<style>

</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header text-light rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">النتقاط</h4><span class="text-light mt-1 tx-13 mr-2 mb-0">/ اعدادات النقاط</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">
                        <div class="col-md-8 col-xl-6 col-xs-12 col-sm-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form  action="{{url('merchant/exchangePoints')}}" method="POST" id="pointsForm" class="row g-3 "   >
                                        @csrf
                                        <div class="loader_cu">
                                            <div class="loading">
                                                <div class="loading-bar"></div>
                                                <div class="loading-bar"></div>
                                                <div class="loading-bar"></div>
                                                <div class="loading-bar"></div>
                                                <div class="loading-bar"></div>
                                            </div>
                                        </div>
                                            <div class="col-6">
                                                <span class="h4">
                                                    اعدادات النقاط
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span>
                                                    <i class="fa-solid fa-arrow-right-arrow-left fa-2xl float-left ml-4   text-danger"></i>
                                                </span>
                                            </div>
                                        <div class="col-12 mt-5 text-center mb-5    ">
                                            <h5>برجاء التواصل معي الاداره لتغير اعدادات النقاط</h5>
                                        </div>

                                    </form>

                            </div>
                        </div>
                    </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->

		</div>


@endsection
@section('js')







@endsection

