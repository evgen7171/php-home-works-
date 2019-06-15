<?php

const BR = '<br>';

function outputText($text)
{
    echo $text . BR;
}

function outputArray($arr)
{
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}

// 1
outputText('Задание №1');

const START_NUMBER = 0;
const END_NUMBER = 100;
$i = START_NUMBER;
while ($i <= END_NUMBER) {
    $i % 3 ?: outputText($i);
    $i++;
}

// 2
outputText('Задание №2');

const START_NUM = 0;
const END_NUM = 10;
$i = START_NUM;
while ($i <= END_NUM) {
    if (!$i) {
        outputText("$i - ноль.");
//        outputText($i);
    } else {
        outputText($i . ' - ' . ($i % 2 ? 'нечетное число.' : 'четное число.'));
//        outputText($i);
    }
    $i++;
}

// 3
outputText('Задание №3');

$cities['Московская область'][] = 'Москва';
$cities['Московская область'][] = 'Зеленоград';
$cities['Московская область'][] = 'Клин';

$cities['Ленинградская область'][] = 'Санкт-Петербург';
$cities['Ленинградская область'][] = 'Всеволжск';
$cities['Ленинградская область'][] = 'Павловск';
$cities['Ленинградская область'][] = 'Кронштадт';

$cities['Рязанская область'][] = 'Рязань';
$cities['Рязанская область'][] = 'Михайлов';
$cities['Рязанская область'][] = 'Ряжск';

$cities['Новосибирская область'][] = 'Новосибирск';
$cities['Новосибирская область'][] = 'Куйбышев';
$cities['Новосибирская область'][] = 'Барабинск';

$cities['Пермский край'][] = 'Пермь';
$cities['Пермский край'][] = 'Нытва';
$cities['Пермский край'][] = 'Кудымкар';
$cities['Пермский край'][] = 'Чернушка';

$cities['Красноярский край'][] = 'Красноярск';
$cities['Красноярский край'][] = 'Ачинск';
$cities['Красноярский край'][] = 'Канск';
$cities['Красноярский край'][] = 'Железногорск';

$cities['Хакасия республика'][] = 'Абакан';
$cities['Хакасия республика'][] = 'Саяногорск';
$cities['Хакасия республика'][] = 'Сорск';

outputArray($cities);

// 3*
outputText('Задание №3 v.2');

// $inclusion - опеределяет какие города соотносятся к областям,
// опеределенными упорядоченным образом
$inclusions = [3, 4, 3, 3, 4, 4, 3];

$districts[] = 'Московская область';
$districts[] = 'Ленинградская область';
$districts[] = 'Рязанская область';
$districts[] = 'Новосибирская область';
$districts[] = 'Пермский край';
$districts[] = 'Красноярский край';
$districts[] = 'Хакасия республика';

$cities_L[] = 'Москва';
$cities_L[] = 'Зеленоград';
$cities_L[] = 'Клин';

$cities_L[] = 'Санкт-Петербург';
$cities_L[] = 'Всеволжск';
$cities_L[] = 'Павловск';
$cities_L[] = 'Кронштадт';

$cities_L[] = 'Рязань';
$cities_L[] = 'Михайлов';
$cities_L[] = 'Ряжск';

$cities_L[] = 'Новосибирск';
$cities_L[] = 'Куйбышев';
$cities_L[] = 'Барабинск';

$cities_L[] = 'Пермь';
$cities_L[] = 'Нытва';
$cities_L[] = 'Кудымкар';
$cities_L[] = 'Чернушка';

$cities_L[] = 'Красноярск';
$cities_L[] = 'Ачинск';
$cities_L[] = 'Канск';
$cities_L[] = 'Железногорск';

$cities_L[] = 'Абакан';
$cities_L[] = 'Саяногорск';
$cities_L[] = 'Сорск';

function getDistrictStructure($districts, $cities, $inclusions)
{
    $arr = [];
    $sum = 0;
    for ($j = 0; $j < count($inclusions); $j++) {
        $sum += $inclusions[$j - 1] ? $inclusions[$j - 1] : 0;
        $arr[$districts[$j]] = [];
        for ($i = 0; $i < $inclusions[$j]; $i++) {
            array_push($arr[$districts[$j]], $cities[$i + $sum]);
        }
    }
    return $arr;
}

$arr = getDistrictStructure($districts, $cities_L, $inclusions);
outputArray($arr);

// 4
outputText('Задание №4');

function translite($strIn)
{
    $translitArr = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l',
        'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's',
        'т' => 't', 'у' => 'u', 'ф' => 'f',
        'ы' => 'y', 'э' => 'e', 'ё' => 'yo',
        'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shch', 'ъ' => '',
        'ь' => '', 'ю' => 'yu', 'я' => 'ya'
    );
    $strOut = '';
    for ($i = 0; $i < mb_strlen($strIn); $i++) {
        $chIn = mb_substr($strIn, $i, 1);
        $upReg = isRegUp($chIn);
        $chOut = $translitArr[mb_strtolower($chIn)];
        if ($chOut) {
            if ($upReg) {
                $strOut .= mb_strtoupper($chOut);
            } else {
                $strOut .= $chOut;
            }
        } else if ($chOut !== '') {
            $strOut .= $chIn;
        }
    }
    return $strOut;
}

function isRegUp($ch)
{
    return $ch === mb_strtoupper($ch);
}

$text = 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности требуют от нас анализа новых предложений. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции способствует подготовки и реализации направлений прогрессивного развития. Идейные соображения высшего порядка, а также сложившаяся структура организации позволяет оценить значение соответствующий условий активизации.';

outputText($text);
outputText('------');
outputText(translite($text));

// 5
outputText('Задание №5');

function changeSpace($strIn)
{
    $strOut = '';
    for ($i = 0; $i < mb_strlen($strIn); $i++) {
        $chIn = mb_substr($strIn, $i, 1);
        if ($chIn === ' ') {
            $chOut = '_';
        } else {
            $chOut = $chIn;
        }
        $strOut .= $chOut;
    }
    return $strOut;
}

$text = 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности требуют от нас анализа новых предложений. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции способствует подготовки и реализации направлений прогрессивного развития. Идейные соображения высшего порядка, а также сложившаяся структура организации позволяет оценить значение соответствующий условий активизации.';

outputText($text);
outputText('------');
outputText(changeSpace($text));

// 5*
outputText('Задание №5 v.2');

function changeSymbol($strIn, $symbol, $symbolChange)
{
    $strOut = '';
    for ($i = 0; $i < mb_strlen($strIn); $i++) {
        $chIn = mb_substr($strIn, $i, 1);
        if ($chIn === $symbol) {
            $chOut = $symbolChange;
        } else {
            $chOut = $chIn;
        }
        $strOut .= $chOut;
    }
    return $strOut;
}

$text = 'Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности требуют от нас анализа новых предложений. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции способствует подготовки и реализации направлений прогрессивного развития. Идейные соображения высшего порядка, а также сложившаяся структура организации позволяет оценить значение соответствующий условий активизации.';

outputText($text);
outputText('------');
outputText(changeSymbol($text, ' ', '_'));

// 6
outputText('Задание №6');

$menuName = 'Меню';
$menuList = [];
$menuList['Первый'] = false;
$menuList['Второй'] = false;
$menuList['Третий'] = false;
$menuList['Четвертый'] = false;
$menuList['Пятый'] = false;

$menuList['Первый']['Шестой'] = false;
$menuList['Первый']['Седьмой'] = false;
$menuList['Первый']['Восьмой'] = false;
$menuList['Первый']['Девятый'] = false;

$menuList['Первый']['Седьмой']['Десятый'] = false;
$menuList['Первый']['Седьмой']['Одиннадцатый'] = false;
$menuList['Первый']['Седьмой']['Двенадцатый'] = false;

function showList($htmlText, $list)
{
    for ($i = 0; $i < count(array_keys($list)); $i++) {
        $arr = array_keys($list);//массив ключей
        $htmlText .= '<li>' . $arr[$i];
        $elem = $list[$arr[$i]];
        if (!$elem) {//значение ключа = false
            $htmlText .= '-';
        } else {
            if (gettype($elem) === 'array') {//значение ключа - массив
                $htmlText .= '<ul>';
                $htmlText .= showList($htmlText, $elem);
                $htmlText .= '</ul>';
            }
        }
        $htmlText .= '</li>';
    }
    return $htmlText;
}

$textHTML = '';
$textHTML = showList($textHTML, $menuList);
?>
    <nav>
        <p><?= $menuName ?></p>
        <ul>
            <?= $textHTML ?>
        </ul>
    </nav>
<?php

// 7
outputText('Задание №7');

for ($i = 0; $i <= 9; outputText($i++)) {}

// 3 v.3
outputText('Задание №3 v.3');

for ($i = 0; $i < count(array_keys($cities)); $i++) {
    $distr = array_keys($cities)[$i];
    echo $distr . BR;
    for ($j = 0; $j < count(array_keys($cities[$distr])); $j++) {
    echo ' - '.$cities[$distr][$j].BR;
    }
}

// 8
outputText('Задание №8');

$cities['Московская область'][] = 'Москва';
$cities['Московская область'][] = 'Зеленоград';
$cities['Московская область'][] = 'Клин';

$cities['Ленинградская область'][] = 'Санкт-Петербург';
$cities['Ленинградская область'][] = 'Всеволжск';
$cities['Ленинградская область'][] = 'Павловск';
$cities['Ленинградская область'][] = 'Кронштадт';

$cities['Рязанская область'][] = 'Рязань';
$cities['Рязанская область'][] = 'Михайлов';
$cities['Рязанская область'][] = 'Ряжск';

$cities['Новосибирская область'][] = 'Новосибирск';
$cities['Новосибирская область'][] = 'Куйбышев';
$cities['Новосибирская область'][] = 'Барабинск';

$cities['Пермский край'][] = 'Пермь';
$cities['Пермский край'][] = 'Нытва';
$cities['Пермский край'][] = 'Кудымкар';
$cities['Пермский край'][] = 'Чернушка';

$cities['Красноярский край'][] = 'Красноярск';
$cities['Красноярский край'][] = 'Ачинск';
$cities['Красноярский край'][] = 'Канск';
$cities['Красноярский край'][] = 'Железногорск';

$cities['Хакасия республика'][] = 'Абакан';
$cities['Хакасия республика'][] = 'Саяногорск';
$cities['Хакасия республика'][] = 'Сорск';

for ($i = 0; $i < count(array_keys($cities)); $i++) {
    $distr = array_keys($cities)[$i];
    for ($j = 0; $j < count(array_keys($cities[$distr])); $j++) {
        $str = $cities[$distr][$j];
        if (mb_substr($str, 0, 1) === 'К') {
            echo $str . BR;
        }
    }
}

// 8 v.2
outputText('Задание №8 v.2');

$cities['Московская область'][] = 'Москва';
$cities['Московская область'][] = 'Зеленоград';
$cities['Московская область'][] = 'Клин';

$cities['Ленинградская область'][] = 'Санкт-Петербург';
$cities['Ленинградская область'][] = 'Всеволжск';
$cities['Ленинградская область'][] = 'Павловск';
$cities['Ленинградская область'][] = 'Кронштадт';

$cities['Рязанская область'][] = 'Рязань';
$cities['Рязанская область'][] = 'Михайлов';
$cities['Рязанская область'][] = 'Ряжск';

$cities['Новосибирская область'][] = 'Новосибирск';
$cities['Новосибирская область'][] = 'Куйбышев';
$cities['Новосибирская область'][] = 'Барабинск';

$cities['Пермский край'][] = 'Пермь';
$cities['Пермский край'][] = 'Нытва';
$cities['Пермский край'][] = 'Кудымкар';
$cities['Пермский край'][] = 'Чернушка';

$cities['Красноярский край'][] = 'Красноярск';
$cities['Красноярский край'][] = 'Ачинск';
$cities['Красноярский край'][] = 'Канск';
$cities['Красноярский край'][] = 'Железногорск';

$cities['Хакасия республика'][] = 'Абакан';
$cities['Хакасия республика'][] = 'Саяногорск';
$cities['Хакасия республика'][] = 'Сорск';

function outputCity_W($cities, $word)
{
    $text ='';
    for ($i = 0; $i < count(array_keys($cities)); $i++) {
        $distr = array_keys($cities)[$i];
        for ($j = 0; $j < count(array_keys($cities[$distr])); $j++) {
            $str = $cities[$distr][$j];
            if (mb_substr($str, 0, 1) === $word) {
                $text .= $str . BR;
            }
        }
    }
    echo $text;
}
outputCity_W($cities,'К');



// 9
outputText('Задание №9');

function getURL($articleName)
{
    $translitArr = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l',
        'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's',
        'т' => 't', 'у' => 'u', 'ф' => 'f',
        'ы' => 'y', 'э' => 'e', 'ё' => 'yo',
        'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shch', 'ъ' => '',
        'ь' => '', 'ю' => 'yu', 'я' => 'ya'
    );
    $strOut = '';
    $strIn = $articleName;
    for ($i = 0; $i < mb_strlen($strIn); $i++) {
        $chIn = mb_substr($strIn, $i, 1);
        if ($chIn === ' ') {
            $chOut = '_';
        } else {
            $chOut = $chIn;
            $upReg = ($chIn === mb_strtoupper($chIn));
            $chOut = $translitArr[mb_strtolower($chIn)];
        }
        if ($chOut) {
            if ($upReg) {
                $strOut .= mb_strtoupper($chOut);
            } else {
                $strOut .= $chOut;
            }
        } else if ($chOut !== '') {
            $strOut .= $chIn;
        }
    }
    return $strOut;
}

$text = 'Это рыбный текст';

echo getURL($text);
