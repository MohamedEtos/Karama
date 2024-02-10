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
            '<img src="' +  window.location.href + data.merchantImg  +'" alt="">'+
               ' <span class="avatar-status bg-teal"></span>' +
               '</div>' +
               '<div class="wd-90p">' +
               ' <div class="d-flex">' +
               ' <h5 class="mb-1 name " id="notifayTitle">'+data.merchantName +'</h5>' +
               ' </div>' +
               '<p class="mb-0 desc">'+ data.messages + data.merchantName + '</p>' +
               '<p class="time mb-0 text-left float-right mr-2 mt-2">'+ data.time +'</p>' +
               '</div>' +
           '</a>';



    // get notfy count and add 1
    newvalue = parseInt(countNotify.textContent) +1
    countNotify.textContent = newvalue;
    // end get notfy count and add 1

    messNotify.classList.add('pulse-danger');
    $('.lastrecord').prepend(html);


});
