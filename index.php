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
