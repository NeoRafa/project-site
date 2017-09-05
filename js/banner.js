$('.box img').hide();
var banners = ["img/banner1.jpg","img/banner2.jpg"];
var bannerAtual = 0;
function trocaBanner() {
	
	bannerAtual = (bannerAtual + 1) % 2;
	return banners[bannerAtual];


}
	setInterval(
		function() {
			var image = new Image();
			$(image).load(function() {
				$('.box img').fadeOut('slow', function() {
				$('.box img').attr('src',image.src).fadeIn('slow');	
				});
			});
			image.src = trocaBanner();
		},
		4500
	);