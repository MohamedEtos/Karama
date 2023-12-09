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

                  <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">اضافة قسم</a>
                  <br><br>

				<div class="row">
                    <div class="col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<!-- Shopping Cart-->
								<div class="product-details table-responsive text-nowrap">
									<table class="table table-bordered table-hover mb-0 text-nowrap">
										<thead>
											<tr>
												<th class="text-center"><h4>القسم</h4></th>
												<th class="w-150"><h4>الوصف</h4></th>
												<th><h4>التحكم</h4></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($categories as $category )
											<tr id="row">
                                                <td class="text-center text-lg text-medium"> <b>{{$category->name}}</b></td>
													<td class="text-center text-lg text-medium"> <b>{{$category->descrption}}</b></td>

													<td class="text-center">

														<a class="remove-from-cart m-3 edit-button" data-id="{{$category->id}}" href="#edit{{$category->id}}"  title="" data-original-title="تعديل المنتج"><i style="color:#213B74" class="fa-solid fa-pen-to-square  fa-lg"></i>
														</a>
														<a class="remove-from-cart m-3 swal-ajax" id="delete" data-toggle="tooltip" title="" href="{{route('delete.category',$category->id)}}" data-original-title="حذف المنتج"><i class="fa fa-trash fa-lg"></i>
														</a>
														<form>
															{{-- <input type="hidden" name="cat_id" value="{{$ca}}" > --}}
														</form>

													</td>
												</tr>
                                             @endforeach
										</tbody>
									</table>
                                    <br><br>
                                    {{$categories->links()}}
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
<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('store.category')}}" id="storeCategory">
            @csrf
        <div class="mb-3">
            <label for="name">اسم القسم</label>
            <input name="name" id="name"  type="text" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>
        <div class="mb-3">
            <label for="name">وصف القسم</label>
            <input name="descrption" id="descrption" type="textarea" autofocus class="form-control @error('name') is-invalid @enderror">
            @error('descrption')
            <div class="text-danger">
                {{$message}}
            </div>
           @enderror
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn ripple btn-primary" type="submit" form="storeCategory" >Save changes</button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
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
              <h5 class="modal-title" id="exampleModalLabel">تعديل صنف</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editCategory">
                    @csrf
                    <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="name">اسم صنف</label>
                    <input name="name" id="edit_name" type="text" autofocus class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mb-3">
                    <label for="name">وصف صنف</label>
                    <input name="descrption" id="edit_descrption" type="text" autofocus class="form-control @error('descrption') is-invalid @enderror">
                    @error('descrption')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="editCategory" formaction="{{route('update.category',$category->id)}}">Save changes</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')

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

@endsection
