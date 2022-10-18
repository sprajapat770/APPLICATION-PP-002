<?php

namespace App\Controller;

use App\App;
use App\View;

class Home
{
    public function index(): View
    {
        /** @var \PDO $db */
        $db = App::db();

        try {
            $db->beginTransaction();

            $newUserStmt = $db->prepare(
                'INSERT INTO users (email, full_name, is_active, created_at)
                      VALUES (?, ?, 1, NOW())'
            );

            $newInvoiceStmt = $db->prepare(
                'INSERT INTO invoices (amount, user_id)
                      VALUES (?, ?)'
            );
            $db->commit();
            $db->rollBack();
            $db->inTransaction();
        }catch (\Throwable){

        }
        $query = 'SELECT * FROM users';
            foreach ($db->query($query) as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }



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