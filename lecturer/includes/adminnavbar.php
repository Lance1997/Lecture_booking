<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Lecturer</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li><a href="../index.php">Homepage</a> </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li>
                  <a href="index.php?logout=1"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
              </li>
              <li class="divider"></li>
              <li>
                  <a href="./change_password.php"><i class="fa fa-fw fa-power-off"></i> Change Password</a>
              </li>
          </ul>
      </li>
    </ul>



    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i class="fa fa-fw fa-arrows-v"></i> My Courses <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="post_dropdown" class="collapse">
                    <li>
                        <a href="./courses.php">Add a Course</a>
                    </li>
                    <li>
                        <a href="./courses.php?source=view_all_courses">View my timetable</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-user"></i> My Course Reps <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users_dropdown" class="collapse">
                    <li>
                        <a href="./users.php">View My Course Reps</a>
                    </li>
                    <li>
                        <a href="users.php?users=add_user">Add Course Reps</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./venues_index.php"><i class="fa fa-building"></i>  View Main timetable</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->


</nav>
