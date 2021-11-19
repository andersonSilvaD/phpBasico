<?php
//Classe de testes para aplicação de exercicio de php basico 1
//A duas funções principais para testar "withdraw" (saque) e deposito e transferencia

require_once "BankManager.php";
class Test{

    private BankManager $bankManager;

    public function __construct()
    {
         $this->bankManager = new BankManager();
         $userOne = new User("Anderson", "123.456.789-10", "ccc");
         $userTwo = new User("Maria", "789.456.123-01", "DDD");

        $this->bankManager->newBankAccount($userOne, 300, "00001");
        $this->bankManager->newBankAccount($userTwo, 400, "00002");
    }

    function balanceCheck(string $id)
    {
        echo "Saldo atual de: " . $this->bankManager->getAccountById($id)->getUser()->getUsername() . " "
    . $this->bankManager->getAccountById($id)->getBalance() . PHP_EOL;
    }


    public function testingRoutines():void
    {
        echo "Executando teste de validação de saque: Caso invalido de valor excedente " . PHP_EOL;
        echo $this->balanceCheck("00001");
        echo "Executando saque de 1000" . PHP_EOL;
        $this->bankManager->withdraw(1000, "00001");
        echo $this->balanceCheck("00001");

        echo PHP_EOL . "Executando teste de validação de saque: Caso valido " . PHP_EOL;
        echo $this->balanceCheck("00001");
        echo "Executando saque de 200" . PHP_EOL;
        $this->bankManager->withdraw(200, "00001");
        echo $this->balanceCheck("00001");

        echo PHP_EOL . "Executando teste de deposito: Caso invalido de valor nulo ou negativo " . PHP_EOL;
        echo $this->balanceCheck("00001");
        echo  "Executando depostio de -5 " .PHP_EOL;
        $this->bankManager->deposit(-5,"00001");
        echo $this->balanceCheck("00001");

        echo PHP_EOL . "Executando teste de deposito: Caso valido " . PHP_EOL;
        echo $this->balanceCheck("00001");
        echo  "Executando depostio de 500 " .PHP_EOL;
        $this->bankManager->deposit(500,"00001");
        echo $this->balanceCheck("00001");

        echo PHP_EOL . "Executando teste de transferencia: Caso invalido de transferenciade valor excedente:" .PHP_EOL;
        echo $this->balanceCheck("00001");
        echo $this->balanceCheck("00002");
        $this->bankManager->transfer(700,"00001","00002");
        echo $this->balanceCheck("00001");
        echo $this->balanceCheck("00002");

        echo PHP_EOL . "Executando teste de transferencia: Caso valido" .PHP_EOL;
        echo $this->balanceCheck("00001");
        echo $this->balanceCheck("00002");
        $this->bankManager->transfer(500,"00001","00002");
        echo $this->balanceCheck("00001");
        echo $this->balanceCheck("00002");
    }
}

$test = new Test();
$test->testingRoutines();