@extends('layouts.main')

@section('content')

<form>
    <div class="row">
        <div class="col-sm-8">
            <select class="js-example-basic-single form-control" name="question">
                <option value="">ALL</option>
                @foreach($questions as $qn)
                <option value="{{$qn->id}}">{{$qn->title}}</option>

                @endforeach
                 
              </select>

        </div>

    </div>
    <br />
    <div class="row">
        <div class="col-sm-12">
           <b>{{$question}}</b> 
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="submit" class="btn btn-primary" />

        </div>
        

    </div>
</form>
<div class="card-body">

    

    <div id="chart_div"></div>

</div>

<script type="text/javascript">

var data_ = <?php echo $chart1; ?>

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows(data_);

      // Set chart options
      var options = {'title':'Analysis of Response',
                     'width':'100%',
                     'height':500};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
@endsection




