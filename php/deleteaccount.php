<?php

include 'bdd.php';

class Delete extends Bdd
{
  public function deleteAccount()
  {
    session_start();

    $update = $this->link->prepare('UPDATE info
                          SET deleted = 1
                          WHERE email = "' . $_SESSION['email'] . '"');
    $update->execute();
    $_SESSION = [];
    session_destroy();
  }
}

$delete = new Delete();
$delete->deleteAccount();

?>
