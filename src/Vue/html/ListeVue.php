<?php
      Foreach($results as $row)
      {
        print $row->getNom();
        echo ("<br>");
        print $row->getDateCreation();
        echo ("<br>");
      }
?>
