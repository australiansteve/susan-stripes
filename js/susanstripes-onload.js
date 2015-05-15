jQuery(document).ready(function() {
	jQuery(".stripe:nth-child(odd)").each(function(i) {
	    var el = this;
	    
	    setTimeout(function() {
	        jQuery(el).show();    
	        jQuery(el).css("-webkit-animation", "slideIn 0.5s linear ");
	        jQuery(el).css("animation", "slideIn 0.5s linear ");
	    }, i*250);
	    
	});
});