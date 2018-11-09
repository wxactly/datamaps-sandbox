<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Map</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
    <script src="/node_modules/datamaps/dist/datamaps.all.js"></script>
</head>
<body>
    <div id="container" style="position: relative; width: 1000px; height: 600px;"></div>
    <script>
      var width = 1000;
      var height = 600;

      var states = {
        AL: {fillKey: 'levelOne'},
        AK: {fillKey: 'levelOne'},
        AZ: {fillKey: 'levelOne'},
        AR: {fillKey: 'levelOne'},
        CA: {fillKey: 'levelOne'},
        CO: {fillKey: 'levelOne'},
        CT: {fillKey: 'levelOne'},
        DE: {fillKey: 'levelOne'},
        FL: {fillKey: 'levelOne'},
        GA: {fillKey: 'levelOne'},
        HI: {fillKey: 'levelTwo'},
        ID: {fillKey: 'levelTwo'},
        IL: {fillKey: 'levelTwo'},
        IN: {fillKey: 'levelTwo'},
        IA: {fillKey: 'levelTwo'},
        KS: {fillKey: 'levelTwo'},
        KY: {fillKey: 'levelTwo'},
        LA: {fillKey: 'levelTwo'},
        ME: {fillKey: 'levelTwo'},
        MD: {fillKey: 'levelTwo'},
        MA: {fillKey: 'levelThree'},
        MI: {fillKey: 'levelThree'},
        MN: {fillKey: 'levelThree'},
        MS: {fillKey: 'levelThree'},
        MO: {fillKey: 'levelThree'},
        MT: {fillKey: 'levelThree'},
        NE: {fillKey: 'levelThree'},
        NV: {fillKey: 'levelThree'},
        NH: {fillKey: 'levelThree'},
        NJ: {fillKey: 'levelThree'},
        NM: {fillKey: 'levelFour'},
        NY: {fillKey: 'levelFour'},
        NC: {fillKey: 'levelFour'},
        ND: {fillKey: 'levelFour'},
        OH: {fillKey: 'levelFour'},
        OK: {fillKey: 'levelFour'},
        OR: {fillKey: 'levelFour'},
        PA: {fillKey: 'levelFour'},
        RI: {fillKey: 'levelFour'},
        SC: {fillKey: 'levelFour'},
        SD: {fillKey: 'levelFive'},
        TN: {fillKey: 'levelFive'},
        TX: {fillKey: 'levelFive'},
        UT: {fillKey: 'levelFive'},
        VT: {fillKey: 'levelFive'},
        VA: {fillKey: 'levelFive'},
        WA: {fillKey: 'levelFive'},
        WV: {fillKey: 'levelFive'},
        WI: {fillKey: 'levelFive'},
        WY: {fillKey: 'levelFive'}
      };

      var places = [{
        name: "Montgomery",
        location: {latitude: 32.361538, longitude: -86.279118}
      }, {
        name: "Juneau",
        location: {latitude: 58.301935, longitude: -134.419740}
      }, {
        name: "Pheonix",
        location: {latitude: 33.448457, longitude: -112.073844}
      }];

      var map = new Datamap({
        element: document.getElementById('container'),
        scope: 'usa',
        fills: {
          levelFive: 'rgb(252,15,27)',
          levelFour: 'rgb(167,24,29)',
          levelThree: 'rgb(143,32,34)',
          levelTwo: 'rgb(117,38,39)',
          levelOne: 'rgb(86,46,47)',
          defaultFill: 'rgb(0,0,0)'
        },
        data: states,
        done: function(datamap) {
          // Testing zoom in.
          datamap.svg.selectAll('.datamaps-subunit')
            .on('click', function(geography) {
              var bounds = datamap.path.bounds(geography),
                dx = bounds[1][0] - bounds[0][0],
                dy = bounds[1][1] - bounds[0][1],
                x = (bounds[0][0] + bounds[1][0]) / 2,
                y = (bounds[0][1] + bounds[1][1]) / 2,
                scale = .9 / Math.max(dx / width, dy / height),
                translate = [width / 2 - scale * x, height / 2 - scale * y];

              datamap.svg.transition()
                .duration(750)
                .style("stroke-width", 1.5 / scale + "px")
                .attr("transform", "translate(" + translate + ")scale(" + scale + ")");
            });

          // Testing pins.
          datamap.svg.selectAll(".pin")
            .data(places)
            .enter().append("circle", ".pin")
            .attr("r", 5)
            .attr("transform", function(d) {
              return "translate(" + datamap.projection([
                d.location.longitude,
                d.location.latitude
              ]) + ")";
            });
        }
      });

      // Testing labels.
      map.labels();

    </script>
</body>
</html>