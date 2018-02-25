function PageData(data,page,type){
	var next = page + 1;
	var prev = page - 1;
	var disabled_prev = '';
	var disabled_next = '';
	if (page <= 1) {
		disabled_prev = 'disabled';
		prev = 1;
	}
	if (page >= data.page) {
		disabled_next = 'disabled';
		next = data.page;
	}
	
	if (page < 4) {
		var i = 1;
	} else {
		var i = page - 1;
	}
	
	var count = i+3;
	if ((data.page - page) < 2) {
		count = data.page + 1;
	}
	//构造分页
	var PageData = "<li class='" + disabled_prev + "'><a href='javascript:;' onclick='"+type+"(1)'>&lt;&lt;</a></li><li class='prev " + disabled_prev + "'><a href='javascript:;' onclick='"+type+"(" + prev + ")'>&lt;</a></li>";
	for (i; i < count; i++) {
		if (i == page) {
			PageData += "<li class='active'><a href='javascript:;' onclick='"+type+"(" + i + ")'>" + i + "</a></li>";
		} else {
			PageData += "<li><a href='javascript:;' onclick='"+type+"(" + i + ")'>" + i + "</a></li>";
		}
	}
	PageData += "<li class='next " + disabled_next + "'><a href='javascript:;' onclick='"+type+"(" + next + ")'>&gt;</a></li>\
	<li class='" + disabled_next + "'><a href='javascript:;' onclick='"+type+"(" + data.page + ")'>&gt;&gt;</a></li>\
	<li class='disabled'><a href='javascript:;'>共 " + data.page + " 页  "+data.count+" 条记录</a></li>";
	return PageData;
}



	/**
	 * 修改远程端口
	 */

function mstsc(port) {
		layer.confirm('更改远程端口时，将会注消所有已登陆帐户，您真的要更改远程端口吗？', {
			title: '远程端口'
		}, function(index) {
			if (index > 0) {
				var data = "port=" + port;
				var loadT = layer.load({
					shade: true,
					shadeClose: false
				});
				$.post('/firewall.php?action=SetSshPort', data, function(ret) {
					if (ret == true) {
						layer.msg('更改成功', {
							icon: 1
						});
						location.reload();
					} else {
						layer.msg('连接服务器失败', {
							icon: 5
						});
						layer.close(loadT);
					}

				});
			}
		});
	}
	/**
	 * 更改禁ping状态
	 * @param {Int} state 0.禁ping 1.可ping
	 */

function ping(state) {
	if (state == 0) {
		layer.confirm('禁PING后不影响服务器正常使用，但无法ping通服务器，您真的要禁PING吗？', {
			title: '禁PING',
			closeBtn:2
		}, function(index) {
			if (index > 0) {
				var loadT = layer.load({
					shade: true,
					shadeClose: false
				});
				$.get('/firewall.php?action=SetPing&st=0', function(ret) {
					if (ret == true) {
						layer.msg('已禁Ping', {
							icon: 1
						});
						location.reload();
					} else {
						layer.msg('连接服务器失败', {
							icon: 5
						});
						$("input[name='noping']").prop("checked","checked");
						layer.close(loadT);
					}
				});
			}
		},function(){
			$("input[name='noping']").prop("checked",false);
		});
	} else {
		layer.confirm('解除禁PING状态可能会被黑客发现您的服务器，您真的要解禁吗？', {
			title: '解禁PING',
			closeBtn:2
		}, function(index) {
			if (index > 0) {
				var loadT = layer.load({
					shade: true,
					shadeClose: false
				});
				$.get('/firewall.php?action=SetPing&st=1', function(ret) {
					if (ret == true) {
						layer.msg('已解除禁Ping', {
							icon: 1
						});
						location.reload();
					} else {
						layer.msg('连接服务器失败', {
							icon: 5
						});
						$("input[name='noping']").prop("checked",false);
						layer.close(loadT);
					}
				});
			}
		},function(){
			$("input[name='noping']").prop("checked","checked");
		});
	}
}

$(document).ready(function() {
	$(".sub-menu a.sub-menu-a").click(function() {
		$(this).next(".sub").slideToggle("slow")
			.siblings(".sub:visible").slideUp("slow");
	});
});

function thenew(info, id, ssid, ip) {
	if (info == null) {
		layer.confirm('初始化数据可能需要几分钟时间，继续吗？', {
			title: '初始化'
		}, function(index) {
			if (index > 0) {
				var loadT = layer.load({
					shade: true,
					shadeClose: false
				});
				$.get('/Server/there?id=' + id + '&ssid=' + ssid + '&ip=' + ip, function(ret) {
					if (ret == true) {
						layer.msg('初始化成功', {
							icon: 1
						});
						location.reload();
					} else {
						layer.msg('初始化失败，没有安装服务', {
							icon: 5
						});
						layer.close(loadT);
					}
				});
			}
		});

	} else {
		window.location.href = "/Server?ssid=" + ssid;
	}
}



//生成n位随机密码
function RandomStrPwd(len) {
	len = len || 32;
	var $chars = 'AaBbCcDdEeFfGHhiJjKkLMmNnPpRSrTsWtXwYxZyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1  
	var maxPos = $chars.length;
	var pwd = '';
	for (i = 0; i < len; i++) {
		pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
	}
	return pwd;
}
function repeatPwd(len){
	$("#MyPassword").val(RandomStrPwd(len));	
}


//刷新当前页面
function refresh(){
    window.location.reload();
}





/**
 * 提交备注信息
 * @param {String} tab 类型
 * @param {Number} id
 */
function GetBakPost(tab){
	$(".baktext").hide().prev().show();
	var id = $(".baktext").attr("data-id");
	var bakText = $(".baktext").val();
	if(bakText==''){
		bakText='空';
	}
	setWebPs(tab, id, bakText);
	$(".baktext").remove();
}
/**
 * 显示修改备注层
 * @param {String} tab 表名
 * @param {Number} id  索引ID
 * @param {String} ps 备注信息
 */

function setWebPs(tab, id, bakText) {
	var loadT = layer.load({
		shade: true,
		shadeClose: false
	});
	var data = "ps="+bakText;
	$.get('/Ajax.php?action=setPs&tab=' + tab + '&id=' + id + '&' + data, function(ret) {
		if (ret == true) {
			if (tab == 'sites') {
				getWeb(1);
			} else if (tab == 'ftps') {
				getFtp(1);
			} else {
				getData(1);
			}

			layer.closeAll();
			layer.msg('修改成功', {
				icon: 1
			});
		} else {
			layer.msg('失败，没有权限', {
				icon: 5
			});
			layer.closeAll();
		}
	});
}
	/**
	 * 全选/反选
	 */
$("#setBox").click(function() {
	if ($(this).prop("checked")) {
		$("input[name=id]").prop("checked", true);
	} else {
		$("input[name=id]").prop("checked", false);
	}
});

/**
 * 导航展开/闭合
 */
$(".menu-icon").click(function() {
	$(".sidebar-scroll").toggleClass("sidebar-close");
	$(".main-content").toggleClass("main-content-open");
	if ($(".sidebar-close")) {
		$(".sub-menu").find(".sub").css("display", "none");
	}
});
var Upload,percentage;

//帐户设置
function UsersSetup(id){
	$.get('/Client/GetClient?id='+id,function(rdata){
		var index = layer.open({
			type: 1,
			skin: 'demo-class',
			area: '540px',
			title: '用户设置',
			closeBtn: 2,
			shift: 5,
			shadeClose: false,
			content: '<div class="user-shezhi">\
						  <ul class="nav nav-tabs" role="tablist">\
						    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">基本</a></li>\
						    <li role="presentation"><a href="#binding" aria-controls="binding" role="tab" data-toggle="tab">绑定</a></li>\
						    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">通知</a></li>\
						  </ul>\
						  <div class="tab-content">\
						    <div role="tabpanel" class="tab-pane active" id="home">\
						    	<form id="tabHome" class="zun-form-new">\
						    		<div class="line">\
									    <label><span>新密码</span></label>\
									    <div class="info-r">\
									      <input type="password" name="password1" id="password1" placeholder="请输入新密码">\
									    </div>\
									</div>\
						    		<div class="line">\
									    <label><span>重复密码</span></label>\
									    <div class="info-r">\
									      <input type="password" name="password2" id="password2" placeholder="再输一遍">\
									    </div>\
									</div>\
						    		<div class="submit-btn">\
							    			<button type="button" onclick="layer.closeAll()" class="btn btn-danger btn-sm btn-title">取消</button>\
										    <button type="button" class="btn btn-success btn-sm btn-title">提交</button>\
									</div>\
						    	</form>\
						    </div>\
						    <div role="tabpanel" class="tab-pane" id="binding">\
								<form id="tabBinding" class="zun-form-new">\
									<div class="line">\
									    <label><span>手机</span></label>\
									    <div class="info-r">\
									      <input type="number" name="phone" id="phone" placeholder="11位手机号码">\
									    </div>\
									</div>\
						    		<div class="line">\
									    <label><span>邮箱</span></label>\
									    <div class="info-r">\
									      <input type="email" name="email" id="email" placeholder="abc@qq.com">\
									    </div>\
									</div>\
						    	</form>\
							</div>\
						    <div role="tabpanel" class="tab-pane" id="messages">\
						    	<form id="tabMessage" class="zun-form-new">\
						    		<div class="line">\
						    		<select name="body" style="width:40%">\
						    			<option value="异地登陆通知">异地登陆通知</option>\
						    			<option value="站点异常通知">站点异常通知</option>\
						    			<option value="备份通知">备份通知</option>\
						    			<option value="服务器异常通知">服务器异常通知</option>\
						    		</select>\
						    		<select name="type"  style="width:20%">\
						    			<option value="邮件">邮件</option>\
						    			<option value="短信">短信</option>\
						    		</select>\
						    		<a class="btn btn-default">添加</a>\
						    		</div>\
						    	</form>\
						    </div>\
						  </div>\
						</div>'
		});
	});
	
}
//字节单位转换
function ToSize(bytes){
	var unit = [' B',' KB',' MB',' GB'];
	var c = 1024;
	for(var i=0;i<unit.length;i++){
		if(bytes < c){
			return (i==0?bytes:bytes.toFixed(2)) + unit[i];
		}
		bytes /= c;
	}
}
//取帮助信息
function getHelp(id){
		layer.open({
			type: 2,
			area:['60%','95%'],
			skin: 'demo-class',
			title: '帮助信息',
			closeBtn: 2,
			shift: 5,
			shadeClose: false,
			content: '/Help/helpFind?id='+id
			});
	
}


//文件路径选择
function ChangePath(id){
	setCookie("SetId",id);
	var mycomputer = layer.open({
		type: 1,
		area: '650px',
		title: '选择目录',
		closeBtn: 2,
		shift: 5,
		shadeClose: false,
		content:"<div class='changepath'>\
			<div class='path-top'>\
				<button type='button' class='btn btn-default btn-sm' onclick='BackFile()'><span class='glyphicon glyphicon-share-alt'></span> 返回</button>\
				<div class='place' id='PathPlace'>当前路径：<span></span></div>\
			</div>\
			<div class='path-con'>\
				<div class='path-con-left'>\
					<dl>\
						<dt class='ico-computer title cursor' id='comlist' onclick='BackMyComputer()'>计算机</dt>\
					</dl>\
				</div>\
				<div class='path-con-right'>\
					<ul class='default' id='computerDefautl'></ul>\
					<div class='file-list'>\
						<table class='table table-hover'>\
							<thead>\
								<tr class='file-list-head'>\
									<th width='55%'>文件名</th>\
									<th width='10%'>权限</th>\
									<th width='15%'>所有者</th>\
									<th width='20%'></th>\
								</tr>\
							</thead>\
							<tbody id='tbody' class='list-list'>\
							</tbody>\
						</table>\
					</div>\
				</div>\
			</div>\
		</div>\
		<div class='getfile-btn' style='margin-top:0'>\
				<button type='button' class='btn btn-default btn-sm pull-left' onclick='CreateFolder()'>新建文件夹</button>\
				<button type='button' class='btn btn-danger btn-sm btn-title' onclick=\"layer.close(getCookie('ChangePath'))\">关闭</button>\
				<button type='button' class='btn btn-success btn-sm btn-title' onclick='GetfilePath()'>选择</button>\
			</div>"
	});
	setCookie('ChangePath',mycomputer);
	var path = $("#inputPath").val();
	GetDiskList("");
	GetDiskList(path);
	ActiveDisk();
}
//取数据
function GetDiskList(Path){
	var Body='';
	var LBody= '';
	var data='path='+Path;
	$.post('/Ajax.php?action=GetDir',data,function(rdata){
			
		if(rdata.DISK != undefined){
			for(var i=0; i < rdata.DISK.length; i++){
				LBody +="<dd onclick=\"GetDiskList('"+rdata.DISK[i].Span+"')\"><span class='glyphicon glyphicon-hdd'></span>&nbsp;"+rdata.DISK[i].Span+"("+rdata.DISK[i].Size+"GB)</dd>";
			}
			$("#comlist").after(LBody);
		}else{
			
			for(var i=0; i < rdata.DIR.length; i++){
				var fmp = rdata.DIR[i].split(";");
				Body +="<tr>\
							<td onclick=\"GetDiskList('"+rdata.PATH+"/"+fmp[0]+"')\"><span class='glyphicon glyphicon-folder-open'></span>"+fmp[0]+"</td>\
							<td>" + fmp[3] + "</td>\
							<td>" + fmp[4] + "</td>\
							<td><span class='delfile-btn' onclick=\"NewDelFile('"+rdata.PATH+fmp[0]+"')\">X</span></td>\
						</tr>";
			}
			if(rdata.FILES != null && rdata.FILES !=''){
				for(var i=0; i < rdata.FILES.length; i++){
					var fmp = rdata.FILES[i].split(";");
					Body +="<tr>\
								<td><span class='glyphicon glyphicon-file'></span>"+fmp[0]+"</td>\
								<td>" + fmp[3] + "</td>\
								<td>" + fmp[4] + "</td>\
								<td></td>\
							</tr>";
				}
			}
			$(".default").hide();
			$(".file-list").show();
			$("#tbody").html(Body);
			if(rdata.PATH.substr(rdata.PATH.length-1,1) != '/') rdata.PATH+='/'
			$("#PathPlace").find("span").html(rdata.PATH);
			ActiveDisk();
			return;
		}
		
		if(Path == '' && rdata.DIR != undefined){
			for(var i=0; i < rdata.DIR.length; i++){
				Body +="<tr><td onclick=\"GetDiskList('"+rdata.PATH+"/"+fmp[0]+"')\"><span class='glyphicon glyphicon-folder-open'></span>"+fmp[0]+"</td><td><span class='delfile-btn' onclick=\"NewDelFile('"+rdata.PATH+fmp[0]+"')\">X</span></td></tr>";
			}
			for(var i=0; i < rdata.FILES.length; i++){
				Body +="<tr><td><span class='glyphicon glyphicon-file'></span>"+rdata.FILES[i]+"</td><td></td></tr>";
			}
			$(".default").hide();
			$(".file-list").show();
			$("#tbody").html(Body);
			if(rdata.PATH.substr(rdata.PATH.length-1,1) != '/') rdata.PATH+='/'
			$("#PathPlace").find("span").html(rdata.PATH);
			ActiveDisk();
		}
	});
}

//创建文件夹
function CreateFolder(){
	var html = "<tr><td><span class='glyphicon glyphicon-folder-open'></span> <input id='newFolderName' class='newFolderName' type='text' value=''></td><td><button id='nameOk' type='button' class='btn btn-success btn-xs'>确定</button>&nbsp;<button id='nameNOk' type='button' class='btn btn-default btn-xs'>取消</button></td></tr>";
	if($("#tbody tr").length==0){
		$("#tbody").append(html);
	}
	else{
		$("#tbody tr:first-child").before(html);	
	}
	$(".newFolderName").focus();
	$("#nameOk").click(function(){
		var name = $("#newFolderName").val();
		var txt = $("#PathPlace").find("span").text();
		newTxt = txt.replace(new RegExp(/(\/)/g),'\\') + name;
		var data='path=' + newTxt;
		$.post('/Ajax.php?action=AddDir',data,function(rdata){
			if(rdata.status==true){
				layer.msg(rdata.msg, {icon: 1});
			}
			else{
				layer.msg(rdata.msg, {icon: 2});
			}
			GetDiskList(txt);
		})
	})
	$("#nameNOk").click(function(){
		$(this).parents("tr").remove();
	})
}

//删除文件夹
function NewDelFile(path){
	var txt = $("#PathPlace").find("span").text();
	newTxt = path.replace(new RegExp(/(\/)/g),'\\');
	var data='path=' + newTxt;
	$.post('/Ajax.php?action=DelNullDir',data,function(rdata){
		if(rdata.status==true){
			layer.msg(rdata.msg, {icon: 1});
		}
		else{
			layer.msg(rdata.msg, {icon: 2});
		}
		GetDiskList(txt);
	})
}
//当前磁盘高亮
function ActiveDisk(){
	var active = $("#PathPlace").find("span").text().substring(0,1);
	switch(active){
		case "C":
		$(".path-con-left dd:nth-of-type(1)").css("background","#eee").siblings().removeAttr("style");
		break;
		case "D":
		$(".path-con-left dd:nth-of-type(2)").css("background","#eee").siblings().removeAttr("style");
		break;
		case "E":
		$(".path-con-left dd:nth-of-type(3)").css("background","#eee").siblings().removeAttr("style");
		break;
		case "F":
		$(".path-con-left dd:nth-of-type(4)").css("background","#eee").siblings().removeAttr("style");
		break;
		case "G":
		$(".path-con-left dd:nth-of-type(5)").css("background","#eee").siblings().removeAttr("style");
		break;
		case "H":
		$(".path-con-left dd:nth-of-type(6)").css("background","#eee").siblings().removeAttr("style");
		break;
		default:
		$(".path-con-left dd").removeAttr("style");
	}
}

function BackFile(){
	var str = $("#PathPlace").find("span").text().replace('//','/');
	if(str.substr(str.length-1,1) == '/'){
			str = str.substr(0,str.length-1);
	}
	var Path = str.split("/");
	var back = '/';
	if (Path.length > 2) {
		var count = Path.length - 1;
		for (var i = 0; i < count; i++) {
			back += Path[i] + '/';
		}
		if(back.substr(back.length-1,1) == '/'){
			back = back.substr(0,back.length-1);
		}
		GetDiskList(back.replace("//","/"));
	} else {
		back += Path[0];
		GetDiskList(back.replace("//","/"));
	}

}
//选择文件夹
function GetfilePath(){
	var txt = $("#PathPlace").find("span").text();
	txt = txt.replace(new RegExp(/(\\)/g),'/');
	$("#"+getCookie("SetId")).val(txt);
	layer.close(getCookie('ChangePath'));
}

//虚拟目录
function VirtualDirectories(id,path){
	layer.open({
		type: 1,
		area: '620px',
		title: '查看目录',
		closeBtn: 2,
		shift: 5,
		shadeClose: false,
		content:"<div class='changepath'>\
			<div class='path-top'>\
				<button id='backPath' type='button' class='btn btn-default btn-sm' ><span class='glyphicon glyphicon-share-alt'></span> 返回</button>\
				<div class='place' id='xuniPathPlace'>当前路径：<span></span></div>\
			</div>\
			<div class='path-con'>\
				<div class='path-con-right' style='width:100%'>\
					<table class='table table-hover'>\
						<thead>\
							<tr class='file-list-head'>\
								<th width='60%'>名称</th>\
								<th width='15%'>大小</th>\
								<th width='25%'>修改时间</th>\
							</tr>\
						</thead>\
						<tbody id='xunitbody' class='list-list'>\
						</tbody>\
					</table>\
				</div>\
			</div>\
		</div>"
	});
	GetVirtualDirectories(id,path);
	$("#backPath").click(function(){
		var path = $("#xuniPathPlace").find("span").text();
		GetVirtualDirectories(-1,path);
	})
}
//虚拟目录取数据
function GetVirtualDirectories(id,path){
	if(path == undefined){
		path = "";
	}
	var Body = "";
	var data = "id="+id+"&path="+path;
	$.get("/Api/GetDirFormat",data,function(rdata){
		for(var i=0; i < rdata.DIR.length; i++){
			Body +="<tr><td onclick=\"GetVirtualDirectories("+rdata.DIR[i].id+",\'"+rdata.PATH+"\')\"><span class='glyphicon glyphicon-folder-open'></span>"+rdata.DIR[i].name+"</td><td>--</td><td>"+rdata.DIR[i].addtime+"</td></tr>";
		}
		for(var i=0; i < rdata.FILES.length; i++){
			Body +="<tr><td><span class='glyphicon glyphicon-file'></span>"+rdata.FILES[i].filename+"</td><td>"+(ToSize(rdata.FILES[i].filesize))+"</td><td>"+rdata.FILES[i].uptime+"</td></tr>";
		}
		$("#xunitbody").html(Body);
		$("#xuniPathPlace").find("span").text(rdata.PATH);
	});
}


//写cookies
function setCookie(name,value)
{
var Days = 30;
var exp = new Date();
exp.setTime(exp.getTime() + Days*24*60*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
//取cookies
function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
		return unescape(arr[2]);
	else
		return null;
}

//主体内容高度自适应
function aotuHeight(){
	var McontHeight = $("body").height() - 40;
	$(".main-content").css("min-height",McontHeight);
}
$(function(){
	aotuHeight()
})
$(window).resize(function(){
	aotuHeight()
})

//显示隐藏密码
function showHidePwd(){
	var open = "glyphicon-eye-open",
		close = "glyphicon-eye-close";
	$(".pw-ico").click(function(){
		var $class = $(this).attr("class"),
			$prev = $(this).prev();
		if($class.indexOf(open)>0){
			var pw= $prev.attr("data-pw");
			$(this).removeClass(open).addClass(close);
			$prev.text(pw);
		}
		else{
			$(this).removeClass(close).addClass(open);
			$prev.text("**********");
		}
	});	
}

//打开目录
function openPath(path){
	setCookie('Path',path);
	window.location.href = 'files.php';
}

//编辑文件
function OnlineEditFile(type, fileName) {
	if (type == 1) {
		var path = $("#PathPlace input").val();
		var data = encodeURIComponent($("#textBody").val().replace(/\+/g,'(__bt@cn__)'));
		var encoding = $("select[name=encoding]").val();
		layer.msg('正在保存...', {
			icon: 16,
			time: 0
		});
		$.post('/files.php?action=SaveFileBody', 'data=' + data + '&file=' + fileName+'&encoding='+encoding, function(rdata) {
			layer.closeAll();
			layer.msg(rdata.msg, {
				icon: rdata.status ? 1 : 5
			});
		});
		return;
	}
	if (type == 2) {
		var path = $("#PathPlace input").val();
		var data = encodeURIComponent($("#textBody").val().replace(/\+/g,'(__bt@cn__)'));
		layer.msg('正在保存...', {
			icon: 16,
			time: 0
		});
		var encoding = $("select[name=encoding]").val();
		$.post('/files.php?action=SaveFileBody', 'data=' + data + '&file=' + fileName+'&encoding='+encoding, function(rdata) {
			layer.msg(rdata.msg, {
				icon: rdata.status ? 1 : 5
			});
		});
		return;
	}

	layer.msg('正在读取文件...', {
		icon: 16,
		time: 0
	});
	var exts = fileName.split('.');
	var ext = exts[exts.length-1];
	var msg = '在线编辑只支持文本与脚本文件，默认UTF8编码，是否尝试打开？';
	if(ext == 'conf' || ext == 'cnf' || ext == 'ini'){
		msg = '您正在打开的是一个配置文件，若您不了解配置规则可能导致该配置的程序无法正常使用，继续吗？';
	}
	var doctype;
	switch (ext){
		case 'html':
			var mixedMode = {
				name: "htmlmixed",
				scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
							   mode: null},
							  {matches: /(text|application)\/(x-)?vb(a|script)/i,
							   mode: "vbscript"}]
			  };
			doctype = mixedMode;
			break;
		case 'htm':
			var mixedMode = {
				name: "htmlmixed",
				scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
							   mode: null},
							  {matches: /(text|application)\/(x-)?vb(a|script)/i,
							   mode: "vbscript"}]
			  };
			doctype = mixedMode;
			break;
		case 'js':
			doctype = "text/javascript";
			break;
		case 'json':
			doctype = "application/ld+json";
			break;
		case 'css':
			doctype = "text/css";
			break;
		case 'php':
			doctype = "application/x-httpd-php";
			break;
		case 'xml':
			doctype = "application/xml";
			break;
		case 'sql':
			doctype = "text/x-sql";
			break;
		case 'conf':
			doctype = "text/x-nginx-conf";
			break;
		default:
			var mixedMode = {
				name: "htmlmixed",
				scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
							   mode: null},
							  {matches: /(text|application)\/(x-)?vb(a|script)/i,
							   mode: "vbscript"}]
			  };
			doctype = mixedMode;
	}
	$.post('/files.php?action=GetFileBody', 'file=' + fileName, function(rdata) {
		layer.closeAll();
		var encodings = ["GBK","UTF-8"];
		var encoding = ''
		var opt = ''
		var val = ''
		for(var i=0;i<encodings.length;i++){
			opt = rdata.encoding == encodings[i] ? 'selected':'';
			encoding += '<option value="'+encodings[i]+'" '+opt+'>'+encodings[i]+'</option>';
		}
		
		layer.open({
			type: 1,
			shift: 5,
			closeBtn: 2,
			area: ['90%', '90%'], //宽高
			title: '在线编辑[' + fileName + ']',
			content: '<form class="zun-form-new" style="padding-top:10px">\
			<div class="line noborder">\
			<p style="color:red;margin-bottom:10px">提示：Ctrl+F 搜索关键字，Ctrl+G 查找下一个，Ctrl+S 保存，Ctrl+Shift+R 查找替换!\
			<select name="encoding" style="width: 74px;position: absolute;top: 11px;right: 14px;height: 22px;z-index: 9999;border-radius: 0;">'+encoding+'</select></p>\
			<textarea class="mCustomScrollbar" id="textBody" style="width:100%;margin:0 auto;line-height: 1.8;position: relative;top: 10px;" value="" />\
			</div>\
			<div class="submit-btn" style="position:absolute; bottom:0; width:100%">\
			<button type="button" class="btn btn-danger btn-sm btn-title" onclick="layer.closeAll()">关闭</button>\
			<button id="OnlineEditFileBtn" type="button" class="btn btn-success btn-sm btn-title">保存</button>\
			</div>\
			</form>'
		});
		$("#textBody").text(rdata.data);
		//$(".layui-layer").css("top", "5%");
		var h = $(window).height()*0.9;
		$("#textBody").height(h-160);
		var editor = CodeMirror.fromTextArea(document.getElementById("textBody"), {
			extraKeys: {"Ctrl-F": "findPersistent","Ctrl-H":"replaceAll"},
			mode:doctype,
			lineNumbers: true,
			matchBrackets:true,
			matchtags:true,
			autoMatchParens: true
		});
		editor.focus();
		editor.setSize('auto',h-150);
		$("#OnlineEditFileBtn").click(function(){
			$("#textBody").text(editor.getValue());
			OnlineEditFile(1,fileName);
		})
		$(window).keydown(function(e) {
			if(e.keyCode == 83 && e.ctrlKey){
				$("#textBody").text(editor.getValue());
				OnlineEditFile(2,fileName);
				e.preventDefault();
			}
			if((e.keyCode == 70 && e.ctrlKey) || (e.keyCode == 71 && e.ctrlKey) || (e.keyCode == 82 && e.ctrlKey)){
				e.preventDefault();
			}
		});
	});
}

//服务管理
function ServiceAdmin(name,type){
	
	
	var data = "name="+name+"&type="+type;
	var msg = '';
	switch(type){
		case 'stop':
			msg = '停止';
			break;
		case 'start':
			msg = '启动';
			break;
		case 'restart':
			msg = '重启';
			break;
		case 'reload':
			msg = '重载';
			break;
	}
	layer.confirm('您真的要'+msg+name+'服务吗？',{icon:3},function(){
		layer.msg('正在'+msg+name+'服务...',{icon:16,time:0});
		$.post('/config.php?action=ServiceAdmin',data,function(rdata){
			layer.closeAll();
			var reMsg =rdata.status?name+'服务已'+msg:name+'服务'+msg+'失败!';
			layer.msg(reMsg,{icon:rdata.status?1:5});
			if(type == 'stop' || type == 'start'){
				setTimeout(function(){
					window.location.reload();
				},3000);
			}
			
			if(name == 'nginx'){
				if(!rdata.status) layer.msg(rdata.msg,{icon:5,area:'80%',time:10});
			}
		}).error(function(){
			layer.closeAll();
			layer.msg('操作成功!',{icon:1});
			setTimeout(function(){
				window.location.reload();
			},3000);
		});
	});
}

//停用PHP
function stopPHP(version){
	layer.msg('正在停用[PHP-'+version+']...',{icon:16,time:0})
	$.get('/config.php?action=StopPHPVersion&version='+version,function(rdata){
		layer.closeAll()
		layer.msg(rdata.msg,{icon:rdata.status?1:5})
		setTimeout(function(){
			window.location.reload();
		},3000);
	})
}
//启用
function startPHP(version){
	layer.msg('正在启用[PHP-'+version+']...',{icon:16,time:0})
	$.get('/config.php?action=StartPHPVersion&version='+version,function(rdata){
		layer.closeAll()
		layer.msg(rdata.msg,{icon:rdata.status?1:5})
		setTimeout(function(){
			window.location.reload();
		},3000);
	})
}

//获取配置文件
function GetConfigFile(type){
	var fileName = '';
	switch(type){
		case 'mysql':
			fileName = '/etc/my.cnf';
			break;
		case 'nginx':
			fileName = '/www/server/nginx/conf/nginx.conf';
			break;
		case 'pure-ftpd':
			fileName = '/www/server/pure-ftpd/etc/pure-ftpd.conf';
			break;
		case 'apache':
			fileName = '/www/server/apache/conf/httpd.conf';
			break;
		default:
			fileName = '/www/server/php/'+type+'/etc/php.ini';
			break;
	}
	
	OnlineEditFile(0,fileName);
}

//查看PHP负载状态
function GetPHPStatus(version){
	if(version == '52'){
		layer.msg('抱歉,不支持PHP5.2',{icon:5});
		return;
	}
	
	$.get('site.php?action=GetPHPStatus&version='+version,function(rdata){
		layer.open({
			type:1,
			area:'400',
			title:'PHP负载状态',
			closeBtn:2,
			shift:5,
			shadeClose:true,
			content:"<div style='margin:15px;'><table class='table table-hover table-bordered'>\
						<tr><th>应用池(pool)</th><td>"+rdata.pool+"</td></tr>\
						<tr><th>进程管理方式(process manager)</th><td>"+((rdata['process manager'] == 'dynamic')?'活动':'静态')+"</td></tr>\
						<tr><th>启动日期(start time)</th><td>"+rdata['start time']+"</td></tr>\
						<tr><th>请求数(accepted conn)</th><td>"+rdata['accepted conn']+"</td></tr>\
						<tr><th>请求队列(listen queue)</th><td>"+rdata['listen queue']+"</td></tr>\
						<tr><th>最大等待队列(max listen queue)</th><td>"+rdata['max listen queue']+"</td></tr>\
						<tr><th>socket队列长度(listen queue len)</th><td>"+rdata['listen queue len']+"</td></tr>\
						<tr><th>空闲进程数量(idle processes)</th><td>"+rdata['idle processes']+"</td></tr>\
						<tr><th>活跃进程数量(active processes)</th><td>"+rdata['active processes']+"</td></tr>\
						<tr><th>总进程数量(total processes)</th><td>"+rdata['total processes']+"</td></tr>\
						<tr><th>最大活跃进程数量(max active processes)</th><td>"+rdata['max active processes']+"</td></tr>\
						<tr><th>到达进程上限次数(max children reached)</th><td>"+rdata['max children reached']+"</td></tr>\
						<tr><th>慢请求数量(slow requests)</th><td>"+rdata['slow requests']+"</td></tr>\
					 </table></div>"
		});
	});
}

//查看Nginx负载状态
function GetNginxStatus(){
	$.get('Ajax.php?action=GetNginxStatus',function(rdata){
		layer.open({
			type:1,
			area:'400',
			title:'Nginx负载状态',
			closeBtn:2,
			shift:5,
			shadeClose:true,
			content:"<div style='margin:15px;'><table class='table table-hover table-bordered'>\
						<tr><th>活动连接(Active connections)</th><td>"+rdata.active+"</td></tr>\
						<tr><th>总连接次数(accepts)</th><td>"+rdata.accepts+"</td></tr>\
						<tr><th>总握手次数(handled)</th><td>"+rdata.handled+"</td></tr>\
						<tr><th>总请求数(requests)</th><td>"+rdata.requests+"</td></tr>\
						<tr><th>请求数(Reading)</th><td>"+rdata.Reading+"</td></tr>\
						<tr><th>响应数(Writing)</th><td>"+rdata.Writing+"</td></tr>\
						<tr><th>驻留进程(Waiting)</th><td>"+rdata.Waiting+"</td></tr>\
					 </table></div>"
		});
	});
}
