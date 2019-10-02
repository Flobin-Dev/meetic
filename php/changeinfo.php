<?php

include 'bdd.php';

class Update extends Bdd
{
  public function updateData()
  {
    session_start();
    $update = $this->link->prepare('UPDATE info, carac
                          SET info.email = "' . $_POST['email'] . '",
                              carac.name = "' . $_POST['name'] . '",
                              carac.surname = "' . $_POST['surname'] . '",
                              carac.city = "' . $_POST['city'] . '",
                              carac.gender = "' . $_POST['gender'] . '",
                              carac.birthdate = DATE("' . $_POST['birthdate'] . '")
                          WHERE info.email = "' . $_SESSION['email'] . '"
                          AND info.id_user = carac.id_user');
    $update->execute();
    $_SESSION['email'] = $_POST['email'];
  }
}

$datachange = new Update();
$datachange->updateData();

?>
