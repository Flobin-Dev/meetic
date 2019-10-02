<?php

include 'bdd.php';

class Login extends Bdd
{
  public function checkDeleted()
  {
    $isdeleted = $this->link->prepare('SELECT deleted FROM info
                              WHERE email ="' . $_POST['logemail'] . '"');
    $isdeleted->execute();
    $row = $isdeleted->fetch();
    if($row[0] == 1)
    {
      echo "Your account has been deleted.";
    }
    else
    {
      $this->verifyLogins();
    }
  }

  public function verifyLogins()
  {
    if ($_POST['logemail'] != "" AND $_POST['logpassword'] != "")
    {
      $this->user_Meetic();
    }
    else
    {
      echo "Please fill the values";
      return FALSE;
    }
  }

  public function user_Meetic()
  {
    $stmtmail = $this->link->query('SELECT COUNT(email) FROM info
          WHERE email LIKE BINARY "' . $_POST['logemail'] . '"');
    $nbrrow = $stmtmail->fetch();
    if ($nbrrow[0] == 1){
      $stmtpwd = $this->link->query('SELECT password FROM info
              WHERE email LIKE BINARY "' . $_POST['logemail'] . '"');
      $pwdinfo = $stmtpwd->fetch();
      $hashedpwd = $pwdinfo[0];
      if (password_verify($_POST['logpassword'], $hashedpwd) === TRUE){
        echo "";
        session_start();
        $_SESSION = [];
        $_SESSION['email'] = $_POST['logemail'];
        return TRUE;
      }
      else{
        echo "Your password is incorrect";
        return FALSE;
      }
    }
    else{
      echo "This Email does not exists";
      return FALSE;
    }
  }
}

$login = new Login();
$login->checkDeleted();

?>
