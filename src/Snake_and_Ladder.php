<?php

/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class for Snake and Ladder Computation Problem
 */
class Snake_and_Ladder
{
    public $START_POSITION = 0;
    public $NO_PLAY = 0;
    public $LADDER = 1;
    public $SNAKE = 2;

    public $position = 0;

    function welcomeMessage()
    {
        echo "Welcome to Snake and Ladder Computation Problem\n";
    }

    /**
     * Function to get the option for next step
     * Non-parameterized function 
     * Using Switch case to check option and print position
     */
    function option()
    {
        while ($this->position < 100) {
            $diceRoll = $this->rollDice();
            $optionCheck = rand(0, 2);
            echo "Option:: " . $optionCheck . "\n";
            switch ($optionCheck) {
                case $this->LADDER:
                    if ($this->position + $diceRoll > 100) {
                        $this->position = $this->position;
                    } else {
                        $this->position += $diceRoll;
                    }
                    break;
                case $this->SNAKE:
                    $this->position -= $diceRoll;
                    if ($this->position <= 0) {
                        $this->position = 0;
                    }
                    break;
                default:
                    $this->position = $this->position;
                    break;
            }
            echo "Position:: " . $this->position . "\n";
        }
    }

    /**
     * Function to get the user to roll the dice
     * Printing the Number on the dice
     * Returns the dice roll
     */
    function rollDice()
    {
        $diceRoll = rand(1, 6);
        echo "Number on Dice:: " . $diceRoll . "\n";
        return $diceRoll;
    }
}

$snakeAndLadder = new Snake_And_Ladder();
$snakeAndLadder->option();