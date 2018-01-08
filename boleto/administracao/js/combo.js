/**
 * selectCombo for jQuery
 * 
 * Copyright (c) 2007 Shelane Enos
 * Dual licensed under the MIT (MIT-LICENSE.txt) 
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * Initial base logic from Remy Sharp's blog: http://remysharp.com/2007/01/20/auto-populating-select-boxes-using-jquery-ajax/
 *   
 * @example  $('#myselect').selectCombo('myurltoprocess.lasso?additionalparamtoserverifnecessary=myparam', '#mytargetselect', {hidetarget: false});
 * 
 * Option: hidetarget - Allows you to override the default hide behavior if set to false.  Default true will hide your target select and its label until and option from your source select is selected.  Use this if your target select is not empty when the page loads and its values correspond to your default selected of your source select.
 *
 * Parameter sent to server is q
 *
 * Expected server response is JSON in this format: [{oV: 'myfirstvalue', oT: 'myfirsttext'}, {oV: 'mysecondvalue', oT: 'mysecondtext'}]
 *
 */
 (function($){
$.fn.selectCombo = function(url, target, settings){//, options

 var defaults = {hidetarget: false};
$.extend(defaults, settings);
return this.each(function(){
//console.log($(this).val());
var targetlabel = target.replace(/#/, '');
var targetlabel2 = targetlabel;
targetlabel = "label[@for='" + targetlabel + "']"; 

 if($(this).val() == '' && defaults.hidetarget){
	/* $(targetlabel).hide();
	$(target).hide(); */
	var targetOption = $("option:first", target);
}

$(this).change(function(){
	$.getJSON(url,{q: $(this).val()}, function(j){
		options= '<option value="">Selecione '+targetlabel2+'</option>';
		for (var i = 0; i < j.length; i++) {			
			options+= '<option value="' + j[i].oV + '">' + j[i].oT + '</option>';
		}
		$(target).html(options);
		$("option:first", target).attr("selected","selected");
		//a linha abaixo foi acrescentada por tmferreira!!!
		//$(target).change();
		//fim do acréscimo
		//$(targetlabel).show();
		//$(target).show();
	});//end JSON
});//end change fn

});//end return for each
}
})(jQuery);