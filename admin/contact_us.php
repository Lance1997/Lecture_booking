<!-- HEADER -->
<?php include 'includes/adminheader.php'; ?>


    <div id="wrapper">

      <!-- navbar -->
      <?php include 'includes/adminnavbar.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 cols-xs-12">
                      <h1 class="page-header">
                          Welcome
                          <small><?php echo $_SESSION['username'] ?></small>
                      </h1>

                      <!-- Blog Search Well -->
                      <div class="well">
                          <h4>Contact Information Search</h4>
                          <small>Type in the a keyword in contact content to view information in the table below.</small>
                          <form class="" action="contact_search.php" method="post">
                          <div class="input-group">
                              <input name="search" type="text" class="form-control">
                              <span class="input-group-btn">
                                  <button name="search_contact" class="btn btn-default" type="submit">
                                      <span class="glyphicon glyphicon-search"></span>
                              </button>
                              </span>
                          </div>
                        </form> <!-- search Form -->
                          <!-- /.input-group -->
                      </div>


                      <table class="table table-bordered table-hover table-responsive">

                        <thead>
                          <tr>
                            <th>Sender/Author</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php

                          $query = "SELECT * FROM contact";
                          $select_contact = mysqli_query($conn,$query);

                          while($row = mysqli_fetch_assoc($select_contact)) {
                            $contact_message = $row['contact_content'];
                            $contact_author = $row['contact_author'];
                            $contact_email = $row['contact_email'];
                            $contact_subject = $row['contact_subject'];
                            $contact_date = $row['contact_date'];
                            $contact_id = $row['contact_id'];

                            echo "<tr>";
                            echo "<td>{$contact_author}</td>";
                            echo "<td>{$contact_email}</td>";
                            echo "<td>{$contact_subject}</td>";
                            echo "<td>{$contact_message}</td>";
                            echo "<td>{$contact_date}</td>";
                            echo "<td><a href='contact_us.php?deleteContact={$contact_id}'>Delete</a> </td>";
                            echo "</tr>";
                          }


                           ?>


                        </tbody>
                      </table>


                      <?php

                        if(isset($_GET['deleteContact'])) {
                          $del_contact_id = $_GET['deleteContact'];

                          $query = "DELETE FROM contact WHERE contact_id = $del_contact_id";
                          $del_query = mysqli_query($conn,$query);
                          header('location: ./contact_us.php');
                          exit();
                        }

                       ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
