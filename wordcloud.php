<?php
// index

require("header.php");


?>

    <style>
      #word-canvas {
        height: 100%;
		    min-height:400px;
        margin: 0px;
        padding: 0px
      }
   
    </style>
    <script src="js/d3.js"></script>
    <script src="js/d3.layout.cloud.js"></script>
    <!-- Main bar -->
    <div id="word-canvas">
   
        <div class="clearfix"></div>

    </div>
<!-- Content ends -->


    <script>
      var fill = d3.scale.category20();
      var wordcloudData = <?php echo wordclouddata() ?>;
      console.log(wordcloudData);

      d3.layout.cloud().size([300, 400])
          .words(wordcloudData.map(function(d) {
            return {text: d, size: 10 + Math.random() * 90};
          }))
          .padding(5)
          .rotate(function() { return ~~(Math.random() * 2) * 90; })
          .font("Impact")
          .fontSize(function(d) { return d.size; })
          .on("end", draw)
          .start();

      function draw(words) {
        d3.select("#word-canvas").append("svg")
            .attr("width", 300)
            .attr("height", 400)
          .append("g")
            .attr("transform", "translate(150,150)")
          .selectAll("text")
            .data(words)
          .enter().append("text")
            .style("font-size", function(d) { return d.size + "px"; })
            .style("font-family", "Impact")
            .style("fill", function(d, i) { return fill(i); })
            .attr("text-anchor", "middle")
            .attr("transform", function(d) {
              return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
            })
            .text(function(d) { return d.text; });
      }
    </script>


<?php
require("footer.php");


?>