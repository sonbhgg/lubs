<?php
echo "<h2>Часть 1</h2>";

$file = fopen("test.txt", "w");
fwrite($file, "Привет, мир!");
fclose($file);
echo "1. Файл 'test.txt' создан и запись выполнена.<br>";

$content = file_get_contents("test.txt");
echo "2. Содержимое файла 'test.txt': " . $content . "<br>";

rename("test.txt", "mir.txt");
echo "3. Файл 'test.txt' переименован в 'mir.txt'.<br>";

if (!file_exists("folder")) {
    mkdir("folder");
    echo "4. Папка 'folder' создана.<br>";
}
rename("mir.txt", "folder/mir.txt");
echo "4. Файл 'mir.txt' перемещен в папку 'folder'.<br>";

copy("folder/mir.txt", "folder/world.txt");
echo "5. Создана копия 'world.txt' в папке 'folder'.<br>";

$sizeBytes = filesize("folder/world.txt");
$sizeMB = $sizeBytes / (1024 * 1024);
$sizeGB = $sizeBytes / (1024 * 1024 * 1024);

echo "6. Размер файла 'world.txt':<br>";
echo "   - Байты: " . $sizeBytes . " байт<br>";
echo "   - Мегабайты: " . number_format($sizeMB, 6) . " МБ<br>";
echo "   - Гигабайты: " . number_format($sizeGB, 9) . " ГБ<br>";

unlink("folder/world.txt");
echo "7. Файл 'world.txt' удален.<br>";

echo "8. Проверка существования файлов:<br>";
if (file_exists("folder/world.txt")) {
    echo "   - Файл 'world.txt' существует.<br>";
} else {
    echo "   - Файл 'world.txt' НЕ существует.<br>";
}

if (file_exists("folder/mir.txt")) {
    echo "   - Файл 'mir.txt' существует.<br>";
} else {
    echo "   - Файл 'mir.txt' НЕ существует.<br>";
}

?>
