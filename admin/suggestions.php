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
                          <h4>Suggestion Search</h4>
                          <small>Type in a keyword for suggestions to view information in the table below.</small>
                          <form class="" action="suggestion_search.php" method="post">
                          <div class="input-group">
                              <input name="search" type="text" class="form-control">
                              <span class="input-group-btn">
                                  <button name="search_suggestion" class="btn btn-default" type="submit">
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
                            <th>Message</th>
                            <th>Date</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php

                          $query = "SELECT * FROM suggestions";
                          $select_suggestions = mysqli_query($conn,$query);

                          while($row = mysqli_fetch_assoc($select_suggestions)) {
                            $suggestion_message = $row['suggestion_message'];
                            $suggestion_date = $row['suggestion_date'];
                            $suggestion_id = $row['suggestion_id'];

                            echo "<tr>";
                            echo "<td>{$suggestion_message}</td>";
                            echo "<td>{$suggestion_date}</td>";
                            echo "<td><a href='suggestions.php?deleteSuggestion={$suggestion_id}'>Delete</a> </td>";
                            echo "</tr>";
                          }


                           ?>


                        </tbody>
                      </table>


                      <?php

                        if(isset($_GET['deleteSuggestion'])) {
                          $del_suggestion_id = $_GET['deleteSuggestion'];

                          $query = "DELETE FROM suggestions WHERE suggestion_id = $del_suggestion_id";
                          $del_query = mysqli_query($conn,$query);

                          header('location: ./suggestions.php');
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
