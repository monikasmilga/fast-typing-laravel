<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

    <title>Fast typing game</title>
</head>
<body>

<div id="outer">
    <h1>Fast typing game <br>
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        <i class="fa fa-child" aria-hidden="true"></i>
        <i class="fa fa-keyboard-o" aria-hidden="true"> </i>
        <i class="fa fa-laptop" aria-hidden="true"></i>
    </h1>
    <div id="register" class="invisible"><div class="greeting">

            <h3>Welcome to fast typing game!</h3>
        <h4>Are you ready to play?</h4></div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Enter name</span>
            <input id='register-input' type="text" class="form-control" placeholder="Username"
                   aria-describedby="basic-addon1">
            <button id='register-button' class="btn btn-secondary" type="button" disabled value="true">Lets play!
            </button>

        </div>
        <div>
            Random letters will appear on the screen. Your goal is to type correctly as many letters as you can. One correct letter gives you 1 point. Golden letters give 5 points. Each 20 points you get 1 extra life. If you misstype, you loose 1 life. Good luck!
        </div>
    </div>

    <div id="selectLevel" class="invisible">
        <div id="welcome-user"></div>
        <form>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gamePlay" id="levelEasy"
                           value='9'>
                    Easy
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gamePlay" id="levelAverage"
                           value="6">
                    Average
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gamePlay" id="levelDifficult"
                           value="3">
                    Difficult
                </label>
            </div>
            <div>
                <button id='selectLevel-button' type="button" class="btn btn-secondary btn-lg active wide-button">Lets play!
                </button>

            </div>
        </form>
    </div>

    <div id="game" class="invisible">
        <div id="user-level"></div>
        <h2></h2>
        <div>Score: <span id="score">0</span></div>
        <div>Lives left: <span id="life">3</span></div>
        <div>Typing speed: <span id="time-amount">0</span> seconds</div>
    </div>

    <div id="gameOver" class="invisible">
        <h3> Game over</h3>
        <div>Your score is: <span id="lastScore"></span></div>
        <div>Game duration: <span id="game-duration"></span> seconds</div>
        <div>Average click speed: <span id="average-duration"></span> seconds</div>
        <button id="playAgain" class="btn btn-secondary btn-lg active wide-button">Play again</button>
        <a href="{{route('app.score.index')}}">
            <button class="btn btn-secondary btn-lg active wide-button"> Show scores</button>
        </a>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var game = new FastTyping()
    game.setSaveURL("{{route('app.score.store')}}")
</script>
</html>