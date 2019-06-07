<?php

const BR = '<br>';

function output($output)
{
    echo $output . BR;
}

// 1
output('Задача 1.');

$a = 5;
$b = 15;

if ($a >= 0 && $b >= 0) {
    output($a - $b);
} elseif ($a < 0 && $b < 0) {
    output($a * $b);
} elseif ($a * $b < 0) {
    output($a + $b);
}

echo BR;

// 2
output('Задача 2.');

$a = mt_rand(0, 15);
switch ($a) {
    case 0:
        output($a);
        $a++;
    case 1:
        output($a);
        $a++;
    case 2:
        output($a);
        $a++;
    case 3:
        output($a);
        $a++;
    case 4:
        output($a);
        $a++;
    case 5:
        output($a);
        $a++;
    case 6:
        output($a);
        $a++;
    case 7:
        output($a);
        $a++;
    case 8:
        output($a);
        $a++;
    case 9:
        output($a);
        $a++;
    case 10:
        output($a);
        $a++;
    case 11:
        output($a);
        $a++;
    case 12:
        output($a);
        $a++;
    case 13:
        output($a);
        $a++;
    case 14:
        output($a);
        $a++;
    default:
        output($a);
}

echo BR;

// 3
output('Задача 3.');

function add($a, $b)
{
    return $a + $b;
}

function multi($a, $b)
{
    return $a * $b;
}

function diff($a, $b)
{
    return $a - $b;
}

function div($a, $b)
{
    if (!$b) {
        return 'Ошибка: деление на ноль!';
    }
    return (float)($a / $b);
}

$a = 5.5;
$b = -4;
output(add($a, $b));
output(multi($a, $b));
output(diff($a, $b));
output(div($a, $b));


echo BR;
// 4
output('Задача 4.');

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
        case 'add':
            return add($arg1, $arg2);
            break;
        case '*':
        case 'multi':
            return multi($arg1, $arg2);
            break;
        case '-':
        case 'diff':
            return diff($arg1, $arg2);
            break;
        case '/':
        case 'div':
            return div($arg1, $arg2);
            break;
        default:
            return 'Такой операции нет!';
    }
}

$a = 5;
$b = 2.8;
$oper = 'div';
output("$a $oper $b = " . mathOperation($a, $b, $oper));

echo BR;
// 5
output('Задача 5.');

output(date('Y'));

echo BR;
// 6
output('Задача 6.');

function power($val, $pow)
{
    if ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    return 1;
}

output(power(12, 3));

echo BR;
// 7
output('Задача 7.');

function wordWithEnd($num, $end1, $end2, $end5)
{
    $str = $num . ' ';
    $numEnd = $num % 10;
    if ($num > 10 && $num < 20) {
        $str .= $end5;
    } else {
        switch ($numEnd) {
            case 1:
                $str .= $end1;
                break;
            case 2:
            case 3:
            case 4:
                $str .= $end2;
                break;
            default:
                $str .= $end5;
        }
    }
    return $str;
}

function timeFormat($h, $m = 0, $s = 0)
{
    if ($h > 23 || $h < 0 || $m > 59 || $m < 0 || $s > 59 || $s < 0) {
        return 'Неверные данные!';
    }
    $str = wordWithEnd($h, 'час', 'часа', 'часов') . ' ';
    $str .= wordWithEnd($m, 'минута', 'минуты', 'минут') . ' ';
    $str .= wordWithEnd($s, 'секунда', 'секунды', 'секунд');
    return $str;
}

//output(timeFormat(4, 11, 49));
//output(date('H:i:s'));

output(timeFormat(date('H'), date('i'), date('s')));