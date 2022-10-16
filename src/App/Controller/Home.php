<?php

namespace App\Controller;

use App\View;

class Home
{
    public function index(): View
    {
        try {
            $db = new \PDO('mysql:host=db;dbname=my_db','root','root');

            $query = 'SELECT * FROM users';
            foreach ($db->query($query) as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(),$e->getCode());
        }
        var_dump($db);
        return View::make('index',['foo' => 'bar'] );
    }

    public function upload() :void
    {
        $filePath = STORAGE_PATH.'/'.$_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'],$filePath);

        header('Location: /');
        exit();
        unlink(STORAGE_PATH.'/DA.txt');
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.txt"');
        readfile(STORAGE_PATH.'/DA.txt');
    }
}

?>