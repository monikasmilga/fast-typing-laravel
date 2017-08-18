<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>High scores</title>
</head>
<body>


<div class="container">
    <div style="text-align: center ">
        <h1>HIGH SCORES</h1>
    </div>

    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
               aria-expanded="false" aria-controls="collapseOne">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        LEVEL DIFFICULT SCORE
                    </h5>
                </div>
            </a>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                    <table class="table-bordered">
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>DURATION</th>
                            <th>AVERAGE REACTION SPEED</th>
                        </tr>
                        @foreach($level3list as $record)

                            <tr>
                                <td>{{$record['name']}}</td>
                                <td>{{$record['score']}}</td>
                                <td>{{$record['duration']}}</td>
                                <td>{{$record['speed']}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
               aria-expanded="false" aria-controls="collapseTwo">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        LEVEL AVERAGE SCORE
                    </h5>
                </div>
            </a>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">

                    <table class="table-bordered">
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>DURATION</th>
                            <th>AVERAGE REACTION SPEED</th>
                        </tr>
                        @foreach($level6list as $record)

                            <tr>
                                <td>{{$record['name']}}</td>
                                <td>{{$record['score']}}</td>
                                <td>{{$record['duration']}}</td>
                                <td>{{$record['speed']}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="card">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
               aria-expanded="false" aria-controls="collapseThree">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        LEVEL EASY SCORE
                    </h5>
                </div>
            </a>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">

                    <table class="table-bordered">
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>DURATION</th>
                            <th>AVERAGE REACTION SPEED</th>
                        </tr>
                        @foreach($level9list as $record)

                            <tr>
                                <td>{{$record['name']}}</td>
                                <td>{{$record['score']}}</td>
                                <td>{{$record['duration']}}</td>
                                <td>{{$record['speed']}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center"><a href="{{route('app.score.create')}}"><button class="btn btn-secondary btn-lg active wide-button">Play again</button></a></div>

</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="js/highscores.js"></script>
</html>