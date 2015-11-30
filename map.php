<!DOCTYPE HTML>
<!doctype html>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/map.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript">

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 42.442232, lng: -76.489213},
          zoom: 15
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

    <script>
    $(function() {
      $( "#slider" ).slider();
    });
    </script>

  </head>

  <body>
    <div id="container">
    
      <?php require_once "partials/DB.php"; ?>

    <div id="map"></div>
    <div id="slider"></div>

      <!-- MAIN CONTENT GOES HERE -->

      <?php include "partials/navigation.php"; ?>

    </div>
  </body> 
</html> 

