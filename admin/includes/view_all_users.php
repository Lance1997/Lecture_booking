

<table class="table table-bordered table-hover table-responsive">

  <thead>
    <tr>
      <th>User ID</th>
      <th>User Email</th>
      <th>Username</th>
      <th>User Role</th>
      <th>User Preferred Role</th>
      <th>Verified</th>
    </tr>
  </thead>

  <tbody>

    <?php

    $query = "SELECT * FROM users";
    $select_users = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_users)) {
      $id = $row['id'];
      $user_id = $row['userid'];
      $user_email = $row['email'];
      $user_name = $row['username'];
      $user_role = $row['userrole'];
      $user_preRole = $row['preRole'];
      $verified = $row['verified'];

      echo "<tr>";
      echo "<td>{$user_id}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td>{$user_name}</td>";
      echo "<td>{$user_role} </td>";
      echo "<td>{$user_preRole} </td>";
      echo "<td>{$verified} </td>";
      echo "<td><a href='users.php?users=edit_user&u_id={$id}'>Edit</a> </td>";
      echo "<td><a href='users.php?deleteUser={$id}'>Delete</a> </td>";
      echo "</tr>";
    }


     ?>


  </tbody>
</table>


<?php

  if(isset($_GET['deleteUser'])) {
    $del_user_id = $_GET['deleteUser'];

    $query = "DELETE FROM users WHERE id = '{$del_user_id}'";
    $del_query = mysqli_query($conn,$query);

  }

 ?>
