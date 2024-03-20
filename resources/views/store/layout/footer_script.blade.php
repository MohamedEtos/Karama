
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{URL::asset('Front-Store/js/vendor.bundle.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{URL::asset('Front-Store/js/theme.bundle.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

        $('#submitform, #bell').on('click', function(e) {
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
                    $('.fa-bell').removeClass('fa-shake');
                },complete: function(){


                },error: function(reject){

                }
            });

        });



        });




        </script>
