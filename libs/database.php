<?php
// define a constant variable to store our database settings
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'psm2');
define('DB_USER', 'root');
define('DB_PASS', 'password');

$connection = mysqli_connect('localhost','root','','psm2') or die(mysqli_error($connection));

?>

<?php


//line 29 -> array to string conversion notice twice
class DB
{

  public static function connect($value = '')
  {
    // create a new PDO connection
    $pdo = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }

  public static function run($sql, $args = NULL)
  {
    if (!$args) // if no parameter
    {
      // run the query straight away without parameter binding
      return DB::connect()->query($sql);
    }

    // prepare the sql query
    $stmt = DB::connect()->prepare($sql);
    // execute the query with bind parameter values
    try {
      $stmt->execute($args);
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

}