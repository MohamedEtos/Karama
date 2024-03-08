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
				<div class="breadcrumb-header justify-content-between ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto ">التجار</h4>
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
                <h3 class="card-title mg-b-0">جدول التـجـار</h3>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
        </div>
        <div class="card-body ">
            <div class="table-responsive userlist-table ">
                <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example1">
                    <thead>
                        <tr  class="text-right">
                            <th class="wd-lg-20p"><span></span></th>
                            <th class="wd-lg-8p text-center"><span>الاسم</span></th>
                            <th class="wd-lg-20p"><span>كود المشترك</span></th>
                            <th class="wd-lg-20p"><span>الهاتف</span></th>
                            <th class="wd-lg-20p"><span>نهايه الاشتراك</span></th>
                            <th class="wd-lg-20p"><span>الحاله</span></th>
                            <th class="wd-lg-20p"><span>الصلاحيات</span></th>
                            <th class="wd-lg-20p">تحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allMerchants as $merchants )
                        <tr class="text-right">
                            <td>
                                <img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset($merchants->userToDetalis->ProfileImage)}}">
                            </td>
                            <td>{{$merchants->name}}</td>
                            <td>
                                {{$merchants->usercode}}
                            </td>
                            <td>
                                {{$merchants->userToDetalis->phone}}
                            </td>
                            <td>
                                {{$merchants->endOfSubscription}}
                            </td>
                            <td class="text-center">
                                <span class="label text-muted d-flex"><div class="dot-label bg-gray-300
                                    @php
                                        if ($merchants->status == 'active'){
                                            echo 'bg-success';
                                        }else {
                                            echo 'bg-gray-300';
                                        }

                                    @endphp
                                ml-1">
                            </div>
                            @php
                                if($merchants->status == 'active'){
                                    echo 'مفعل';
                                }else {
                                    echo 'غير مفعل';
                                }
                            @endphp
                            </span>
                            </td>
                            <td>
                                @if (!empty($merchants->getRoleNames()))
                                @foreach ($merchants->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                            </td>
                            <td>
                            <form action="{{Route('deleteMerchant')}}" method="post">
                                @csrf
                                <a href="#" class="btn ripple btn-sm btn-primary" data-target="#modaldemos{{$merchants->id}}" data-toggle="modal" href="">
                                    <i class="fa-brands fa-searchengin"></i>
                                </a>

                                <!-- Large Modal -->
                                <div class="modal" id="modaldemos{{$merchants->id}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">بيانات العضو</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>البيانات الاساسيه </h6>
                                                <p class="h5 mt-1">كود المشرتك : {{$merchants->usercode}} </p>
                                                <p class="h5 mt-1">الاسم : {{$merchants->name}} </p>
                                                <p class="h5 mt-1">تاريخ الاشتراك : {{$merchants->startOfSubscription}} </p>
                                                <p class="h5 mt-1">نهايه الاشتراك : {{$merchants->endOfSubscription}} </p>
                                                <p class="h5 mt-1"> رقم الهاتف : {{$merchants->userToDetalis->phone}} </p>
                                                <p class="h5 mt-1"> رقم الهويه : {{$merchants->userToDetalis->nationalId}} </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <button class="btn ripple btn-danger btn-block " type="button">تم</button> --}}
                                                <button class="btn ripple btn-danger btn-block" data-dismiss="modal" type="button">تم</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Large Modal -->

                                <a href="{{url('admin/editStoreView/'.Crypt::encrypt($merchants->id))}}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <a class="btn btn-sm btn-danger modal-effect" data-target="#modaldemo{{$merchants->id}}" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo{{$merchants->id}}">
                                    {{-- <input type="hidden" name="userId"  value="{{$merchants->userToDetalis->id}}"> --}}
                                    <i class="fa-solid fa-trash"></i>
                                                                </a>



                            <!-- delete  Modal effects-->
                            <div class="modal" id="modaldemo{{$merchants->id}}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">هل انت متاكد من عمليه الحذف</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>سيتم حذف المستخدم رقم ({{$merchants->usercode}}) وكل بيامانته</h6>
                                            <p class="text-center"><i class="fa-solid fa-triangle-exclamation tx-50 mb-2 text-warning fa-xl"></i></p>
                                            <input type="hidden"   name="merchantId" value="{{Crypt::encrypt($merchants->userToDetalis->id)}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-danger" type="submit">تاكيد</button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal effects-->

                    </form>

                            </td>
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
            {{-- {{$merchants->links()}} --}}

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
<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script> // now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/dataTables.buttons.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
