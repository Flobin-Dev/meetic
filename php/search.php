<?php

include 'bdd.php';

class Search extends Bdd
{
  // public function buildRequest()
  // // {
  // //   $request = 'SELECT
  // //   name, surname, city FROM carac
  // //   WHERE gender = "' . $_POST['gender'] . '"';
  //
  //   // $this->printSearch($request);
  // }

  public function printSearch()
  {
    $stmt = $this->link->prepare('SELECT
    name, surname, city FROM carac
    WHERE gender LIKE "' . $_POST['gender'] . '"');
    $stmt->execute();
    while($results = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $count = 0;
      foreach($results as $value)
      {
        if ($count == 0)
        {
          echo "<div class='people'>";
        }
        echo $value . " ";
        $count++;
        if ($count == 3)
        {
          echo "</div>";
        }
      }
    }
    echo "<button class='carouselbtn next'>Next</button>";
  }
}

$search = new Search();
$search->printSearch();

?>
