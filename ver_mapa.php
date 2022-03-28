<?php
include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);


?>

<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<body>

    <h1>My First Google Map</h1>

    <div id="map" style="width:100%;height:750px;"></div>



</body>









<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
    //let inputvalor = document.getElementById("id_estado").value;



    function myMap() {
        $(document).on('ready', function() {
            var objXMLHttpRequestt = new XMLHttpRequest();
            objXMLHttpRequestt.onreadystatechange = function() {
                if (objXMLHttpRequestt.readyState === 4) {
                    if (objXMLHttpRequestt.status === 200) {
                        // valor=objXMLHttpRequest.responseText;
                        var myArr = JSON.parse(this.responseText);
                        // myMap(myArr);

                        const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";


                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,

                            center: new google.maps.LatLng(14.5765723, -90.5352367),
                            mapTypeId: google.maps.MapTypeId.ROADMAP,


                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i, ii, marker2;

                        for (i = 0; i < myArr.length; i++) {
                            console.log(myArr[i].latitud);
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(myArr[i].latitud, myArr[i].longitud),
                                map: map,
                                icon: image
                            });

                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infowindow.setContent("Numerode cita:" + myArr[i].id_citas);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }

                        for (ii = 0; ii < myArr.length; ii++) {
                            console.log(myArr[ii].latitud);
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(myArr[ii].latitudA, myArr[ii].longitudA),
                                map: map
                            });

                            google.maps.event.addListener(marker, 'click', (function(marker2, ii) {
                                return function() {
                                    infowindow.setContent("Numerode cita cierre:" + myArr[ii].id_citas + "--" + myArr[ii].tipo_actividad);
                                    infowindow.open(map, marker2);
                                }
                            })(marker2, ii));
                        }

                    } else {
                        alert('Error Code: ' + objXMLHttpRequestt.status);
                        alert('Error Message: ' + objXMLHttpRequestt.statusText);
                    }
                }
            }
            objXMLHttpRequestt.open('GET', 'http://143.198.163.181/appgeousuario.php?codigo_vendedor=90');
            objXMLHttpRequestt.send();
        });


    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWGl3vtGb4jtKXQLRddO8FTCat7DisLkk&callback=myMap"></script>

</html>