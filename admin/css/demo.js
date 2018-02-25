$(function() {
	$(".nano").nanoScroller();

	prettyPrint(); //Apply Code Prettifier


	// Bootstrap JS
	//------------------------
	    $('.popovers').popover({container: 'body', trigger: 'hover', placement: 'top'}); //bootstrap's popover
	    $('.tooltips').tooltip(); //bootstrap's tooltip

    //Tabdrop
    //------------------------
    	jQuery.expr[':'].noparents = function(a,i,m){
    	        return jQuery(a).parents(m[3]).length < 1;
    	}; // Only apply .tabdrop() whose parents are not (.tab-right or tab-left)
    	$('.nav-tabs').filter(':noparents(.tab-right, .tab-left)').tabdrop();




    //Custom checkboxes
    //------------------------
		$(".bootstrap-switch").bootstrapSwitch();
		$('.icheck input').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		});


	//Project Switcher Demo
	//------------------------
		$('.project-switcher-dropdown>li>a').click(function() {
			$('.project-switcher>a.btn>span').text($(this).text());
		});



	//Demo Background Pattern

	$(".demo-blocks").click(function(){
		$('.layout-boxed').css('background',$(this).css('background'));
		return false;
	});



	// Weather - http://simpleweatherjs.com

	/* Does your browser support geolocation? */
	if ("geolocation" in navigator) {
	  $('.js-geolocation').show();
	} else {
	  $('.js-geolocation').hide();
	}


});

 
