<?php
require_once "User.php";

class Account {

    private User $user;
    private float $balance;
    private string $id;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param User $user
     * @param float $balance
     */
    public function __construct(User $user, float $balance)
    {
        $this->user = $user;
        $this->balance = $balance;
    }



    public function deposit(float $value):void {
        if (!$this->isDepositValid($value))
        {
            echo "Não foi possivel validar seu deposito, favor verificar o valor digitado" .PHP_EOL ;
            return;
        }
    $this->balance +=$value;
    }
    public function withdraw(float $valueToTake):bool {
        if (!$this->hasEnoughBalance($valueToTake))
        {
            echo "Não foi possivel completar esta operação, verifique seu saldo" .PHP_EOL;
            return false;
        }
        $this->balance -=$valueToTake;
        return true;
    }

    private function isDepositValid(float $value):bool {
        if ($value <= 0)
            return false;
        return true;
    }

    private function hasEnoughBalance(float $value):bool {
        if ($value > $this->balance)
            return false;
        return true;
    }
}
