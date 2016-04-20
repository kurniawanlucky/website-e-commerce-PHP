<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    //google.setOnLoadCallback(drawChart);

    function drawChart(object) {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(object);
      var options = {
           title: 'Test API',
          is3D: 'true',
          width: 200,
          height: 100
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    function show()
    {

        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","getdata.php?name=jaspreet",true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = getResponse;
    }
    function getResponse()
    {
        if(xmlhttp.readyState==4){
            alert(xmlhttp.responseText);
            var obj = JSON.parse(xmlhttp.responseText);
            drawChart(obj);
        }
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
    <select id="name" onchange="show();">
        <option value="test">test</option>
        <option value="test1">test1</option>
        <option value="test2">test2</option>
    </select>
  </body>
</html>