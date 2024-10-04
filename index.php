<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.

function operation($num1, $num2, $operator)
{
        if($operator == "+")
            return $num1 + $num2;
        if($operator == "-")
            return $num1 - $num2;
        if($operator == "*")
            return $num1 * $num2;
        if($operator == "/")
            return $num1 / $num2;
        return "Нет такого оператора";       
    
}

$a = 4;
$b = 5;
$operator = "+";

echo operation($a, $b, $operator);


