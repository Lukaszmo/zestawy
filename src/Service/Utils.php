<?php
namespace App\Service;


class Utils {

    public function saveCSVfile(array $data, string $filename)
    {
    
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename={$filename}");

        $fp = fopen('php://output', 'wb');
        foreach ( $data as $line ) {
            $val = explode(",", $line);
            fputcsv($fp, $val);
        }
        fclose($fp); 
    }

}