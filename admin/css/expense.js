
function checkpayform(a,b,c){

	
	if(a!=null && $(a).val().length < 1) {
		alert('请选择支付方式','提示');
		return false;
	}
	$(c).attr("disabled","true").val("提交中...");
}
var $_GET = (function(){
	var url = window.document.location.href.toString();
	var u = url.split("?");
	if(typeof(u[1]) == "string"){
		u = u[1].split("&");
		var get = {};
		for(var i in u){
			var j = u[i].split("=");
			get[j[0]] = j[1];
		}
		return get;
	} else {
		return {};
	}
})();
$('.icon-default').on('click', function(event, state) {
	$('#txtbanktype').val($(this).attr('channel'));
	$('.icon-default').each(function() {
		$(this).parents('div').first().removeClass('pyched');
	});
	$(this).parents('div').first().addClass('pyched');
});
$('.icheck').on('ifChecked',function(e){
	$("#paymoney").val($(this).find('input:first-child').val());
	if($(this).attr('id')=='inlineradio4'){
		$("#paymoney").val($('#otherpay').css('display','inline-block').val());
	}
});
$("#inlineradio4").on('ifUnchecked',function(event){
	$('#otherpay').css('display','none');
});
$('#otherpay').on('change',function(){
	$("#paymoney").val($(this).val());
})

$(document).ready(function () {
	$('#expensehome').length >0 && $('a[name="tableaclick"]').on('click', function(event, state) {
		alert("敬请期待");
	});

	$('#datepicker-range').length > 0 && (function() {
		$('#datepicker-range').datepicker({
			language: "zh-CN",
			todayHighlight: true,
			endDate: "+0d"
		});		// Date Range Picker
	})();


	if(ismobile()){
		$('.icon-ali').attr('channel','ALIPAYWAP');
		if($_GET['from'] != 'zc')//微信wap不低于5毛
			$('.icon-wx').attr('channel','WEIXINWAP');
		$('.icon-ten').attr('channel','TENPAYWAP');
		$('.icon-qq').attr('channel','QQWAP');
	}

});