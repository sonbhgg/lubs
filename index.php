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
    echo "Исключение: " . $ex->getMessage() . "<br>";
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
