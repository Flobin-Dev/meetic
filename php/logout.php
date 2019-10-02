<?php

class Logout
{
  public function __construct()
  {
    $_SESSION = [];
    session_destroy();
  }
}

$logout = new Logout();

?>
