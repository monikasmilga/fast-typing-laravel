/**
 * Created by Monika on 8/3/2017.
 */
var FastTyping = function () {


    const STATE_REGISTER = 'registration state',
        STATE_LEVEL = 'level selection state',
        STATE_GAME = 'game state',
        STATE_END = 'game over state';

    var name,
        lastState,
        level,
        gameStart,
        gameEnd,
        gameDuration,
        score,
        keyUpCount,
        totalSpeed;

    this.setSaveURL = function (value) {
        saveURL = value;
    };


    // -------------------------------Register name logic--------------------------------------------


    var RegisterLogic = function () {

        var view = $('#register');
        var registerButton = $('#register-button');
        var registerInput = $('#register-input');

        this.show = function () {
            view.removeClass('invisible');
            enableReg();
        };

        this.hide = function () {
            view.addClass("invisible");
            disableReg();
        };

        function enableReg() {



            keyUpCount = 0;
            totalSpeed = 0;

            registerInput.keyup(function () {
                if (registerInput.val().length >= 3) {
                    registerButton.attr('disabled', false)
                } else {
                    registerButton.attr('disabled', true)
                }
            });

            registerButton.click(function () {
                name = registerInput.val();
                changeState(STATE_LEVEL);
            });
        }

        function disableReg() {

            registerInput.val('');
            registerInput.unbind();
            registerButton.unbind();
        }
    };

    var register = new RegisterLogic();


    // -------------------------------Select level logic--------------------------------------------

    var LevelLogic = function () {

        var view = $('#selectLevel'),
            levelButton = $('#selectLevel-button'),
            welcomeUser = $('#welcome-user');

        this.show = function () {
            view.removeClass('invisible')
            welcomeUser.html('<h3>Player ' + name + '</h3>');
            enableLevel();
        };

        this.hide = function () {
            view.addClass('invisible');
            disableLevel();
        };

        function enableLevel() {

            levelButton.click(function () {

                level = $('input[name = gamePlay]:checked').val();
                gameStart = Date.now();
                changeState(STATE_GAME);
            })


        }

        function disableLevel() {
            levelButton.unbind();
            // level = $('input[name = gamePlay]').val('');
        }
    };

    //TODO: reset radio box value

    var levelSelect = new LevelLogic();

    // -------------------------------Game logic--------------------------------------------

    var GameLogic = function () {

        var view = $('#game');
        var letters = 'abcdefghijklmnopqrstuvwxyz',
            timeOut,
            letterKey,
            letterShow = $('h2'),
            lifeCount,
            userInput,
            userLevel = $('#user-level'),
            letterAppearance,
            timeAmount,
            isGolden;


        this.show = function () {
            lifeCount = 3;
            $('#life').html(lifeCount);
            userInput = true;
            score = 0;
            view.removeClass('invisible');
            userLevel.html('<h6>Player ' + name + ' , you have ' + level + ' s to type the letter</h6>');
            changeLetter();
            enable();
        };

        this.hide = function () {
            view.addClass('invisible');
            disable();
        };

        function updateScore() {

            if (isGolden) {
                isGolden = false;
                for (i = 0; i < 5; i++) {
                    updateScore();
                }
            } else {
                score += 1;
            }

            if (score % 20 === 0) {

                lifeCount += 1;
                $('#life').html(lifeCount);
            }

            $('#score').html(score);
        }


        function removeLife() {

            lifeCount -= 1;
            $('#life').html(lifeCount);

            if (lifeCount === 0) {
                gameEnd = Date.now();
                countGameTime();
                changeState(STATE_END);
            }
        }

        function enable() {

            $(window).keyup(
                function (e) {

                    if (e.key === letters[letterKey]) {
                        updateScore();
                        countSpeed();
                    } else {
                        removeLife()
                    }

                    userInput = true;
                    changeLetter();

                }
            )
        }

        function countGameTime() {
            gameDuration = (gameEnd - gameStart) * 0.001;
            $('#game-duration').html(parseFloat(gameDuration).toFixed(2));
        }

        function countSpeed() {
            timeAmount = Date.now() - letterAppearance;
            totalSpeed += timeAmount;
            keyUpCount++;
            console.log(keyUpCount);

            $('#time-amount').html(parseFloat(timeAmount * 0.001).toFixed(2));
        }

        function disable() {
            $(window).unbind();
            clearTimeout(timeOut);
        }

        function changeLetter() {


            if (!userInput) {
                removeLife();
            }
            clearTimeout(timeOut);


            if (lifeCount <= 0) {
                return;

            }
            if (Math.random() < 0.1) {
                isGolden = true;
                letterShow.addClass('golden');

            } else {
                isGolden = false;
                letterShow.removeClass('golden');
            }
            userInput = false;
            letterKey = Math.round(Math.random() * (letters.length - 1));
            letterShow.html(letters[letterKey]);
            letterAppearance = Date.now();

            timeOut = setTimeout(changeLetter, level * 1000);
        }

    };

    var game = new GameLogic();
    // -------------------------------Game over --------------------------------------------
    var GameOverLogic = function () {
        var view = $('#gameOver');
        var registerButton = $('#playAgain');

        this.show = function () {
            view.removeClass('invisible');
            $('#lastScore').html(score);
            $('#average-duration').html(((totalSpeed / keyUpCount) * 0.001).toFixed(2));

            saveData();
        };

        function saveData() {
            $.ajax({
                url: saveURL,
                method: "POST",
                data: {
                    name: name,
                    level: level,
                    score: score,
                    duration: gameDuration,
                    speed: ((totalSpeed / keyUpCount) * 0.001).toFixed(2)
                }
            })
        }


        this.hide = function () {
            view.addClass("invisible");
            disable();

        };

        registerButton.click(function () {
            changeState(STATE_REGISTER);
        });

        function disable() {


        }
    };


    var gameOver = new GameOverLogic();
    // -------------------------------Change state --------------------------------------------


    function changeState(value) {
        if (lastState) {
            lastState.hide()
        }

        switch (value) {

            case STATE_REGISTER:
                lastState = register;
                break;

            case STATE_LEVEL:
                lastState = levelSelect;
                break;

            case STATE_GAME:
                lastState = game;
                break;

            case STATE_END:
                lastState = gameOver;
                break;

            default:
                break;
        }

        lastState.show();
    }

    changeState(STATE_REGISTER);

};
