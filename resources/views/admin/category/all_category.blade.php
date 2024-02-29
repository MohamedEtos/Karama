@extends('admin.layout.admin_master')
@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css')}}">

@endsection
@section('page-header')
				<!-- breadcrumb -->
                    <div class="col-12 mt-2 mb-2">
                        <p class="pt-0 text-light h4">اضافه الاقسام</p>
                    </div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                  <a class="btn ripple btn-danger " data-target="#modaldemo1" data-toggle="modal" href="">اضافة قسم</a>
                  <a class="btn ripple btn-danger " data-target="#modaldemo3" data-toggle="modal" href="">الاقسام الفرعيه</a>
                  <br><br>

                  <div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h3 class="card-title mg-b-0">جدول المنتجات</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th class="wd-15p border-bottom-0 ">القسم</th>
												<th class="wd-15p border-bottom-0 ">الاقسام الفرعيه</th>
												<th class="wd-15p border-bottom-0 ">الوصف</th>
												<th class="wd-15p border-bottom-0 ">تحكم</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($categories as $category )
												<tr class="text-center">
													<td>{{$category->name}}</td>
													<td>سسس</td>
													<td>{{$category->descrption}}</td>
                                                    <td class="text-center ">
														<a class=" mr-3 edit-button" data-id="{{$category->id}}" href="#edit{{$category->id}}"  title="" data-original-title="تعديل المنتج"><i style="color:#213B74" class="fa-solid fa-pen-to-square  fa-lg"></i>
														</a>
														<a class=" mr-3  swal-ajax text-danger" id="    "  data-toggle="tooltip" title="" href="{{route('delete.category',$category->id)}}" data-original-title="حذف المنتج"><i class="fa fa-trash fa-lg"></i>
														</a>
													</td>
												</tr>
                                                @empty

                                                @endforelse
										</tbody>
									</table>
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


<!-- Button trigger modal -->






<!-- Button trigger modal -->
<div class="modal" id="modaldemo3">
    <div class="modal-dialog" role="document">
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title"> الاقسام الفرعيه </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('subCatUpdate')}}" id="subCat">
            @csrf
            {{-- <input type="hidden" name="categoryId" value=""> --}}

        <div class="mb-3">
            <label for="name">اختار القسم</label>
            <select name="category"  class="form-control" id="allCategory">
                @forelse ($categoriesSelect as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @empty
                <option disabled value="">لا يوجد اقسام</option>
                @endforelse
            </select>
            @error('category')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>

        <div class="mb-3">
            <label for="name">الاقسام الفرعيه</label>
            <input id="ajaxTags" type="text" style="width: 100%"   value="" name="subCat"    class="form-control"  placeholder=" اكتب التخصص ثم Enter"  >
            @error('Ajax')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>


    </div>
    <div class="modal-footer">
        <button class="btn ripple btn-danger" type="submit" form="subCat" >حفظ</button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
    </div>
    </form>
</div>
</div>
</div>





<!-- Button trigger modal -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">اضافه القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('store.category')}}" id="storeCategory">
            @csrf
            {{-- <input type="hidden" name="categoryId" value=""> --}}
        <div class="mb-3">
            <label for="name">اسم القسم</label>
            <input name="name" id="name"  type="text" autofocus class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name">الاقسام الفرعيه</label>
            {{-- <input name="Ajax" id="Ajax" type="input" autofocus class="form-control  @error('Ajax') is-invalid @enderror"     > --}}
            <input type="text" style="width: 100%" minlength="4" name="subCat" data-role="tagsinput" id="Ajax"  class="form-control"  placeholder=" اكتب التخصص ثم Enter" id="validationCustom01" >
            @error('subCat')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name">وصف القسم</label>
            <input name="descrption" id="descrption" type="textarea" autofocus class="form-control  @error('name') is-invalid @enderror" required>
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn ripple btn-danger" type="submit" form="storeCategory" >حفظ</button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
    </div>
    </form>
</div>
</div>
</div>



  {{-- <a class="remove-from-cart m-3" href="#edit{{$category->id}}" data-toggle="modal" title="" data-original-title="تعديل المنتج"><i style="color:#213B74" class="fa-solid fa-pen-to-square  fa-lg"></i>
  </a> --}}
    <!--Edit Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editCategory">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$category->id}}">
                <div class="mb-3">
                    <label for="name">اسم القسم</label>
                    <input name="name" id="edit_name" type="text" autofocus class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mb-3">
                    <label for="name">وصف القسم</label>
                    <input name="descrption" id="edit_descrption" type="text" autofocus class="form-control @error('descrption') is-invalid @enderror">
                    @error('descrption')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                @isset($category->id)
                    <button type="submit" class="btn btn-danger" form="editCategory" formaction="{{route('update.category',$category->id)}}">حفظ التعديل</button>
                @endisset
            </div>
        </form>



          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

<script src="{{URL::asset('https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js')}}"></script>



<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>


{{-- <a class="remove-from-cart m-3 edit-button" id="{{$category->id}}" href="#edit{{$category->id}}"  title="" data-original-title="تعديل المنتج"><i style="color:#213B74" class="fa-solid fa-pen-to-square  fa-lg"></i>
</a> --}}
<script type="text/javascript">
$('body').on('click','.edit-button',function(event){
  var id = $(this).data('id');
  $.ajax({
    url: '/edit/category/'+id,
    type: 'GET',
  })
  .done(function(response){
    console.log("response");
    $('#editCategory').find('#edit_name').val(response.data.name);
    $('#editCategory').find('#edit_descrption').val(response.data.descrption);
    $('#edit').modal('show');
  })
  .fail(function(){
    console.log("fail");
  })
  .always(function(){
    console.log("complete");
  });
});



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



<script>
    var allCategory  = document.getElementById('allCategory');


$('#allCategory').on('change', function() {

               $.ajax({
                   type: "GET",
                   url: 'getCategoryAjax/'+allCategory.value,
                   dataType: 'json',
                   beforeSend: function() {
                    $('.loading').css('display','flex');
                    $('.loader_cu').css('display','flex');
                   },
                    success: function(data){
                        $('#ajaxTags').tagsinput();
                        $('#ajaxTags').tagsinput('removeAll');
                        $('#ajaxTags').tagsinput('add',data.Done );

                    },complete: function(){
                        $('.loading').css('display','none');
                        $('.loader_cu').css('display','none');

                    },error: function(reject){

                        $('.loading').css('display','none');
                        $('.loader_cu').css('display','none');
                    },

                 });


});


</script>

@endsection
