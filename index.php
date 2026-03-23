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

echo "<h2>Часть 2</h2>";

if (!file_exists("test")) {
    mkdir("test");
    echo "1. Папка 'test' создана.<br>";
} else {
    echo "1. Папка 'test' уже существует.<br>";
}

if (file_exists("test")) {
    rename("test", "www");
    echo "2. Папка 'test' переименована в 'www'.<br>";
} else {
    echo "2. Папка 'test' не найдена для переименования.<br>";
}

if (file_exists("www")) {
    rmdir("www");
    echo "3. Папка 'www' удалена.<br>";
} else {
    echo "3. Папка 'www' не найдена для удаления.<br>";
}

if (!file_exists("test")) {
    mkdir("test");
    echo "4. Папка 'test' создана заново для выполнения задания.<br>";
}

$foldersArray = ["documents", "images", "downloads", "backup"];
echo "4. Создание папок в 'test': ";

foreach ($foldersArray as $folderName) {
    $path = "test/" . $folderName;
    if (!file_exists($path)) {
        mkdir($path);
        echo "'$folderName' ";
    } else {
        echo "(папка '$folderName' уже существует) ";
    }
}
echo "<br>";

echo "5. Файлы с расширением .jpg в текущей папке:<br>";
$jpgFiles = glob("*.jpg");

if (count($jpgFiles) > 0) {
    foreach ($jpgFiles as $file) {
        echo "   - " . $file . "<br>";
    }
} else {
    echo "   - Файлы с расширением .jpg не найдены.<br>";
}

?>
