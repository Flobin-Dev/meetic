<?php

include 'bdd.php';

class Account extends Bdd
{
  public function getinfo()
  {
    session_start();
    $info = $this->link->prepare('SELECT info.email, carac.name, carac.surname,
      carac.city, carac.gender, carac.birthdate FROM info INNER JOIN carac ON
      info.id_user = carac.id_user
      WHERE email LIKE "' . $_SESSION['email'] . '"');
    $info->execute();
    $row = $info->fetch(PDO::FETCH_ASSOC);
    echo '<form class="change" action="compte.html">';
    $this->printInfo($row);
  }

  public function printInfo($row)
  {
    foreach($row as $key => $value)
    {
      if($key == "gender")
      {
        echo '<span type="text" class="column">' . $key . '</span>
        <select class="gender" name="gender">
        <option value="' . $value . '">'. $value . '</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option></select>';
      }
      else
      {
        echo '<span type="text" class="column">' . $key . '</span>
        <input type="text"
        class="value ' . $key . '" value="' . $value . '"></input>';
      }
    }
    echo '<input type="submit" class="changeinfo"
    value="Change informations"></input>';
    echo '</form>';
    echo '<button class="delete">Delete account</button><br>';
    echo '<button class="logout">Log out</button><br>';
    $_SESSION['email'] = $row['email'];  
  }
}

$account = new Account();
$account->getinfo();

?>
