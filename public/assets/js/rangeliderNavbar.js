	// price range
		$('.rangeslider3').ionRangeSlider({
			type: 'double',
			grid: true,
			min: 0,
			max: 1000,
			from: 200,
			to: 800,
			prefix: '₪'
		});

if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
} else {
    window.onbeforeunload = function () {
        window.scrollTo(0, 0);
    }
}
