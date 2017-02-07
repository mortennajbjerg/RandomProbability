# RandomProbability Class

A class to return one or more random results based on a weighted probability.

## Examples

### Retrieving a single result

´´´php
<?php
require('vendor/autoload.php');

$randomProbabilty = new \RandomProbabilty\RandomProbabilty();

$randomProbabilty->add('peaches', 1);
$randomProbabilty->add('lemons', 9);
$randomProbabilty->add('oranges', 10);
$randomProbabilty->add('pears', 30);
$randomProbabilty->add('bananas', 50);

// Returns a random value based on the weighted probability
echo $RndProb->getResult(); // Ex. 'bananas'
´´´

### Retrieving multiple results

´´´php
<?php
require('vendor/autoload.php');

$randomProbabilty = new \RandomProbabilty\RandomProbabilty();

$randomProbabilty->add('peaches', 1);
$randomProbabilty->add('lemons', 9);
$randomProbabilty->add('oranges', 10);
$randomProbabilty->add('pears', 30);
$randomProbabilty->add('bananas', 50);

// Returns a result set of 3 values based on the weighted probability
var_dump($RndProb->getResults(3)); // Ex. ['bananas', 'bananas', 'pears']
´´´

### Retrieving unique results

´´´php
<?php
require('vendor/autoload.php');

$randomProbabilty = new \RandomProbabilty\RandomProbabilty();

$randomProbabilty->add('peaches', 1);
$randomProbabilty->add('lemons', 9);
$randomProbabilty->add('oranges', 10);
$randomProbabilty->add('pears', 30);
$randomProbabilty->add('bananas', 50);

// Returns a unique result set of 3 values based on the weighted probability
var_dump($RndProb->getUniqueResults(3)); // Ex. ['bananas', 'oranges', 'pears']
´´´