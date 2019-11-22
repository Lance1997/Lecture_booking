

<table class="table table-bordered table-hover table-responsive">

  <thead>
    <tr>
      <th>Course Rep ID</th>
      <th>Coure Rep Email</th>
      <th>Course Rep Username</th>
    </tr>
  </thead>

  <tbody>

    <?php

$query = "SELECT * FROM users WHERE rep_role = {$_SESSION['id']}";
    $select_users = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_users)) {
      $id = $row['id'];
      $user_id = $row['userid'];
      $user_email = $row['email'];
      $user_name = $row['username'];

      echo "<tr>";
      echo "<td>{$user_id}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td>{$user_name}</td>";
      echo "<td><a href='users.php?users=edit_user&u_id={$id}'>Edit</a> </td>";
      echo "<td><a href='users.php?deleteRep={$id}'>Delete</a> </td>";
      echo "</tr>";
    }


     ?>


  </tbody>
</table>


<?php

  if(isset($_GET['deleteRep'])) {
    $del_user_id = $_GET['deleteRep'];

    $query = "DELETE FROM users WHERE id = '{$del_user_id}'";
    $del_query = mysqli_query($conn,$query);

  }

 ?>
