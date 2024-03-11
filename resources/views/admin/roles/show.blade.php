@extends('admin.layout.admin_master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />



@section('title')
عرض الصلاحيات - مورا سوفت للادارة القانونية
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                الصلاحيات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->


<!-- row -->
<div class="row d-flex justify-content-center">
    <div class="col-md-12 col-xl-8 col-lg-8">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <a href="{{route('roles.index')}}" class="btn btn-danger btn-sm">رجوع</a>
                </div>
                <hr>
                <div class="row">
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <div class="col-6 col-md-3 "><li>{{ $v->name }}</li></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>

@endsection
