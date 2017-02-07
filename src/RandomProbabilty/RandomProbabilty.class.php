<?php  namespace RandomProbability;

/**
 * A class to return one or more random results
 * based on a weighted probability.
 */
class RandomProbability
{

  private $values;

  /**
   * Add a new item to the weighted array
   * @param ?  $value  The value
   * @param integer $weight The weight i whole integer
   */
  public function add($value, $weight = 50)
  {
    $this->values[$weight] = $value;
  }

  /**
   * Remove a value from the weighted array
   * @param  ? $value The value to remove
   * @return null
   */
  public function remove($value) {
    if(($key = array_search($value, $this->values)) !== false) {
      unset($this->values[$key]);
    }
  }

  /**
   * Returns a unique result set
   * @param  integer $amount The number of results to return
   * @return array An array of values
   */
  public function getUniqueResults($amount)
  {
    $results = array();

    // Store original values
    $valuesBackup = $this->values;

    for($i = 0; $i <= $amount; $i++) {
      $value = $this->getResult();
      $results[] = $value;
      $this->remove($value);
    }

    // Set original values again
    $this->values = $valuesBackup;

    return $results;

  }

  /**
   * Returns a result set
   * Please note that this returns duplicates.
   * If You want a unique resultset use the getUniqueResults() instead
   *
   * @param  integer $amount The amount of values to return
   * @return array         The result array
   */
  public function getResults($amount)
  {
    $results = array();
    for($i = 0; $i <= $amount; $i++) {
      $results[] = $this->getResult();
    }
    return $results;

  }

  /**
   * Returns a random result based on probability
   * @param  array $arr The weighted array
   * @return ?     The result
   */
  public function getResult($arr = false)
  {
    if(!$arr) $arr = $this->values;
    $randomKey = $this->getRandomKey();

    foreach ($this->values as $key => $value) {
      $randomKey -= $key;
      if ($randomKey <= 0) {
        return $value;
      }
    }
  }

  /**
   * Sums the weights
   * @return integer The sum
   */
  private function sumWeight()
  {
    $sum = 0;
    foreach($this->values as $key => $value) {
      $sum += $key;
    }
    return (int)$sum;
  }

  /**
   * Returns a random key based on probability
   * @return integer The key
   */
  private function getRandomKey()
  {
    return rand(0, $this->sumWeight());
  }

}