<?php

namespace App\Controller;

use App\App;
use App\View;

class Home
{
    public function index(): View
    {
        //single db patter logic
        /** @var \PDO $db */
        $db = App::db();
        $db1 = App::db();
        $db2 = App::db();

        var_dump($db1 === $db1, $db1=== $db2, $db===$db2);/// return true true true
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
            $name = "Suraj Prajapat";
            $email = 'sprajapat770@gmail.com';
            $amount = 25;
            $newUserStmt->execute([$email, $name]);
            $userId = (int)$db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);
            $db->commit();

        } catch (\Throwable $e) {
            if (!$db->inTransaction()) {
                $db->rollBack();
            }
            echo $e->getMessage();
        }

        $query = 'SELECT * FROM users';
        echo '<pre>';
        foreach ($db->query($query) as $user) {
            var_dump($user);
        }
        echo '</pre>';


        return View::make('index', ['foo' => 'bar']);
    }

    public function upload(): void
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit();
        unlink(STORAGE_PATH . '/DA.txt');
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.txt"');
        readfile(STORAGE_PATH . '/DA.txt');
    }
}

?>