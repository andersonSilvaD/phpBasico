<?php
require_once "Account.php";
require_once "User.php";
class BankManager {
    public $test;
    private  $Accounts = [];

    /**
     * @return array
     */
    public function getAccountById(string $id): ?Account
    {
        return $this->Accounts[$id];
    }

    public function newBankAccount(User $user, float $balance, string $id):void
    {
        if ($this->validateUserData($user,$balance))
            $this->Accounts[$id] = new Account($user,$balance);
    }
    private function validateUserData(User $user, float $balance):bool
    {
        return true;
    }

    public function withdraw(float $value, string $id):void {
        $this->Accounts[$id]->withDraw($value);
    }
    public function deposit(float $value, string $id):void{
        $this->Accounts[$id]->deposit($value);
    }
    public function transfer(float $value, string $transfering, string $toTransfer): void {
        if($this->Accounts[$transfering]->withdraw($value))
            $this->Accounts[$toTransfer]->deposit($value);
        else
            echo "Não foi possivel completar sua transferencia" .PHP_EOL;
    }
}