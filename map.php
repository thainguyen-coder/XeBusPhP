<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bản đồ</title>
	<link rel="stylesheet" href="">
</head>
 <script src="http://maps.google.com/maps/api/js?key=AIzaSyAP3nd8wLqGxnNepGFCoOHA9k38r6cyQa8&callback=initMap"></script>	
					         <script type="text/javascript">
					const appendChild = Element.prototype.appendChild;
				const urlCatchers = [
				  "/AuthenticationService.Authenticate?",
				  "/QuotaService.RecordEvent?"
				];
				Element.prototype.appendChild = function (element) {
				  const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
				  const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

				  if (!isGMapAccessScript) {
				    return appendChild.call(this, element);
				  }
				  return element;
				};
		            var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/pink.png",
		                       new google.maps.Size(30, 30), new google.maps.Point(0, 0),
		                       new google.maps.Point(16, 32));
		            var currentPopup;
		            var bounds = new google.maps.LatLngBounds();
		            function addMarker(lat, lng, info) {
		                var pt = new google.maps.LatLng(lat, lng);
		                bounds.extend(pt);
		                var marker = new google.maps.Marker({
		                    position: pt,
		                    icon: icon,
		                    map: map
		                });
		                var popup = new google.maps.InfoWindow({
		                    content: info,
		                    maxWidth: 400
		                });
		                google.maps.event.addListener(marker, "click", function() {	
		                    if (currentPopup != null) {
		                        currentPopup.close();
		                        currentPopup = null;
		                    }
		                    popup.open(map, marker);
		                    currentPopup = popup;
		                });
		                google.maps.event.addListener(popup, "closeclick", function() {
		                    map.panTo(center);
		                    currentPopup = null;
		                });
		            }     
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(13.7855822,109.0872737),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.ZOOM_PAN
                    }
                });
				<?php
				include 'config.php';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
				$coordinates = array();
				$query = mysqli_query($conn,"select * from route_setting where routeId = '$id' ")
				or die(mysqli_error());
				while($row = mysqli_fetch_array($query))
				{
				  $name = $row['name'];
				  $lat = $row['latitudeCenter'];
				  $lon = $row['longitudeCenter'];
				  $coordinates[] = 'new google.maps.LatLng(' . $row['latitudeCenter'] .','. $row['longitudeCenter'] .'),';
				  echo("addMarker($lat, $lon, '<b>$name</b><br />');\n");
				}					
				?>
				var RouteCoordinates =[<?php
			  		$i = 0;
					while ($i < count($coordinates)) {
						echo $coordinates[$i];
						$i++;
					}
			  	?>];
				var RoutePath = new google.maps.Polyline({
			    path: RouteCoordinates,
			    geodesic: true,
			    strokeColor: '#ffae00',
			    strokeOpacity: 1.0,
			    strokeWeight: 5
			  });
				RoutePath.setMap(map);
     }
     </script>	
<body  onload="initMap()" >
	<div id="map" style="width:1400px; height:500px;"></div>
</body>
</html>
