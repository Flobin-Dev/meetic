<?php

include 'bdd.php';

class Signup extends Bdd
{
  public function check_age()
  {
    $birth = new DateTime($_POST['birthdate']);
    $now = new DateTime("now");
    $ageinfo = $now->diff($birth);
    $age = $ageinfo->format("%y");
    if ($age >= 18)
    {
      $this->check_if_user_exist();
    }
    else
    {
      echo "You have to be 18+ to register";
      return FALSE;
    }
  }

  public function check_if_user_exist()
  {
    $stmt = $this->link->prepare('SELECT email FROM info
                          WHERE email LIKE BINARY "' . $_POST['email'] . '"');
    $stmt->execute();
    $nbrrow = $stmt->rowCount();
    if ($nbrrow == 1)
    {
      echo "This email is already used";
      return FALSE;
    }
    else
    {
      $this->add_user_to_db();
    }
  }

  public function add_user_to_db()
  {
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    if ($_POST['email'] != "" AND $_POST['password'] != "" AND $_POST['name']
      != "" AND $_POST['surname'] != "" AND $_POST['gender'] != "gender" AND
      $_POST['city'] != "" AND $_POST['birthdate'] != "")
    {
      $info = $this->link->prepare('INSERT INTO info (email, password, deleted)
      VALUES ("' . $_POST["email"] . '", "' . $password . '", "' . 0 .'")');
      $info->execute();

      $carac = $this->link->prepare('INSERT INTO carac (name, surname, gender,
          city, birthdate) VALUES ("' . $_POST["name"] . '", "' .
          $_POST["surname"] . '", "' . $_POST["gender"] . '", "' .
          $_POST["city"] . '", "' . $_POST["birthdate"] .  '")');
      $carac->execute();

      session_start();
      $_SESSION["email"] = $_POST["email"];
      echo "";
    }
    else
    {
      echo "Please fill all the values";
    }
  }
}

$newuser = new Signup();
$newuser->check_age();

?>
