
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fa-solid fa-angle-up pt-3 fa-xl"></i></a>
<!-- JQuery min js -->
{{-- <script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Bootstrap Bundle js -->
{{-- <script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/boot strap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.4.1.sli  m.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




<!-- Ionicons js -->
{{-- <script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>   HERE --}}
<!-- Moment js -->
{{-- <script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script> --}}

<!-- Rating js-->
{{-- <script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script> --}}

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
{{-- <script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script> --}}
<script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
{{-- <script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script> --}}
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>

<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
{{-- fontawome --}}

{{-- <script src="{{URL::asset('assets/plugins/fontawesome-free/js/all.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

{{-- Toggle Button  --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{{-- Toggle Button  --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> --}}


    {{-- <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script> --}}
    <script src="{{URL::asset('https://cdn.jsdelivr.net/npm/ion-rangeslider@2.2.0/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/rangeliderNavbar.js')}}"></script>

    <script src="{{URL::asset('assets/js/barloader.js')}}"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        // Pusher.logToConsole = true;

        var pusher = new Pusher('bd1e4bf2bb0bebd08131', {
        cluster: 'mt1'
        });


    </script>

        @isset( $notifyId->reseverId )
            <input type="hidden" id="UID" value="{{Auth::User()->id}}">
        @endisset


<script src="{{URL::asset('assets/js/notifyPosher.js')}}"></script>


<script>

$(function() {

$('#form').on('submit', function(e) {
//remove all old errors

    e.preventDefault();
    let formData = new FormData($('#form')[0]);

    // $("#name").text('');
    $.ajax({
        type: "post",
        url: "{{Route('markAllReadedAjax')}}",
        data : formData,
        processData:false,
        contentType:false,
        cache:false,
        success: function (data) {
            $('#countNotify').text('0');
            $('#messNotify').removeClass('pulse-danger');
        },complete: function(){


        },error: function(reject){

        }
    });

});



});




</script>


@if ($errors->any())
@foreach ($errors->all() as $error)

<input id="nofic" type="hidden" value="{{$error}}">
        <script>
            window.onload = function not7() {
            notif({
                msg: $('#nofic').val(),
                type: "error"
            });
        }
        </script>
        @endforeach
@endif




