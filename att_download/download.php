<?php
if (isset($_GET['file'])) {
    $file_name = $_GET['file'];
    $file_path = './db_backup' . $file_name;
    if (file_exists($file_path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        readfile($file_path);
        exit;
    } else {
        echo 'File not found.';
    }
}
?>