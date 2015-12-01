<!DOCTYPE HTML>
<!doctype html>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/map.css">

    <script type="text/javascript">

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 42.442232, lng: -76.489213},
          zoom: 17
        });

        var marker = new google.maps.Marker({
          position: {lat: 42.442232, lng: -76.489213},
          map: map,
          title: 'Hello World!'
        });
      }
    </script>

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArpx7Ru9n10wbmsOClbGeBGkdn0SY-3MI&callback=initMap">
    </script>

  </head>

  <body>
    <div id="container">
    
      <?php require_once "partials/DB.php"; ?>

    <div id="map"></div>
    <div id="settings">
      <input id='slider' type="range" min="0" max="120" step="10" list="steplist">
      <datalist id="steplist">
          <option>0</option>
          <option>10</option>
          <option>20</option>
          <option>30</option>
          <option>40</option>
          <option>50</option>
          <option>60</option>
          <option>70</option>
          <option>80</option>
          <option>90</option>
          <option>100</option>
          <option>110</option>
          <option>120</option>
      </datalist>
    </div>

      <!-- MAIN CONTENT GOES HERE -->

      <?php include "partials/navigation.php"; ?>

    </div>
  </body> 
</html> 

