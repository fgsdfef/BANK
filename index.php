<?php

declare(strict_types=1);

require_once 'InvalidAmountException.php';
require_once 'InsufficientFundsException.php';
require_once 'BankAccount.php';

try {
    echo "1. Создание счета с начальным балансом 1000..." . PHP_EOL;
    $account = new BankAccount(1000);
    echo "   Текущий баланс: {$account->getBalance()}" . PHP_EOL . PHP_EOL;

    echo "2. Пополнение счета на 500..." . PHP_EOL;
    $account->deposit(500);
    echo "   Текущий баланс: {$account->getBalance()}" . PHP_EOL . PHP_EOL;

    echo "3. Снятие 700 со счета..." . PHP_EOL;
    $account->withdraw(700);
    echo "   Текущий баланс: {$account->getBalance()}" . PHP_EOL . PHP_EOL;

    echo "4. Попытка снять 2000 (больше баланса)..." . PHP_EOL;
    $account->withdraw(2000);
    echo "   Успешно снято!" . PHP_EOL;
} catch (InsufficientFundsException $e) {
    echo "   Ошибка: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
} catch (InvalidAmountException $e) {
    echo "   Ошибка: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
}

echo "5. Попытка снять -100 (отрицательная сумма)..." . PHP_EOL;
try {
    $account->withdraw(-100);
    echo "   Успешно снято!" . PHP_EOL;
} catch (InvalidAmountException $e) {
    echo "   Ошибка: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
}

echo "6. Пополнение на 0..." . PHP_EOL;
try {
    $account->deposit(0);
    echo "   Успешно пополнено!" . PHP_EOL;
} catch (InvalidAmountException $e) {
    echo "   Ошибка: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
}

echo "7. Создание счета с отрицательным начальным балансом..." . PHP_EOL;
try {
    $badAccount = new BankAccount(-100);
    echo "   Счет создан!" . PHP_EOL;
} catch (InvalidAmountException $e) {
    echo "   Ошибка: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
}

echo "8. Финансовые операции после обработки ошибок:" . PHP_EOL;
echo "   Текущий баланс: {$account->getBalance()}" . PHP_EOL;
$account->deposit(100);
echo "   После пополнения на 100: {$account->getBalance()}" . PHP_EOL;
$account->withdraw(50);
echo "   После снятия 50: {$account->getBalance()}" . PHP_EOL;
