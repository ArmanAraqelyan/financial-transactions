# Financial transactions system

This is a small system with dummy data for making transactions such as deposits, withdrawals and transfers.
The transaction contains a comment, an amount, and a due date.

## Installation

run the command

```bash
composer install
```

## Usage

When you open a project, transactions will be performed on dummy data.
In DummyData.php you can see transaction data and operations like: getAccounts, getTransactions etc.

to run phpstan:
```bash
php vendor/bin/phpstan analyze app
```

## Requirements

- Code check must be passed by phpstan, phpcs analyzers.
- Only business logic code required.
- MVC pattern is forbidden, UI Interface is not required
- Not write controllers and views.
- Not use frameworks and databases.

Required methods:
- get all accounts in the system.
- get the balance of a specific account
- perform an operation
- get all account transactions sorted by comment in alphabetical order.
- get all account transactions sorted by date.

## Patterns Used

This project used the Abstract Factory design pattern to return the required Transaction factory based on the given type.
Why use an Abstract Factory: The client is independent of how we create and compose objects in the system.

Also, the principles of SOLID and GRASP are used in the project.