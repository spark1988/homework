<?php

define("DIR", "files/");
$errors = array();
$success = array();

//Получение всех файлом из папки
$files = array_diff(scandir(DIR), array('..', '.'));

function clearInput($data, $type = 's'){

    switch($type){
        case 'i+':
            $data = abs((int)$data); break;
        case 'i':
            $data = (int)($data); break;
        case 'd':
            $data = (double)$data; break;
        case 's':
            $data = trim(strip_tags($data)); break;

    }
    return $data;
}

// Проверка на наличие файла в папке
function check_file($file,$files)
{
    if (!in_array($file, $files)) {
        return false;
    }
    return true;
}

//Чтение получаемого файла
function file_read($file)
{
    $file_path = DIR. $file;
    $handle = fopen($file_path, "r");
    $contents = fread($handle, filesize($file_path));
    fclose($handle);

    return $contents;
}

function file_write($file,$content)
{
    $filename = DIR. $file;
    if(is_writable($filename))
    {
        if(file_put_contents($filename, $content)){
            return true;
        }
    }else{
        return false;
    }
}
function add_file($file,$content)
{
    $filename = DIR. $file;

    if(file_put_contents($filename, $content)){
        return true;
    }else{
        return false;
    }
}

?>