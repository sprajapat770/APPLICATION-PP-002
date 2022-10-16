<?php

namespace App\Controller;

class Home
{
    public function index(): string
    {
        return '';
    }

    public function upload() :void
    {
        echo '<pre>';
        var_dump($_FILES);
        var_dump(pathinfo($_FILES['receipt']['tmp_name']));
        echo '</pre>';

        $filePath = STORAGE_PATH.'/'.$_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'],$filePath);
        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '</pre>';
    }
}

?>