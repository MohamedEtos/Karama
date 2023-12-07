@extends('layouts.master')
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
				<div class="row">
<form id="product_data">
	@csrf
	<input type="text" name="name">
	<input type="submit" value="" id="finish">
</form>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<script>
			$(function() {
    // Code here


	$("#finish").click(function(e){
		e.preventDefault();
		var formData = new FormData($('#product_data')[0]);

            $.ajax({
                type: "POST",
                url: "{{route('store_product')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    $("#Success").html(data.MSG).slideDown("fast").delay(2000).slideUp("fast");
                    $("input[name=Ycopy]").val("")


                },error: function(reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").text(val[0]);

                    })

                }
            });

        });



	});
</script>
@endsection