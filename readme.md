### Requirements
- php >= 7.3
- composer

### Installation
- `composer install` to install vendors
- `./bin/console` to verify installation

### Test description
Write a unit test for `ContractValidator` class (you'd need to add phpunit). You can rearrange the code however you see fit, rename methods, remove injected classes, etc, 
but leave explanations in comments and don't change the DTOs.

### SQL solutions
SQL answers are located in the SQL directory.
second solution for SQL#2 is using prepare and execute.

### Test solutions
For the symfony project I added "phpunit.xml" in vendor directory and "ContractTest.php" file in tests directory

I modified the getValidContracts method in a way that it doesn't get data from database (I passed the contracts manually).

To run tests: `./vendor/bin/phpunit tests`
