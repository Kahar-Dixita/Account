<?php

namespace App\Interfaces;

interface AccountRepositoryInterface
{
    public function getAllAccount();
    public function getAccountById($id);
    public function deleteAccount($accountId);
    public function createAccount(array $accounts);
    public function updateAccount($account, array $newDetails);
    // public function getFulfilledAccounts();
}
?>
