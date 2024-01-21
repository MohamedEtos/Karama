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

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-light">المنتجات</h4>
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
                <h3 class="card-title mg-b-0">جدول المنتجات</h3>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive  userlist-table">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                        <tr  class="text-right">
                            <th class="wd-lg-5p  text-right"><span>صوره المنتج</span></th>
                            <th class="wd-lg-10p text-right"><span>المتجر</span></th>
                            <th class="wd-lg-10p text-right"><span>الاسم</span></th>
                            <th class="wd-lg-10p text-right"><span>القسم</span></th>
                            <th class="wd-lg-10p text-right"><span>السعر</span></th>
                            <th class="wd-lg-10p text-right"><span>الخصم</span></th>
                            <th class="wd-lg-10p text-right"><span>السعر النهائي</span></th>
                            <th class="wd-lg-10p text-right"><span>حاله المنتج</span></th>
                            <th class="wd-lg-10p text-right"> تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $products )
                        <tr class="">
                            <a href="">
                            <td class="text-right">
                                <img alt="avatar" class="wd-50p wd-sm-70" src="{{URL::asset($products->productionToImgRealtions->mainImage)}}">
                            </td>
                            <td class="text-right">{{$products->userToProduct->name}}</td>
                            <td class="text-right">{{$products->name}}</td>
                            <td class="text-right">
                                {{$products->productionToCategoryRealtions->name}}
                            </td>
                            <td class="text-right">
                                {{$products->price}}
                            </td>

                            <td class="text-right">
                                    {{$products->discount}}
                            </td>
                            <td class="text-right">
                                {{$products->ThePriceAfterDiscount}}
                            </td>
                            <td class="text-right" class="text-right">
                                <span class="label text-muted d-flex"><div class="dot-label bg-gray-300
                                    @php
                                        if ($products->append == '0'){
                                            echo 'bg-warning';
                                        }elseif($products->append == '1') {
                                            echo 'bg-success';
                                        }else {
                                            echo 'bg-danger';
                                        }
                                        
                                    @endphp    
                                ml-1">
                            </div>
                            @php
                                if($products->append == '0'){
                                    echo 'بانتظار الرد';
                                }elseif($products->append == '1') {
                                    echo ' مقبول';
                                }else{
                                    echo 'غير مقبول';
                                }
                            @endphp
                            </span>
                            </td>
                            <td class="text-center">
                                    <a href="{{url('admin/editProudcts/'.Crypt::encrypt($products->id))}}" class="btn btn-sm btn-info">
                                        <i class="fa-solid fa-pen"></i>                                    </a>

                                    <a href="{{url('admin/reviewProudcts/'.Crypt::encrypt($products->id))}}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-receipt"></i> مراجعه
                                    </a>

                            
                                    
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
            {{-- {{$products->links()}} --}}

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
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
