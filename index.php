<!DOCTYPE html>
<html>
<head>
    <title>Сравнение дат</title>
</head>
<<body>
    <div class="form-container">
        <h2>Сравнение двух дат</h2>
        <form method="post">
            <div class="form-group">
                <label for="date1">Первая дата:</label>
                <input type="date" name="date1" id="date1" value="<?php echo htmlspecialchars($date1); ?>" required>
            </div>
            <div class="form-group">
                <label for="date2">Вторая дата:</label>
                <input type="date" name="date2" id="date2" value="<?php echo htmlspecialchars($date2); ?>" required>
            </div>
            <input type="submit" value="Сравнить">
        </form>
        
        <?php if (!empty($result)): ?>
            <div class="result <?php echo strpos($result, 'введите') !== false ? 'error' : ''; ?>">
                <strong>Результат:</strong> <?php echo $result; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$filename = "non_existent_file.txt";

try {
    if (!file_exists($filename)) {
        throw new Exception("Ошибка: Файл '{$filename}' не существует.");
    }
    
    $file = fopen($filename, "r");
    fclose($file);
    echo "Файл успешно открыт.";

} catch (Exception $ex) {
    echo "<br>" . "Исключение: " . $ex->getMessage() . "<br>";
    echo "В файле: " . $ex->getFile() . " в строке: " . $ex->getLine();
}



$dividend = 10;
$divisor = 0;

try {
    if ($divisor == 0) {
        throw new Exception("Попытка деления на ноль.");
    }
    
    $result = $dividend / $divisor;
    echo "Результат деления: " . $result;

} catch (Exception $ex) {
    $errorMessage = date("Y-m-d H:i:s") . " - Ошибка: " . $ex->getMessage() . " в файле " . $ex->getFile() . " на строке " . $ex->getLine() . PHP_EOL;
    
    file_put_contents("log.txt", $errorMessage, FILE_APPEND);
    
    echo "<br>" . "Произошла ошибка. Подробности записаны в лог-файл.";
}



$countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
$requestedCountry = 'Germany';

try {
    if (!array_key_exists($requestedCountry, $countries)) {
        throw new Exception("Страна '{$requestedCountry}' не найдена в массиве.");
    }
    
    $capital = $countries[$requestedCountry];
    echo "Столица страны {$requestedCountry}: {$capital}";

} catch (Exception $ex) {
    echo "<br>" . "Исключение: " . $ex->getMessage();
}



//1
$timestamp = mktime(10, 25, 0, 3, 15, 2025);
echo "<br>" . "<br>" . "Timestamp для 15 марта 2025 10:25:00: " . $timestamp;


//2
$pastTimestamp = mktime(8, 5, 59, 10, 2, 1990);
$currentTimestamp = time();
$differenceInSeconds = $currentTimestamp - $pastTimestamp;

echo "<br>" . "<br>" . "Разница в секундах: " . $differenceInSeconds;

//3
echo "<br>" . "<br>" . date("Y.m.d H:i:s");

//4
$septemberFirst = mktime(0, 0, 0, 9, 1, date('Y'));
echo "<br>" . "<br>" . date("Y.m.d", $septemberFirst);

//5
$timestamp5 = mktime(0, 0, 0, 2, 2, 2000);
echo "<br>" . "<br>" . date("l", $timestamp5);

//6
$week = [
    'воскресенье',
    'понедельник',
    'вторник',
    'среда',
    'четверг',
    'пятница',
    'суббота'
];

$currentDayNumber = date('w');
echo "<br>" . "<br>" . "Сегодня: " . $week[$currentDayNumber];

$givenTimestamp = mktime(0, 0, 0, 6, 12, 2016);
$givenDayNumber = date('w', $givenTimestamp);
echo "<br>" . "12 июня 2016 года был: " . $week[$givenDayNumber];

$birthdayTimestamp = mktime(0, 0, 0, 2, 18, 2006);
$birthdayDayNumber = date('w', $birthdayTimestamp);
echo "<br>" . "18 февраля 2006 года был: " . $week[$birthdayDayNumber];

//7
$date1 = '';
$date2 = '';
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'] ?? '';
    $date2 = $_POST['date2'] ?? '';
    
    if (!empty($date1) && !empty($date2)) {
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);
        
        if ($timestamp1 > $timestamp2) {
            $result = "Первая дата ('" . date('d.m.Y', $timestamp1) . "') больше, чем вторая ('" . date('d.m.Y', $timestamp2) . "').";
        } elseif ($timestamp1 < $timestamp2) {
            $result = "Вторая дата ('" . date('d.m.Y', $timestamp2) . "') больше, чем первая ('" . date('d.m.Y', $timestamp1) . "').";
        } else {
            $result = "Даты равны.";
        }
    } else {
        $result = "Пожалуйста, введите обе даты.";
    }
}

//8
$dateIn = "2025-12-31";
$timestamp7 = strtotime($dateIn);
$dateOut = date("d-m-Y", $timestamp7);
echo "<br>" . "<br>" . "Исходная дата: $dateIn";
echo "<br>" . "Преобразованная дата: $dateOut";

//9
$date = "2000.02.03";
$dateObj = date_create(str_replace('.', '-', $date));

date_modify($dateObj, '+2 days');
date_modify($dateObj, '+1 month');
date_modify($dateObj, '+3 days');
date_modify($dateObj, '+1 year');
echo "<br>" . "<br>" . "После добавлений: " . date_format($dateObj, 'd.m.Y');

date_modify($dateObj, '-3 days');
echo "<br>" . "После вычитания 3 дней: " . date_format($dateObj, 'd.m.Y');

//10
$now = time();
$nextYear = date('Y') + 1;
$newYear = mktime(0, 0, 0, 1, 1, $nextYear);

$differenceInSeconds10 = $newYear - $now;
$daysLeft = floor($differenceInSeconds10 / (60 * 60 * 24));

echo "<br>" .  "<br>" . "До Нового Года осталось: " . $daysLeft . " дней.";
