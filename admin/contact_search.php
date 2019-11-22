
<!-- Header -->
<?php include 'includes/adminheader.php'?>

<!-- Navbar -->
<?php include 'includes/adminnavbar.php'?>


<div id="wrapper">

    <div id="page-wrapper">
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-lg-12 cols-xs-1">
                <h1>SEARCH RESULTS</h1>

              <?php
                  if(isset($_POST['search_contact'])) {
                      $search = $_POST['search'];

                      $query = "SELECT * FROM contact WHERE contact_content LIKE '%$search%'";

                      $search_query = mysqli_query($conn,$query);

                      if(!$search_query) {
                        die("QUERY FAILED" . mysqli_error($search_query));
                      }

                      $count = mysqli_num_rows($search_query);

                      if($count == 0) {
                        echo "<h2> No Results </h2>";
                      }
                      else {
                        ?>

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

                          while($row = mysqli_fetch_assoc($search_query)) {
                            $contact_message = $row['contact_content'];
                            $contact_author = $row['contact_author'];
                            $contact_email = $row['contact_email'];
                            $contact_date = $row['contact_date'];
                            $contact_subject = $row['contact_subject'];
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

                      }
                    }


               ?>
             </tbody>
           </table>



            </div>
          </div>
        </div>
      </div>
    </div>

            <!-- Navbar -->
            <?php include 'includes/adminfooter.php'?>
