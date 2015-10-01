<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/template.css"/>
    <link rel="stylesheet" href="/assets/css/base.css"/>
    <link rel="stylesheet" href="/assets/css/washcar.css"/>
    <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=N9eiFDikvcAKMBa3cCUxcNwH"></script>
    <title>浏览器定位</title>
</head>
<body>
    <div id="allmap"></div>
    <div class="map-bottom">
        <button onclick="getLocation();" class="position-btn">确定位置</button>
    </div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.331398,39.897445);
    map.centerAndZoom(point,12);

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var mk = new BMap.Marker(r.point);
            map.addOverlay(mk);
            map.panTo(r.point);
            //alert('您的位置：'+r.point.lng+','+r.point.lat);
        }
        else {
            alert('failed'+this.getStatus());
        }
    },{enableHighAccuracy: true})
    //关于状态码
    //BMAP_STATUS_SUCCESS   检索成功。对应数值“0”。
    //BMAP_STATUS_CITY_LIST 城市列表。对应数值“1”。
    //BMAP_STATUS_UNKNOWN_LOCATION  位置结果未知。对应数值“2”。
    //BMAP_STATUS_UNKNOWN_ROUTE 导航结果未知。对应数值“3”。
    //BMAP_STATUS_INVALID_KEY   非法密钥。对应数值“4”。
    //BMAP_STATUS_INVALID_REQUEST   非法请求。对应数值“5”。
    //BMAP_STATUS_PERMISSION_DENIED 没有权限。对应数值“6”。(自 1.1 新增)
    //BMAP_STATUS_SERVICE_UNAVAILABLE   服务不可用。对应数值“7”。(自 1.1 新增)
    //BMAP_STATUS_TIMEOUT   超时。对应数值“8”。(自 1.1 新增)
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(setPosition);
        }else{
            alert("您的浏览器不支持地理定位");
        }
   }
    function setPosition(position){
        var lat=position.coords.latitude;
        var lon=position.coords.longitude;
        //var map = new BMap.Map("container");            // 创建Map实例
        var point = new BMap.Point(lon, lat);    // 创建点坐标
        //map.centerAndZoom(point,15);                     // 
        //map.enableScrollWheelZoom(); 
        var gc = new BMap.Geocoder();    
        gc.getLocation(point, function(rs){
           var addComp = rs.addressComponents;
           var address=addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street;
        });
        window.opener.document.getElementById('position').value=address;
    }
</script>
