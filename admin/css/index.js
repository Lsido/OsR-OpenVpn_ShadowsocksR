function loadsign(flow_left){
    var handlerPopup = function(captchaObj) {
        $("#popup-submit_sign").click(function() {
            var validate = captchaObj.getValidate();
            if (!validate) {
                alert('请先完成验证！');
                return;
            }
            // alert("二次验证");
            document.getElementById('popup-submit_sign').innerHTML="签到中";
            document.getElementById('popup-submit_sign').className="btn btn-default";
            document.getElementById('popup-submit_sign').disabled=true;
            $.ajax({
                url:"ajax.php?mod=user:addflow",
                type: "post",
                async:true,
                dataType: "json",
                data: {
                    geetest_challenge: validate.geetest_challenge,
                    geetest_validate: validate.geetest_validate,
                    geetest_seccode: validate.geetest_seccode
                },
                success: function (result) {
                    if (result.ret == 0) {
                        document.getElementById('flow_left').innerHTML=sizeformat(result.flow+flow_left);
                        alert('签到成功！<br>您是 '+document.getElementById('level_n').innerHTML+' 用户<br>本次签到 + '+sizeformat(result.flow),"提示");
                        document.getElementById('popup-submit_sign').innerHTML="签到成功";

                    } else if(result.ret == 1) {
                        alert('签到失败！<br>您今天已经签过到了!',"提示");
                        document.getElementById('popup-submit_sign').innerHTML="签到失败";
                    }else{
                        alert('签到失败！<br>'+result.msg,"提示");
                        document.getElementById('popup-submit_sign').innerHTML="签到失败";
                    }
                }
            });

        });
        captchaObj.bindOn("#popup-submit_sign"); // 弹出式需要绑定触发验证码弹出按钮
        captchaObj.appendTo("#popup-captcha_sign"); // 将验证码加到id为captcha的元素里
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "plugins/geetest/StartCaptchaServlet.php?t=" + (new Date()).getTime(),// 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function(data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    product: "popup",
                    // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                    offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                },
                handlerPopup);
        }
    });
}
function Sparklinesstatistic(){

    // be fetched from a server
    var dxta1 = [],dxta2 = [],
        totalPoints = 100;
    function getServerData1() {
        if (dxta1.length > 0)
            dxta1 = dxta1.slice(1);
        // Do a random walk
        while (dxta1.length < totalPoints) {
            var prev = dxta1.length > 0 ? dxta1[dxta1.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;
            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }
            dxta1.push(y);
        }
        // Zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < dxta1.length; ++i) {
            res.push([i, dxta1[i]/2])
        }
        return res;
    }
    function getServerData2() {
        if (dxta2.length > 0)
            dxta2 = dxta2.slice(1);
        // Do a random walk
        while (dxta2.length < totalPoints) {
            var prev = dxta2.length > 0 ? dxta2[dxta2.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;
            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }
            dxta2.push(y);
        }
        // Zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < dxta2.length; ++i) {
            res.push([i, dxta2[i]/3])
        }
        return res;
    }
    var plot = $.plot("#realtime-updates", [{ data: getServerData1(), label: "网络" }, { data: getServerData2(), label: "CPU" }], {
        series: {
            lines: {
                show: true,
                lineWidth: 0.75,
                fill: 0.15,
                fillColor: { colors: [ { opacity: 0.01 }, { opacity: 0.3 } ] }
            },
            shadowSize: 0   // Drawing is faster without shadows
        },
        grid: {
            labelMargin: 10,
            hoverable: true,
            clickable: true,
            borderWidth: 1,
            borderColor: 'rgba(0, 0, 0, 0.06)'
        },
        yaxis: {
            min: 0,
            max: 100,
            tickColor: 'rgba(0, 0, 0, 0.06)',
            font: {color: 'rgba(0, 0, 0, 0.4)'}
        },
        xaxis: {
            show: false
        },
        colors: [Utility.getBrandColor('success'), Utility.getBrandColor('inverse')],
        tooltip: true,
        tooltipOpts: {
            content: "%s: %y%"
        }

    });

    function getServerData(){
        var obj=[],network=[],memory=[];
        $.ajax({
            // 获取id，challenge，success（是否启用failback）
            url:"ajax.php?mod=server:load&t=" + (new Date()).getTime(),// 加随机数防止缓存
            type: "get",
            dataType: "json",
            success: function(data) {
                dxta1 = dxta1.slice(1);
                dxta2 = dxta2.slice(1);
                while (dxta1.length < totalPoints) {
                    var y1=data.info.list[0].net;
                    dxta1.push(y1);
                    var y2=data.info.list[0].cpu;
                    dxta2.push(y2);
                }
                for (var i = 0; i < dxta1.length; ++i) {
                    network.push([i, dxta1[i]/2]);
                    memory.push([i, dxta2[i]/2]);
                }
                obj = [{ data: network, label: "网络" }, { data: memory, label: "CPU" }];
            }
        });
        if(obj.length<=0) obj = [{ data: getServerData1(), label: "网络" }, { data: getServerData2(), label: "CPU" }];
        return obj;
    }

    var updatecount=1;
    function update() {
        plot.setData(getServerData());
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot.draw();
        if(updatecount++ > 100) return;
        setTimeout(update, 5000);
    }
    update();
}

jQuery(document).ready(function() {

    // 白色底部的曲线
    var responsiveSparklineTiles = function() {
        $("div[name='sparkline']").sparkline([80,80,60,80,80,60,70,56,75,58,62,40,56,71,73,69,54,38,77,58,66,52,32,59,68,36,49,20,17,24,20,29,26,20,24], {
            type: 'line',
            width: '100%',
            height: 32,
            lineWidth: 1,
            fillColor: '#fafafa',
            lineColor: '#e1e1e1',
            chartRangeMin: 0,
            disableInteraction: true,
            spotRadius: 0
        });
    }();

    //    Sparklinesstatistic();//更新负载信息
});
