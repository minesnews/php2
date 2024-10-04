# Основы PHP

## Домашнее задание № 2.

1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.

### Решение:

```
<?php

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

```

2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

### Решение:

```
<?php

function  mathOperation($arg1, $arg2, $operation)
{
    switch ($operation)
    {
        case "+":
            return $arg1 + $arg2;
            break;
        case "-":
            return $arg1 - $arg2;
            break;
        case "*":
            return $arg1 * $arg2;
            break;
        case "/":
            return $arg1 / $arg2;
            break;
        default:
            return "Нет такого оператора";
    }
        
    
}

$a = 4;
$b = 5;
$operation = "+";

echo mathOperation($a, $b, $operation);

```

3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

### Решение:

```
<?php

$numbers = ["Московская область" => ["Москва", "Зеленоград", "Клин"], "Ленинградская область"=> ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"], "Новосибирская область"=> ["Новосибирск", "Бердск", "Искитим"]];

foreach($numbers as $key => $value)
{

	$num = count($value);
	echo "$key: ";
	for($i = 0; $i < $num; $i++)
	{
		if($i < $num-1){
			echo "$value[$i], ";
		}
		
		else{
			echo "$value[$i]; ";
		}
		
	}
}

```

4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.

### Решение:

```
<?php

$string = "Кошка!";
echo "Изначальная строка: " . $string . "\n";

$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function translate($string, $alfabet) {
    $result = "";
    $length = mb_strlen($string);
    
    for ($i = 0; $i < $length; $i ++)
    {
    	$letter = mb_substr($string, $i, 1);
    	
    	if (isset($alfabet[mb_strtolower($letter)])) {
    		if ($letter === mb_strtolower($letter)){
    			$newLetter = $alfabet[$letter];
    		}
    		else{
    			$newLetter = ucfirst($alfabet[mb_strtolower($letter)]);
    		}
    		
    	}
    	
    	else{
    		$newLetter = $letter;
    	}
    	$result .= $newLetter;
    }
    return $result;
}


echo "Итоговая строка: " . translate($string, $alfabet);

```

5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

### Решение:

```
<?php

function power($val, $pow)
	{
		if ($pow == 1){
			return $val;
		}
		if ($pow != 1){
			return $val * power($val, $pow-1);
		}
			
	}
	echo power(4, 4);

```

6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты.

### Решение:
```
<?php

function getHours($h) {
    $hours = '';

    if($h>24)$h %= 24;

    if ($h === 1 || $h === 21) {
      $hours .= $h . " час";
    }
    elseif (($h >= 2 && $h <= 4) || ($h >= 22 && $h <= 24)) {
      $hours .= $h . " часа";
    }
    else {
      $hours .= $h . " часов";
    }

    return $hours;
  }

  function getMinutes($i) {
    $minutes = '';

    if (($i % 10 === 1) && ($i != 11)){
      $minutes .= $i . " минута";  
    }
    elseif (($i % 10 >= 2) && ($i % 10 <= 4)) {
      $minutes .= $i . " минуты";  
    }
    else {
      $minutes .= $i . " минут"; 
    }

    return $minutes;
  }

  function getSeconds($s) {
    $seconds = '';

    if (($s % 10 === 1) && ($s != 11)){
      $seconds .= $s . " секунда";  
    }
    elseif (($s % 10 >= 2) && ($s % 10 <= 4)) {
      $seconds .= $s . " секунды";  
    }
    else {
      $seconds .= $s . " секунд"; 
    }

    return $seconds;
  }

  function getCurrentTime($h, $i, $s) {
    return getHours($h) . getMinutes($i) . getSeconds($s);
  }

  echo "Новосибирское время: " . getCurrentTime(date("H") + 7, date(" i"), date(" s"));
  echo "; ";
  echo "Московское время: " . getCurrentTime(date("H") + 3, date(" i"), date(" s"));

```
