<?php

class FizzBuzz
{
    public function fizzbuzz()
    {
        for ($i = 1; $i < 101; $i++)
        {
            if ($i % 3 == 0 && $i % 5 == 0) echo 'FizzBuzz';
            else if ($i % 3 == 0) echo 'Fizz';
            else if ($i % 5 == 0) echo 'Buzz';
            else echo $i;

            echo "<br />";
        }
    }
}

$test = new FizzBuzz();

$test->fizzbuzz();
