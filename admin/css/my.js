/** 用户自定义JS **/
function fn_detect_os() {
    var result = null;
    if (/NT 5./i.test(navigator.userAgent)) {
        result = /wow64|win64|ia64|x64/i.test(navigator.userAgent) ? "xp-64": "xp-32";
    }
    else if (/NT 6.|NT 7.|NT 8.|NT 9.|NT 10./i.test(navigator.userAgent)) {
        result = /wow64|win64|ia64|x64/i.test(navigator.userAgent) ? "vista-64": "vista-32";
    }
    else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        result = "ios";
    }
    else if (/Android/i.test(navigator.userAgent)) {
        result = "android";
    }
    else if (/Macintosh/i.test(navigator.userAgent)) {
        result = "osx";
    }
    return result;
}
function ismobile(){
    return navigator.userAgent.match(/(iPhone|iPod|Android|ios|SymbianOS)/i)!=null;
}
function download_soft(a) {
    window.open('http://haha.oss-cn-shenzhen.aliyuncs.com/openvpn.clients/' + a +  '_self')
}
function download_profile(a,ip) {
    if (fn_detect_os() == "ios") {
        //     window.open("http://flipwalls.oss-cn-shenzhen.aliyuncs.com/openvpn.profile/" + a + ".mobileconfig", "_self")
        window.open("ajax.php?verify=true&mod=download_profile&extra="+a+"&sip="+ip, "_self")
    }
    else {
        window.open("ajax.php?verify=true&mod=download_profile&extra="+a+"&sip="+ip, "_self")
    }
}

function openLog(){
				layer.open({
				type: 1,
				area: ['85%','75%'],
				title: '版本更新',
				closeBtn: 2,
				shift: 5,
				shadeClose: false,
				content: '<div class="DrawRecordCon"></div>'	
				});
				var loadT = layer.msg('正在获取...',{icon:16,time:0})
				$.get('index.php?action=getUpdateLogs',function(rdata){
					layer.close(loadT);
					var body = '';
					for(var i=0;i<rdata.length;i++){
						body += '<div class="DrawRecord DrawRecordlist">\
								<div class="DrawRecordL">'+rdata[i].addtime+'<i></i></div>\
								<div class="DrawRecordR">\
									<h3>'+rdata[i].title+'</h3>\
									<p>'+rdata[i].body+'</p>\
								</div>\
							</div>'
					}
					$(".DrawRecordCon").html(body);
				});
}
function delect(u,uid,type){

layer.confirm('是否删除：'+u, {
  btn: ['确认','取消'] //按钮
}, function(){
  
 $.get('index.php?action=delect&type='+type+'&id='+uid,function(rdata){
	if(rdata.status){
	layer.msg(rdata.msg,{icon:6});
	location.reload();
	}else{
	layer.msg(rdata.msg,{icon:1});
 
	}
});
 
}, function(){
 
});
}
function checkUpdate(){
				var loadT = layer.msg('正在获取版本信息...',{icon:16,time:10000});
				$.get('index.php?action=updateweb',function(rdata){
					layer.close(loadT);
					if(rdata.status){
					}else{
					layer.msg(rdata.msg,{icon:1});
					}
					if(rdata.version != undefined) updateMsg();
				});
			}
function updateMsg(){
				$.get('index.php?action=updateweb',function(rdata){
					layer.open({
						type:1,
						title:'升级到['+rdata.version+'] - Html OS 2.0 【在线升级程序】',
						area: ['80%'], 
						shadeClose:false,
						closeBtn:2,
						content:'<div class="setchmod zun-form-new">'
								+'<p style="padding: 0 20px 10px;line-height: 24px;">'+rdata.updateMsg+'</p>'
								+'<div class="submit-btn" style="text-align: center;">'
								+'<button type="button" class="btn btn-danger btn-sm btn-title" onclick="layer.closeAll()">取消</button>'
								+'<button type="button" class="btn btn-success btn-sm btn-title" onclick="updateVersion(\''+rdata.version+'\')" >立即升级</button>'
							    +'</div>'
								+'</div>'
					});
				});
			}
function updateVersion(version){
				var loadT = layer.msg('正在升级面板...请稍后',{icon:16,time:300000});
				$.get('index.php?action=updateweb&toUpdate=yes',function(rdata){
					 layer.msg(rdata.msg,{icon:rdata.status?1:5});
					if(rdata.status){
						layer.close(loadT);
						layer.msg('成功升级',{icon:1});
					}
				});
			}