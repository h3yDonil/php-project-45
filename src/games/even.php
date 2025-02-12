<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function evenGame()
{
    greeting();

    $winCount = 0;
    while ($winCount < 3) {
        $number = rand(1, 100);
        line("Question: %s", $number);
        $answer = prompt('Your answer');
        if (isEven($number) && $answer === 'yes') {
            line('Correct!');
            $winCount++;
        } elseif (isEven($number) && $answer === 'no') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s!", $name);
            $winCount = 0;
        } elseif (!isEven($number) && $answer === 'yes') {
            line("'yes is wrong answer :(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            $winCount = 0;
        } elseif (!isEven($number) && $answer === 'no') {
            line('Correct!');
            $winCount++;
        }
    }
    line("Congratulations, %s!", $name);
}


