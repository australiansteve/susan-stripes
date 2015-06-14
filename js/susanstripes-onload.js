jQuery(document).ready(function() {
	jQuery(".stripe:nth-child(odd)").each(function(i) {
	    var el = this;
	    
	    setTimeout(function() {
	        jQuery(el).show();    
	        jQuery(el).css("-webkit-animation", "slideIn 0.5s linear ");
	        jQuery(el).css("animation", "slideIn 0.5s linear ");
	    }, i*250);
	    
	});

	window.onpopstate = function(e){
	    if (e.state){
	        document.getElementById("page").innerHTML = e.state.html;
	        document.title = siteTitle + ' - ' + e.state.pageTitle;
	    }
	};

});

var contentCleared = false;
var pageData = null;

function changeContent(nonDynamicUrl, callback) {
	
	if (contentCleared === false || pageData === null)
	{
		setTimeout(function(){changeContent(nonDynamicUrl, callback)}, 1000);
	}
	else {
		//if content starts with html element we know it is a full page load, otherwise load it dynamically
		var dynamic = pageData.trim().indexOf("<!-- austeve-dynamic-content -->") === 0;
		if (dynamic) {
			//dynamic change
			jQuery('#content').html(pageData);

			jQuery('#content').fadeIn('slow', 'linear', function() {
				callback();
			});
		}
		else {
			//non dynamic, go to nonDynamicUrl
			location.href = nonDynamicUrl;
		}
	}
}

function getPageContent(linkurl, pageTitle) {
	jQuery('#content').fadeOut('slow', 'linear', function() {
		contentCleared = true;
		changeContent(linkurl, function() {
			pageData = null;
			contentCleared = false;
			callDynamicScripts();

        	document.title = siteTitle + ' - ' + pageTitle;
			window.history.pushState(
		        {
		            "html": jQuery('#page').html(),
		            "pageTitle": pageTitle
		        },
		        pageTitle,
		        linkurl
		   	);

		});
	});

	jQuery.ajax({
		url: linkurl,
		context: document.body
	}).done(function(data) {
		pageData = data;
	});
}

jQuery(document).on('click', '.menu-item a', function(e) {
	var linkurl = jQuery(this).attr('href');
	var linkText = jQuery(this).text();

	jQuery("li.active").removeClass("active");
	jQuery(this).parent().addClass("active");

	e.preventDefault(); //Stop the natural link target from being followed. Instead we will load using AJAX

	getPageContent(linkurl, linkText);
});

jQuery(document).on('click', '#content a', function(e) {
	var linkurl = jQuery(this).attr('href');
	var linkTitle = jQuery(this).attr('title');

	e.preventDefault(); //Stop the natural link target from being followed. Instead we will load using AJAX

	getPageContent(linkurl, linkTitle);
});

function callDynamicScripts() {
	slickInit();
}
