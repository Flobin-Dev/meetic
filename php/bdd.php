<?php

class Bdd
{
  protected $link;
  public $name;
  public $surname;
  public $city;
  public $genre;
  public $birthdate;
  public $email;

  public function __construct()
  {
    try
    {
      $this->link = new PDO(
        "mysql:host=localhost;dbname=my_meetic;charset=utf8mb4",
        "root","foobar");
    }
    catch (Exception $exception)
    {
      echo $exception->getMessage();
      die();
    }
  }
}

?>
