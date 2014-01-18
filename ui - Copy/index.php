<?php
// index

require("header.php");
?>


<script>

function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{alert("Geolocation is not supported by this browser.");}
  }
function showPosition(position)
  {
  
  window.location.href = "geodes.php?lat="+position.coords.latitude+"&lng="+position.coords.longitude;
  
  }
  
  getLocation()
</script>





<?php
require("footer.php");


?>