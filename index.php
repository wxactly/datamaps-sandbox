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
      var map = new Datamap({
        element: document.getElementById('container'),
        scope: 'usa',
        fills: {
          HIGH: '#afafaf',
          LOW: '#123456',
          MEDIUM: 'blue',
          UNKNOWN: 'rgb(0,0,0)',
          defaultFill: 'green'
        },
        data: {
          NY: {
            fillKey: 'LOW',
            numberOfThings: 2002
          },
          TX: {
            fillKey: 'MEDIUM',
            numberOfThings: 10381
          }
        }
      });
    </script>
</body>
</html>