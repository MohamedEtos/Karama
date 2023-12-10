@extends('admin.layout.admin_master')
@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 {{-- Toggle Button  --}}
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 {{-- Toggle Button  --}}
 <!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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

<a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">اضافة تاجر</a>
<br><br>

{{-- row --}}
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title mg-b-0">جدول التـجـار</h3>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th class="wd-15p border-bottom-0 ">Sl</th>
                            <th class="wd-15p border-bottom-0 ">الاسم</th>
                            <th class="wd-20p border-bottom-0 "> الرقم الكودى</th>
                            <th class="wd-15p border-bottom-0 ">رقم الهاتف</th>
                            <th class="wd-10p border-bottom-0 "> البريد الاكترونى</th>
                            <th class="wd-25p border-bottom-0 ">الحاله</th>
                            <th class="wd-25p border-bottom-0 ">تحكم</th>
                            <th class="wd-25p border-bottom-0 ">حذف</th>
                        </tr>


                    </thead>
                    <tbody class="text-center">
                        @foreach($merchants as $key=> $merchant)
                        <tr role="row" class="odd">
                             <td>{{$key+1}}</td>
                                <td class="sorting_1">{{$merchant->name}}</td>
                                <td>{{$merchant->usercode}}</td>
                                <td>{{$merchant->phone_number}}</td>
                                <td>{{$merchant->email}}</td>
                                <td>
                                    @if($merchant->status == 'active')
                                <span class="badge rounded-pill bg-success">مفعل</span>
                                @else
                                <span class="badge rounded-pill bg-danger">غير مفعل</span>
                                  @endif
                                </td>
                                <td>
                                    <input data-id="{{ $merchant->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger"  data-toggle="toggle" data-on="active" data-off="inactive" {{ $merchant->status ? 'checked' : ' ' }} >

                                     </td>
                                <td><a class="remove-from-cart m-3 swal-ajax" id="delete" data-toggle="tooltip" title="" href="{{route('delete.merchant',$merchant->id)}}" data-original-title="حذف المنتج"><i class="fa fa-trash fa-lg"></i>
                                </a></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                {{$merchants->links()}}
            </div>
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
        <form method="post" action="{{route('store.merchant')}}" id="storeUser">
            @csrf
        <div class="mb-3">
            <label for="name"> الاسم</label>
            <input name="name" id="name"  type="text" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name"> رقم الكود</label>
            <input name="usercode" id="usercode" type="number" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name"> رقم الهاتف</label>
            <input name="phone_number" id="descrption" type="tel" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name">  البريد الالكترونى</label>
            <input name="email" id="descrption" type="email" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name"> الرقم السرى</label>
            <input name="password" id="descrption" type="text" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn ripple btn-primary" type="submit" form="storeUser" >Save changes</button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
    </div>
    </form>
</div>
</div>
</div>
 {{-- End Modal --}}


<script>
    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: '?Are you sure ',
                    text: "?Delete This Data ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '!Yes, delete it'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      );
                    }
                  });


    });

  });
</script>

<script type="text/javascript">
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var user_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                // console.log(data.success)

                  // Start Message

              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
              })
              if ($.isEmptyObject(data.error)) {

                      Toast.fire({
                      type: 'success',
                      title: data.success,
                      })

              }else{

             Toast.fire({
                      type: 'error',
                      title: data.error,
                      })
                  }

                // End Message


              }
          });
      })
    })
  </script>


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
@endsection
