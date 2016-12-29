<?php

//db connection
require_once('inc/db.php');

include('inc/header.php');

//checkSession('userna');

?>

    <ul class="list">
      <h2>Your Athletes</h2>
    <?php

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<p class="date"> ' . $row['e_date'] . ' <p>';
                echo '<p class="date"> ' . $row['email'] . ' <p>';
                echo '<p><a href=athletes-detail.php?athlete=' .$row['a_id']. '>' . $row['a_name'] . '</a><p>';
                echo '</li>';
              }
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>
    </ul>
    <a href="inc/logout.php" class="logout">Log Out</a>
<?php include("inc/footer.php"); ?>
