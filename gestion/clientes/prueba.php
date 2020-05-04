<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAtOjLpIVcO8im8KJFR8pcMhQjskl1-YgiA_BGX2yRrf7htVrbmBTWZt39_v1rJ4xxwZZCEomegYBo1w" 
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var map;
    var geocoder;


    function load() {
      map = new GMap2(document.getElementById("map"));
      map.setCenter(new GLatLng(34, 0), 10);
      geocoder = new GClientGeocoder();
    }

    function addAddressToMap(response) {
      map.clearOverlays();
      if (!response || response.Status.code != 200) {
        alert("Sorry, we were unable to geocode that address");
      } else {
        place = response.Placemark[0];
        point = new GLatLng(place.Point.coordinates[1],
                            place.Point.coordinates[0]);
        marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(place.address + '<br>' +
          '<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
      }
    }

    // showLocation() is called when you click on the Search button
    // in the form.  It geocodes the address entered into the form
    // and adds a marker to the map at that location.
    function showLocation() {
      var address = document.forms[0].q.value;
      geocoder.getLocations(address, addAddressToMap);
    }

   // findLocation() is used to enter the sample addresses into the form.
    function findLocation(address) {
      document.forms[0].q.value = address;
      showLocation();
    }
    //]]>
    </script>
  </head>

  <body onload="load()">

    <!-- Creates a simple input box where you can enter an address
         and a Search button that submits the form. //-->
    <form action="#" onsubmit="showLocation(); return false;">
      <p>
        <b>Search for an address:</b>
        <input type="text" name="q" value="" class="address_input" size="40" />
        <input type="submit" name="find" value="Search" />
      </p>
    </form>
    <div id="map" style="width: 500px; height: 300px"></div>



   <a href="javascript:void(0)"
     onclick="findLocation('Plaza de la Virgen de los Reyes, 41920, Sevilla, Espa&#x00F1;a');return false;">Plaza
     de la Virgen de los Reyes, 41920, Sevilla, <b>Espa&#x00F1;a</b></a>
  </p>
  </body>
</html>  