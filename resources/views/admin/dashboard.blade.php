@extends('admin.layout.admin_master')
@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
@endsection
@section('page-header')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

	<!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body iconfont text-right">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">المنتجات المعروضه	</h4>
                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <div class="d-flex mb-0">
                        <div class="">
                            <h4 class="mb-1 font-weight-bold"><span class="text-success tx-13 ml-2"> </span></h4>
                            <p class="mb-2 tx-12 text-muted">المنتجات اللتي تم الموافقه عليها</p>
                        </div>
                        <div class="card-chart bg-primary-transparent brround mr-auto mt-0">
                            <i class="typcn typcn-group-outline text-primary tx-24"></i>
                        </div>
                    </div>

                    <div class="progress progress-sm mt-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="" style="width: %" class="progress-bar bg-primary " role="progressbar"></div>
                    </div>
                    <small class="mb-0  text-muted"><span class="float-left text-muted"> </span></small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body iconfont text-right">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">عدد الزوار لمتجرك</h4>
                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <div class="d-flex mb-0">
                        <div class="">
                            <h4 class="mb-1   font-weight-bold">{{ $onlineUsersCount }}<span class="text-success tx-13 ml-2"></span></h4>
                                <p class="mb-2 tx-12 text-muted">Overview of Last month</p>
                        </div>
                        <div class="card-chart bg-pink-transparent brround mr-auto mt-0">
                            <i class="typcn typcn-chart-line-outline text-pink tx-24"></i>
                        </div>
                    </div>

                    <div class="progress progress-sm mt-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-pink wd-50p" role="progressbar"></div>
                    </div>
                    <small class="mb-0  text-muted">Monthly<span class="float-left text-muted">50%</span></small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body iconfont text-right">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Bounce Rate</h4>
                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <div class="d-flex mb-0">
                        <div class="">
                            <h4 class="mb-1   font-weight-bold">76.3%<span class="text-success tx-13 ml-2">(+13.52%)</span></h4>
                            <p class="mb-2 tx-12 text-muted">Overview of Last month</p>
                        </div>
                        <div class="card-chart bg-teal-transparent brround mr-auto mt-0">
                            <i class="typcn typcn-chart-bar-outline text-teal tx-20"></i>
                        </div>
                    </div>

                    <div class="progress progress-sm mt-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-teal wd-60p" role="progressbar"></div>
                    </div>
                    <small class="mb-0  text-muted">Monthly<span class="float-left text-muted">60%</span></small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body iconfont text-right">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Visits Duration</h4>
                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <div class="d-flex mb-0">
                        <div class="">
                            <h4 class="mb-1 font-weight-bold">5m 24s<span class="text-success tx-13 ml-2">(+19.5%)</span></h4>
                            <p class="mb-2 tx-12 text-muted">Overview of Last month</p>
                        </div>
                        <div class="card-chart bg-purple-transparent brround mr-auto mt-0">
                            <i class="typcn typcn-time  text-purple tx-24"></i>
                        </div>
                    </div>

                    <div class="progress progress-sm mt-2">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-purple wd-40p" role="progressbar"></div>
                    </div>
                    <small class="mb-0  text-muted">Monthly<span class="float-left text-muted">40%</span></small>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
				<!-- row -->
				<div class="row">

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection
