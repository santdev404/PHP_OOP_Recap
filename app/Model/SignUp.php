<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Invoice;
use App\Model\Model;
use App\Model\User;


class SignUp extends Model
{
    protected User $userModel;
    protected Invoice $invoiceModel;


    public function __construct(User $userModel, Invoice $invoiceModel)
    {
        $this->userModel = $userModel;
        $this->invoiceModel = $invoiceModel;
        parent::__construct();
    }

    public function register(array $userInfo, array $invoiceInfo): int
    {
        try{

            $this->db->beginTransaction();

            $userId = $this->userModel->create($userInfo['email'], $userInfo['name'], true);
            $invoiceId = $this->invoiceModel->create($invoiceInfo['amount'], $userId);

            $this->db->commit();

        }catch(\Throwable $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }

            throw $e;
        }

        return $invoiceId;
    }

}