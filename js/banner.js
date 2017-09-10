
//script para ficar alternando imagens

$(document).ready(function(){

	var banners = ["img/banner1.jpg","img/banner2.jpg"];
	var bannerAtual = 0;
	function trocaBanner() {

		bannerAtual = (bannerAtual + 1) % 2;
		return banners[bannerAtual];


	}
	setInterval(
		function() {
			$('#banner2').attr('src',trocaBanner());
			$('#banner1').fadeOut(
				'slow',
				function(){
					$(this).attr('src', $('#banner2').attr('src')).fadeIn();
				}
				);
		},
		3500
		);

});

