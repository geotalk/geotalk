<?php
// footer

?>
<!-- Footer starts -->
<footer>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2014 | <a href="#">Geotalk</a> </p>
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="js/jquery.js"></script> <!-- jQuery -->

<script src="js/reply.js"></script> 

<script src="js/jquery.timeago.js"></script> <!-- jQuery -->


<script src="js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="js/jquery-ui-1.9.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.stack.js"></script>


<script src="js/jquery.knob.js"></script>

<!-- <script src="js/sparklines.js"></script> <!-- Sparklines --> 
<script src="js/jquery.cleditor.min.js"></script> <!-- CLEditor -->

<script src="js/jquery.uniform.min.js"></script> <!-- jQuery Uniform -->
<script src="js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<!-- <script src="js/filter.js"></script> <!-- Filter for support page -->
<script src="js/custom.js"></script> <!-- Custom codes -->
<!-- <script src="js/charts.js"></script> <!-- Charts & Graphs -->

<script type="text/javascript" src="./lib/jquery.ibutton.js"></script>
  <script type="text/javascript" src="./lib/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="./lib/jquery.metadata.js"></script>


  
<script>
jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
  jQuery(".dial").knob();
  
  
  jQuery(document).on("click", ".widget-head", function(){
	jQuery(this).parent().find(".widget-content").slideDown();
  });
});
</script>
</body>
</html>
