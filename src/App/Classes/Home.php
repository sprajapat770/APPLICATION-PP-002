<?php

namespace App\Classes;

class Home
{
    public function index(): string
    {
        return <<<FORM
<form method="post" action="/upload" enctype="multipart/form-data">
        <input type="file" name="receipt"/>
        <button type="submit">Upload</button>
        </form> 
FORM;
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