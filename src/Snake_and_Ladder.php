<?php

/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class for Snake and Ladder Computation Problem
 */
class Snake_and_Ladder
{
    function welcomeMessage()
    {
        echo "Welcome to Snake and Ladder Computation Problem\n";
    }
}

$snakeAndLadder = new Snake_and_Ladder();
$snakeAndLadder->welcomeMessage();
$startPosition = 0;
echo "Start Position:: " . $startPosition;
