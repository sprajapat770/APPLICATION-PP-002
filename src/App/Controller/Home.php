<?php

namespace App\Controller;

use App\App;
use App\Model\SignUp;
use App\Model\User;
use App\Model\Invoice;
use App\View;

class Home
{
    /**
     * @throws \Throwable
     */
    public function index(): View
    {
        /** @var \PDO $db */
        $db = App::db();
        $name = "Suraj Prajapat";
        $email = 'sprajapat7@gmail.com';
        $amount = 25;

        $userModel = new User();
        $invoiceModel = new Invoice();
        $invoiceId = (new SignUp($userModel, $invoiceModel))->register([
            'email' => $email,
            'name' => $name
        ], [
            'amount' => $amount
        ]);

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
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