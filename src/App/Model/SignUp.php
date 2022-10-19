<?php

namespace App\Model;

class SignUp extends Model
{

    /**
     * @param User $userModel
     * @param Invoice $invoiceModel
     */
    public function __construct(
       protected User               $userModel,
       protected Invoice $invoiceModel
    ) {
        parent::__construct();
    }

    public function register(array $userInfo, array $invoiceInfo )
    {
        try {
            $this->db->beginTransaction();
            $userId = $this->userModel->create($userInfo['email'],$userInfo['name']);
            $invoiceId = $this->invoiceModel->create($invoiceInfo['amount']
                ,$userId);
            $this->db->commit();

            return $invoiceId;
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            throw $e;
        }
    }
}