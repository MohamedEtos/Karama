@extends('admin.layout.admin_master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 text-light my-auto">الرسائل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span></div>
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
									<a class="nav-link active" data-toggle="tab" href="">Recent Chat</a> <a class="nav-link" data-toggle="tab" href="">Groups</a> <a class="nav-link" data-toggle="tab" href="">Calls</a>
								</nav>
								<div class="main-chat-contacts-wrapper">
									<label class="main-content-label main-content-label-sm">Active Contacts (5)</label>
									<div class="main-chat-contacts" id="chatActiveContacts">
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/3.jpg')}}"></div><small>Adrian</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/12.jpg')}}"></div><small>John</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/4.jpg')}}"></div><small>Daniel</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/13.jpg')}}"></div><small>Katherine</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"></div><small>Raymart</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/14.jpg')}}"></div><small>Junrisk</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></div><small>George</small>
										</div>
										<div>
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/15.jpg')}}"></div><small>Maryjane</small>
										</div>
										<div>
											<div class="main-chat-contacts-more">
												20+
											</div><small>More</small>
										</div>
									</div><!-- main-active-contacts -->
								</div><!-- main-chat-active-contacts -->
								
								<div class="main-chat-list" id="ChatList">

									@foreach ($RecentChat as $RecentChats)
										<div class="media new">
											<div class="main-img-RecentChats online">
												<img alt="" src="{{URL::asset($RecentChats->ProfileImage)}}"> <span>2</span>
											</div>
											<div class="media-body">
												<div class="media-contact-name">
													<span>{{$RecentChats->name}}</span> <span>{{$RecentChats->created_at->diffForHumans()}}</span>
												</div>
												<p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
											</div>
										</div>
									@endforeach


									<div class="media new">
										<div class="main-img-user online">
											<img alt="" src="{{URL::asset('assets/img/faces/5.jpg')}}"> <span>4</span>
										</div>
										<div class="media-body">
											<div class="media-contact-name">
												<span>Socrates Itumay</span> <span>2 hours</span>
											</div>
											<p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
										</div>
									</div>

	
								</div><!-- main-chat-list -->
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-7">
						<div class="card">
							<a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
							<div class="main-content-body main-content-body-chat">
								<div class="main-chat-header">
									<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
									<div class="main-chat-msg-name">
										<h6>Reynante Labares</h6><small>Last seen: 2 minutes ago</small>
									</div>
									<nav class="nav">
										<a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Archive"><i class="icon ion-ios-filing"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="View Info"><i class="icon ion-md-information-circle"></i></a>
									</nav>
								</div><!-- main-chat-header -->
								<div class="main-chat-body" id="ChatBody">
									<div class="content-inner">

										<label class="main-chat-time"><span>3 days ago</span></label>

										<div class="media">
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></div>
											<div class="media-body">
												<div class="main-msg-wrapper left">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
												</div>
												<div>
													<span>9:32 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
												</div>
											</div>
										</div>
										<div class="media flex-row-reverse">
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
											<div class="media-body">
												<div class="main-msg-wrapper right">
													Nullam dictum felis eu pede mollis pretium
												</div>
												<div>
													<span>11:22 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
												</div>
											</div>

										{{-- <div class="media flex-row-reverse">
											<div class="main-img-user online"><img alt="" src="{{URL::asset('assets/img/faces/9.jpg')}}"></div>
											<div class="media-body">
												<div class="main-msg-wrapper right">
													Maecenas tempus, tellus eget condimentum rhoncus
												</div>
												<div class="main-msg-wrapper right">
													Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
												</div>
												<div>
													<span>09:40 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
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
				</div>
				<!-- row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  lightslider js -->
<script src="{{URL::asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>
<!--Internal  Chat js -->
<script src="{{URL::asset('assets/js/chat.js')}}"></script>
<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
@endsection