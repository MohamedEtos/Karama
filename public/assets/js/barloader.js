window.addEventListener('load', function() {
    // Simulate progress bar animation
    var loader = document.querySelector('.loader');
    // var content = document.getElementById('content');
    var width = 1;
    var interval = setInterval(function() {
        if (width >= 100) {
            clearInterval(interval);
            loader.style.width = '100%';
            setTimeout(function() {
                loader.parentElement.style.display = 'none';
                // content.style.display = 'block';

            }, 500); // Add delay to make the loader animation smoother
        } else {
            width++;
            loader.style.width = width + '%';
        }
    }, 2); // Change interval time for faster/slower animation
});
