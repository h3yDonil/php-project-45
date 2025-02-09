<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function evenGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

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


