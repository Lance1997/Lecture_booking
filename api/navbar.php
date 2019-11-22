 <!-- Main Navigation -->
 <nav class="navbar fixed-top navbar-dark bg-dark navbar-expand-lg mynavbar">
          <div class="container">
          <!-- Navbar Brand -->
          <a class="navbar-brand" href="#">
            <img src="/lecture_2/img/new_logo.png" alt="ucc logo" id="logo-img"><span id="logo-header">LECTURE BOOKING</span>
          </a>
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navigation links -->
            <ul class="navbar-nav mr-auto" id="nav-items">
              <li class="nav-item">
                <a class="nav-link" href="/lecture_2/index.php">Home<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/lecture_2/contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/lecture_2/faq.php">FAQ</a>
              </li>
              <!-- Register Button -->
              <?php  if(!isset($_SESSION['userrole'])) {
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' href='/lecture_2/register.php'>Register</a>";
                  echo "</li>";
              }
               ?>

               <!-- User Logged In Button -->
               <?php  if(isset($_SESSION['userrole'])) {
                  if($_SESSION['userrole']== 'student') {
                    echo " ";
                  }else {

                   echo "<li class='nav-item'>";
                   echo "<a class='nav-link bg-primary' style='border-radius: 5px;' href='/lecture_2/{$_SESSION['userrole']}'>{$_SESSION['userrole']}</a>";
                   echo "</li>";
                  }
               }
                ?>

                 <!-- Login Button -->
                 <?php  if(!isset($_SESSION['userrole'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='/lecture_2/login.php'>Login</a>";
                    echo "</li>";                 
                    } elseif($_SESSION['userrole'] == 'student'|| $_SESSION['userrole']=='course_rep') {
                        echo '';
                    } else {
                      echo "<li class='nav-item'>";
                      echo "<a class='btn btn-danger logout text-white nav-link' href='index.php?logout=1'>Logout</a>";
                      echo "</li>";  
                 }
                  ?>

               
            </ul>
          </div>



            </div>
          </div>
    </nav>
    <!-- End of Main Navigation -->
