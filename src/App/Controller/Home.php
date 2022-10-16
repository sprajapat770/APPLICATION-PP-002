<?php

namespace App\Controller;

use App\View;

class Home
{
    public function index(): View
    {
        return View::make('index',['foo' => 'bar'] );
    }

    public function upload() :void
    {
        $filePath = STORAGE_PATH.'/'.$_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'],$filePath);

        header('Location: /');
        exit();
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.txt"');
        readfile(STORAGE_PATH.'/DA.txt');
    }
}

?>