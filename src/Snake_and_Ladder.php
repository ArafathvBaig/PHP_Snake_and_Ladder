<?php

/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class for Snake and Ladder Computation Problem
 */
class Snake_and_Ladder
{
    //public $START_POSITION = 0;
    public $NO_PLAY = 0;
    public $LADDER = 1;
    public $SNAKE = 2;

    public $positionPlayer1 = 0;
    public $diceRollCountPlayer1 = 0;
    public $positionPlayer2 = 0;
    public $diceRollCountPlayer2 = 0;

    function welcomeMessage()
    {
        echo "Welcome to Snake and Ladder Computation Problem\n";
    }

    /**
     * Function to get the option for next step
     * Passing position as Parameter, Returns Position
     * Using Switch case to check option
     */
    function option($position)
    {
        $diceRoll = $this->rollDice();
        $optionCheck = rand(0, 2);
        echo "Option:: " . $optionCheck . "\n";
        switch ($optionCheck) {
            case $this->LADDER:
                if ($position + $diceRoll > 100) {
                    $position = $position;
                } else {
                    $position += $diceRoll;
                }
                echo "Position:: " . $position . "\n";
                $position = $this->option($position);
                break;
            case $this->SNAKE:
                $position -= $diceRoll;
                if ($position <= 0) {
                    $position = 0;
                }
                break;
            default:
                $position = $position;
                break;
        }
        return $position;
    }

    /**
     * Function to get the user to roll the dice
     * Non-Parameterized function
     * Returns diceRoll
     */
    function rollDice()
    {
        $diceRoll = rand(1, 6);
        echo "Number on Dice:: " . $diceRoll . "\n";
        return $diceRoll;
    }

    /**
     * Function to Play the game for player 1
     * Calling the option function and getting player 1 position
     * and printing the position of the player 1
     */
    function player1()
    {
        $this->diceRollCountPlayer1++;
        $this->positionPlayer1 = $this->option($this->positionPlayer1);
        echo "Position of Player 1:: " . $this->positionPlayer1 . "\n\n";
        if ($this->positionPlayer1 == 100) {
            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n";
            echo "$$$$$$$$$$ Player 1 is the Winner $$$$$$$$$$\n";
            echo "$$$$$ Total count of Dice Rolled:: " . $this->diceRollCountPlayer1 . " $$$$$\n";
            echo "$$$$$$$$ Position of Player 1:: " . $this->positionPlayer1 . " $$$$$$$$\n";
            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n";
        }
    }

    /**
     * Function to Play the game for player 2
     * Calling the option function and getting player 2 position
     * and printing the position of the player 2
     */
    function player2()
    {
        $this->diceRollCountPlayer2++;
        $this->positionPlayer2 = $this->option($this->positionPlayer2);
        echo "Position of Player 2:: " . $this->positionPlayer2 . "\n\n";
        if ($this->positionPlayer2 == 100) {
            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n";
            echo "$$$$$$$$$$ Player 2 is the Winner $$$$$$$$$$\n";
            echo "$$$$$ Total count of Dice Rolled:: " . $this->diceRollCountPlayer2 . " $$$$$\n";
            echo "$$$$$$$$ Position of Player 2:: " . $this->positionPlayer2 . " $$$$$$$$\n";
            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n";
        }
    }

    /**
     * Function to Play the Snake and Ladder Game
     * Calling player functions inside
     * Using While loop to play till one player wins
     * Non-Parameterized function
     * No return values
     */
    function playGame()
    {
        $toss = rand(1, 2);
        while ($this->positionPlayer1 < 100 && $this->positionPlayer2 < 100) {
            if ($toss == 1) {
                $this->player1();
                if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                    break;
                } else {
                    $this->player2();
                }
            } else {
                $this->player2();
                if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                    break;
                } else {
                    $this->player1();
                }
            }
        }
        echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n";
        echo "$$$$$$$$$$$$$ We Have A Winner $$$$$$$$$$$$$\n";
        echo "$$$$$$$$$$$$ The Game Has Ended $$$$$$$$$$$$\n";
        echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$\n\n";
    }
}

$snakeAndLadder = new Snake_And_Ladder();
$snakeAndLadder->playGame();
