
var messNotify = document.getElementById('messNotify');
var notifayTitle = document.getElementById('notifayTitle');
var countNotify = document.getElementById('countNotify');
var UID = document.getElementById('UID').value;
// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('PointsNotify'+UID);
// Bind a function to a Event (the full Laravel class)
channel.bind('UserNotify', function (data) {


    var html = ' <a href="" class="p-3 d-flex border-bottom ">' +
           '<div class="  drop-img  cover-image ml-2   " data-image-src="">' +
            '<img src="' +  window.location.origin +'/'+ data.senderImg  +'" alt="">'+
               ' <span class="avatar-status bg-teal"></span>' +
               '</div>' +
               '<div class="wd-90p">' +
               ' <div class="d-flex">' +
               ' <h5 class="mb-1 name " id="notifayTitle">'+data.senderName +'</h5>' +
               ' </div>' +
               '<p class="mb-0 desc">'+ data.messages + '</p>' +
               '<p class="time mb-0 text-left float-right mr-2 mt-2">'+ data.time +'</p>' +
               '</div>' +
           '</a>';


    var htmlStore = '<div class="row mx-0 py-4 g-0 border-bottom">'+
                        '<div class="col-2 position-relative">'+
                            '<picture class="d-block ">'+
                                '<img class="img-fluid w-50" src="'+ window.location.origin +'/'+ data.senderImg +'" alt="">'+
                            '</picture>'+
                        '</div>'+
                        '<div class="col-9  offset-1">'+
                            '<div style="margin-right: 10px">'+
                                '<h6 class="justify-content-between  d-flex align-items-start mb-2" >'+data.senderName+'</h6>'+
                                '<span class="d-block text-muted fw-bolder text-uppercase fs-9" style="float: right">'+ data.messages + '</span>'+
                            '</div>'+
                            '<p class="fs-9 text-end text-muted m-0" style="float: left" >'+ data.time +'</p>'+
                        '</div>'+
                    '</div>';



    // get notfy count and add 1
    newvalue = parseInt(countNotify.textContent) +1
    countNotify.textContent = newvalue;
    // end get notfy count and add 1
    $('.storeNotify').prepend(htmlStore);

    messNotify.classList.add('pulse-danger');
    $('.lastrecord').prepend(html);




});
