<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>



<main>
    <section>
      <div class="container" style="margin-bottom:50px;">
        <br />
        <br />
        <br />

        <h1>FREQUENTLY ASKED QUESTIONS</h1>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            This section contains a wealth of information, related to <strong>Lectue Booking.com</strong> and its services. If you cannot find an answer to your question,
            make sure to <a href='contact.php'>contact us</a> or <a href='index.php#contact'>locate/call </a> us.
        </div>

        <br />

        <div class="" id="accordion">
            <div class="faqHeader">General questions</div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="card-block">
                        <strong>No. </strong>Account registration at <strong>LectureBooking.com</strong> is only for Security Guards, Lecturers and Association Executives.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I make changes to the timetable?</a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="card-block">
                        <strong>Yes and No. </strong>. Only Administrators of site and certain users(Lecturers and Association Executives) of the site can make changes to the timetable.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is responsible for updating the timetable?</a>
                    </h4>
                </div>
                <div id="collapseEleven" class="panel-collapse collapse">
                    <div class="card-block">
                        <strong>Administrators</strong> of the site are responsible for updating the timetable at the beginning of each academic year. Further updates will be based on certain users preferences and activities on the site(Lecturers and Association Executives).
                    </div>
                </div>
            </div>

            <div class="faqHeader">Venue Booking</div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who can book a venue?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="card-block">
                        <strong>Administrators and Association executives can book a venue.</strong>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Who can edit a booked venue?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="card-block">
                        <strong>Lecturers, Administrators and Association Executives </strong>can edit a booked venue, change associated time and day.
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">As a Security Guard, can I book a venue?</a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="card-block">
                        <strong>No. </strong>. Security guards can login after successful registration to only view the purpose of a booked or occupied lecture venue.
                    </div>
                </div>
            </div>

            <div class="faqHeader">Registration and Logging In</div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">How do I register?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="card-block">
                        The steps involved in this process is really simple. All you need to do is:
                        <ul>
                            <li>Click on register.</li>
                            <li>Check your mail for link to activate your account.</li>
                            <li>Then you wait for or <a href='index.php#contact'>contact</a> admin to verify your identity. <small>This step is required to help administrators ensure that only authorized users(Administrators,Lecturers,Association Executives and Security Guards) are allowed to access the members page.</small> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-header">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How do I login?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="card-block">
                        Click on <i>Login As</i> on the navigation and choose your role to login.
                    </div>
                </div>
            </div>

        </div>
    </div>

    </section>
</main>


<!-- footer -->
<?php include 'api/short_footer.php'; ?>





<!-- SCRIPTS -->
<!-- JQuery -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips popper -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- My custom JavaScript -->
<script src="assets/js/main.js"></script>
</body>
</html>
