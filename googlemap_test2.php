<!DOCTYPE html>
<html>
    <head>
        <title>Simple map2</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            #map {
                height: 100%;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body>

    <form>
        <input type="button" value="座標取得" onclick="check()">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
    </form>

        <div id="map" style="height:500px; width: 50%; margin: 2rem auto 0;"></div>
            <!-- jqueryの読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofu9qs3_u1qwWEi76xgTdjp_0dje5iIA&callback=initMap"></script>
        <script type="text/javascript">
            var map = new google.maps.Map(
            document.getElementById("map"),{
            zoom : 7,
            center : new google.maps.LatLng(34.70251217521857, 135.49603700637817),
            mapTypeId : google.maps.MapTypeId.ROADMAP
            }
            );
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng(34.70251217521857, 135.49603700637817),
            map: map,
            draggable : true
            });
            // Check
            function check(){
            var pos = marker.getPosition();
            var lat = pos.lat();
            var lng = pos.lng();
            $("#lat").val(lat);
            $("#lng").val(lng);
            // alert("緯度："+lat+"、経度："+lng);
            }
        </script>
    </body>
</html>