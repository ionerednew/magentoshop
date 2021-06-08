//////////////////TOPMENU///////////////////////////
jQuery(document).ready(function($) {
		var myHash = location.hash;
		location.hash = '';
		if (myHash[1] != undefined) {
			$('html, body').stop().animate(
				{scrollTop: $(myHash).offset().top - 110}
				,1750);
			location.hash = myHash;
			return false;
		}
});
jQuery(function() {
	var scrolledTemp = 0;
	var scrolled = 0;
	var height = jQuery('.video__welcome').height();
			checkMenuScroll();
			jQuery('a.linkToId').click(function () {
				var elementClick = jQuery(this).attr('href').split('/')[3] ? jQuery(this).attr('href').split('/')[3] : jQuery(this).attr('href');
				var destination = jQuery(elementClick).offset().top;
				jQuery('.burger').data('active', 0);
				jQuery('.navMenu').removeClass('navMenuActive');
				jQuery('html,body').animate({ scrollTop: destination }, 1750 );
				return;
			});

			jQuery(window).scroll(function() {
				checkMenuScroll();
			if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				if (scrolled <= height) {
					var partOfOpacity = 1-((scrolled+50)/height);
					jQuery('.my-auto').css("opacity", partOfOpacity);
					jQuery('.my-auto').css("transform", "translate3d(0,calc(-50% + "+scrolled/1.9+"px),0)");
				}
			}
				
			});

			function checkMenuScroll()
			{
				scrolled = jQuery(this).scrollTop();
				if (scrolledTemp > scrolled || scrolled <= 0) {
					jQuery('.topMenu').removeClass('topMenuHidden');
				}
				else if (scrolledTemp < scrolled) {
					jQuery('.topMenu').addClass('menuScrolled');
					jQuery('.burgerSingle').addClass('blackBackground');
					jQuery('.communicationPhone').addClass('communicationPhoneScrolled');
					jQuery('.topMenu').addClass('topMenuHidden');
				}
				if (!scrolled) {
					jQuery('.topMenu').removeClass('menuScrolled');
					jQuery('.burgerSingle').removeClass('blackBackground');
					jQuery('.communicationPhone').removeClass('communicationPhoneScrolled');
				}
				scrolledTemp = scrolled;
			}
			
			
			jQuery('.burgerMenu').click(function() {
				var active = parseInt(jQuery('.burger').data('active'));
				if (!active) {
					//jQuery('.topMenu').addClass('topMenuHidden');
					setTimeout(function() {
						jQuery('.navMenu').addClass('navMenuActive');
					}, 150);
					active++;
					jQuery('.burger').data('active', active);
				}
			});
			
			jQuery('.close').click(function() {
				var active = parseInt(jQuery('.burger').data('active'));
				if (active) {
					jQuery('.navMenu').removeClass('navMenuActive');
					setTimeout(function() {
						//jQuery('.topMenu').removeClass('topMenuHidden');
					}, 150);
					active--;
					jQuery('.burger').data('active', active);
				}
			});
			
	
	

		});