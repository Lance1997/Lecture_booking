
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
                  if(isset($_POST['search_suggestion'])) {
                      $search = $_POST['search'];

                      $query = "SELECT * FROM suggestions WHERE suggestion_message LIKE '%$search%'";

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
                              <th>Message</th>
                              <th>Date</th>
                            </tr>
                          </thead>

                          <tbody>


                        <?php

                          while($row = mysqli_fetch_assoc($search_query)) {
                            $suggestion_message = $row['suggestion_message'];
                            $suggestion_date = $row['suggestion_date'];
                            $suggestion_id = $row['suggestion_id'];

                            echo "<tr>";
                            echo "<td>{$suggestion_message}</td>";
                            echo "<td>{$suggestion_date}</td>";
                            echo "<td><a href='suggestions.php?deleteSuggestion={$suggestion_id}'>Delete</a> </td>";
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
