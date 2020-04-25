  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- WYSIWYG -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/tinymce.js"></script>
    <script src="js/dropzone.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',   <?php echo $session->count;?>],
          ['Users',   <?php echo User::count_all(); ?>],
          ['Photos',  <?php echo Photo::count_all(); ?>],
          ['Comment', <?php echo Comment::count_all(); ?>]
        ]);

        var options = {
          legend: 'none',
          pieSliceText: 'label',
          slices: {
            0: { color: '#337ab7' },
            1: { color: '#f0ad4e' },
            2: { color: '#5cb85c' },
            3: { color: '#d9534f' },
          },
          backgroundColor: 'transparent',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</body>

</html>
