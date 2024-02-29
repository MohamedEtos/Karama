@extends('admin.layout.admin_master')
@section('css')


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title  mb-0 my-auto">الدردشه</h4></div>
                        <h6 class="test2 "></h6>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm main-content-app mb-4">
					<div class="col-xl-4 col-lg-5">
						<div class="card">
							<div class="main-content-left main-content-left-chat">
								<nav class="nav main-nav-line main-nav-line-chat">
									<a class="nav-link active" data-toggle="tab" href="">الدردشه</a>
								</nav>
								<div class="main-chat-contacts-wrapper">
									<label class="main-content-label main-content-label-sm">الاشخاص</label>
									<div class="main-chat-contacts" id="chatActiveContacts">
                                        @forelse($ResentUser as $RecentUsers)
                                            <div>
                                                <div class="main-img-user online" id="{{'user'.$RecentUsers->reseverId }}"><img alt="" src="{{URL::asset($RecentUsers->reseverChat->userToDetalis->ProfileImage)}}"></div><small>{{ $RecentUsers->reseverChat->name  }}</small>
                                            </div>
                                        @empty

                                        @endforelse

                                        @if ($CountUniqeUsers > 6)
										<div>
											<div class="main-chat-contacts-more">
                                                {{ $CountUniqeUsers -6 }}+
											</div><small>المزيد</small>
										</div>
                                        @endif
									</div><!-- main-active-contacts -->
								</div><!-- main-chat-active-contacts -->
								<div class="main-chat-list" id="ChatList">


                                    @forelse($RecentChat as $RecentChats)
                                        <div class="media new border-bottom-0 media_select" id="{{$RecentChats->reseverId}}">
                                            <div class="main-img-user online">
                                                <img alt="" src="{{URL::asset($RecentChats->reseverChat->userToDetalis->ProfileImage)}}"> <span>{{ $RecentChats->count() }}</span>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-contact-name">
                                                    <span>{{$RecentChats->reseverChat->name}}</span> <span>{{$RecentChats->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p>{{$RecentChats->body}}</p>
                                            </div>
                                        </div>
                                    @empty


                                        <div class="media new">
                                            <div class="r online">
                                            </div>
                                            <div class="media-body text-center">
                                                    لا توجد محادثات
                                            </div>
                                        </div>

                                    @endforelse

									{{-- <div class="media selected">
										<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
										<div class="media-body">
											<div class="media-contact-name">
												<span>Reynante Labares</span> <span>10 hours</span>
											</div>
											<p>Nam quam nunc, bl ndit vel aecenas et ante tincid</p>
										</div>
									</div> --}}





								</div><!-- main-chat-list -->
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-7">
						<div class="card">
							<a class="main-header-arrow" href="" id="ChatBodyHide"><i class="fa-solid fa-arrow-left"></i></a>
							<div class="main-content-body main-content-body-chat">
								<div class="main-chat-header">
									<div class="main-img-user"><img id="mainChatImage" alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
									<div class="main-chat-msg-name">
										<h6>Reynante Labares</h6>
                                        <small id="lastSeen"></small>
									</div>
									<nav class="nav">
										<a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Archive"><i class="icon ion-ios-filing"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="View Info"><i class="icon ion-md-information-circle"></i></a>
									</nav>
								</div><!-- main-chat-header -->
								<div class="main-chat-body" id="ChatBody">
									<div class="content-inner">
										<label class="main-chat-time"><span>3 days ago</span></label>




										{{-- <div class="media flex-row-reverse">
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
											<div class="media-body">



												<div class="main-msg-wrapper right">
													Nulla consequat massa quis enim. Donec pede justo, fringilla vel...
												</div>
													<span>9:48 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
												</div>



											</div>
										</div> --}}





									</div>
								</div>
							</div>
							<div class="main-chat-footer">
								<nav class="nav">
									<a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>
								</nav><input class="form-control" placeholder="Type your message here..." type="text"> <a class="main-msg-send" href=""><i class="far fa-paper-plane"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
        <input type="hidden"  name="" value="{{Auth::User()->id}}" id="CID">
@endsection
@section('js')
<!--Internal  lightslider js -->
<script src="{{URL::asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>
<!--Internal  Chat js -->
<script src="{{URL::asset('assets/js/chat.js')}}"></script>

<script src="{{URL::asset('assets/js/Customchat.jg')}}"></script>

<script>
$(function() {

$('.main-chat-list .media').on('click touch', function(e) {
    let currentIdClick = $(this).attr('id');
    let currentImgClick = $(this).children().children().attr('src');
    let selfImage = $('.profile-user').children().attr('src');
    let chatBody = $('.content-inner');
    let selfId = $('#CID').val();
    e.preventDefault();

        let formData = new FormData($(currentIdClick)[0]);

        $.ajax({

            beforeSend: function() {


            },
            type: "get",
            url: "getUserChat/"+currentIdClick,
            data : formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function (data) {
                chatBody.children().remove(); // to remove old chat

                $.each(data.chat, function(index, element) {
                    // console.log(element);
                   if(element.senderId == selfId ){
                    var html ='<div class="media flex-row-reverse">'+
                                    '<div class="main-img-user online"><img alt="" src="'+selfImage+'"></div>'+
                                    '<div class="media-body">'+
                                        '<div class="main-msg-wrapper right">'+
                                            element.title+
                                        '</div>'+
                                            '<span>'+element.created_at+'</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                        '</div>'
                   }else{
                    var html ='<div class="media ">'+
                                    '<div class="main-img-user online"><img alt="" src="'+currentImgClick+'"></div>'+
                                    '<div class="media-body">'+
                                        '<div class="main-msg-wrapper right">'+
                                            element.title+
                                        '</div>'+
                                            '<span>'+element.created_at+'</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                        '</div>'
                   }

                   chatBody.append(html)


                });



                $('.main-chat-msg-name').children().text(data.MSG.resever_chat.name);
                $('#mainChatImage').attr('src',currentImgClick);
                $('#lastSeen').text(data.MSG.resever_chat.last_seen);
            },complete: function(){

            },error: function(reject){

            }
        });

    });
});





</script>
@endsection
