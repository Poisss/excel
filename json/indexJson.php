<?php
require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
// Открываем файл XLSX
$excel = PHPExcel_IOFactory::load(__DIR__.'\dd\dd0.xlsx');

$sheet = $excel->getActiveSheet();

// Получаем количество строк и столбцов
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

// Преобразуем столбцы из буквенных в числовые значения
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

// Создаем пустой массив для хранения данных
$data = array();

// Цикл по строкам
for ($row = 1; $row <= $highestRow; ++$row) {
    // Создаем пустой массив для текущей строки
    $rowData = array();

    // Цикл по столбцам
    for ($col = 0; $col < $highestColumnIndex; ++$col) {
        // Получаем значение ячейки
        $value = $sheet->getCellByColumnAndRow($col, $row)->getValue();

        // Добавляем значение в текущую строку
        $rowData[] = $value;
    }

    // Добавляем текущую строку в массив данных
    $data[] = $rowData;
} 

$json = json_encode($data);

function decodeUnicode($s, $output = 'utf-8') 
{ 
    return preg_replace_callback('#\\\\u([a-fA-F0-9]{4})#', function ($m) use ($output) { 
        return iconv('ucs-2be', $output, pack('H*', $m[1])); 
    }, $s); 
} 
// echo $json;
// echo decodeUnicode($json);
echo '<pre>';
print_r($data);
echo '</pre>';