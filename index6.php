<?php

//6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты.

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