        <!-- Col -->
        <div class="col-lg-4 col-xl-3 col-md-12 col-sm-12">
            <div class="card mg-b-20">
                <div class="main-content-left main-content-left-mail card-body">
                    <a class="btn btn-primary btn-compose" href="{{ url('admin/dashboard') }}" id="btnCompose">الرئيسيه</a>
                    <div class="main-mail-menu">
                        <nav class="nav main-nav-column mg-b-20">
                            <a class="nav-link" href=""><i class="bx bxs-inbox"></i> الوارد <span>18</span></a>
                            <a class="nav-link" href="{{route('sendNotify')}}"><i class="bx bx-star"></i> ارسال اشعار <span>8</span></a>
                            <a class="nav-link" href="{{route('notifyList')}}"><i class="bx bx-alarm-snooze"></i> كل الاشعارات <span>4</span></a>
                            <a class="nav-link" href="{{route('sendMail')}}"><i class="bx bx-bookmarks"></i> ارسال رساله <span>15</span></a>
                            <a class="nav-link" href=""><i class="bx bx-send"></i>كل الرسائل <span>24</span></a>
                            <a class="nav-link" href="{{route('validOTP')}}"><i class="bx bx-edit"></i> رموز OTP الفعاله <span>2</span></a>
                            <a class="nav-link" href=""><i class="bx bx-message-square-detail"></i> Chats <span>14</span></a>
                        </nav>
                        {{-- <label class="main-content-label main-content-label-sm">Settings</label> --}}
                        <nav class="nav main-nav-column">
                            <a class="nav-link active" href="#">Email Settings</a>
                            <a class="nav-link" href="#">Account Information</a>
                        </nav>
                    </div><!-- main-mail-menu -->
                </div>
            </div>
        </div>
        <!-- /Col -->
