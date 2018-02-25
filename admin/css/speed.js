

function Sparklinesstatistic() {
    var dxta1 = [],
    dxta2 = [],
    totalPoints = 100;
    function getServerData1() {
        if (dxta1.length > 0) dxta1 = dxta1.slice(1);
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
        var res = [];
        for (var i = 0; i < dxta1.length; ++i) {
            res.push([i, dxta1[i] / 2])
        }
        return res;
    }
    function getServerData2() {
        if (dxta2.length > 0) dxta2 = dxta2.slice(1);
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
        var res = [];
        for (var i = 0; i < dxta2.length; ++i) {
            res.push([i, dxta2[i] / 3])
        }
        return res;
    }
    var plot = $.plot("#realtime-updates", [{
        data: getServerData1(),
        label: "网络"
    },
    {
        data: getServerData2(),
        label: "CPU"
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 0.75,
                fill: 0.15,
                fillColor: {
                    colors: [{
                        opacity: 0.01
                    },
                    {
                        opacity: 0.3
                    }]
                }
            },
            shadowSize: 0
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
            font: {
                color: 'rgba(0, 0, 0, 0.4)'
            }
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
    function getServerData() {
        var obj = [],
        network = [],
        memory = [];
        obj = [];
        if (obj.length <= 0) obj = [{
            data: getServerData1(),
            label: "网络"
        },
        {
            data: getServerData2(),
            label: "CPU"
        }];
        return obj;
    }
    var updatecount = 1;
    function update() {
        plot.setData(getServerData());
        plot.draw();
        if (updatecount++>100) return;
        setTimeout(update, 2000);
    }
    update();
}
$(function(){ 
    var responsiveSparklineTiles = function() {
        $("div[name='sparkline']").sparkline([80, 80, 60, 80, 80, 60, 70, 56, 75, 58, 62, 40, 56, 71, 73, 69, 54, 38, 77, 58, 66, 52, 32, 59, 68, 36, 49, 20, 17, 24, 20, 29, 26, 20, 24], {
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
    } ();
    Sparklinesstatistic();
});