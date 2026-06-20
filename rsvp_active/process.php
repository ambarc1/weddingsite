<?php

$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$numberAttending = htmlspecialchars($_POST['numberAttending']);
$childrenY = htmlspecialchars($_POST['childrenY']);
$childrenN = htmlspecialchars($_POST['childrenN']);
$dietaryRest = htmlspecialchars($_POST['dietaryRest']);
$disab = htmlspecialchars($_POST['disab']);
$songRequest = htmlspecialchars($_POST['songRequest']);
$funFact = htmlspecialchars($_POST['funFact']);
$advice = htmlspecialchars($_POST['advice']);
$email = filter_var($_POST['email']);


$hostEmail = "rsvp_noreply@ganttwedding.com";

/* Notification to you */
$subject = "New RSVP from $firstName $lastName";

$message = "
Name: $firstName $lastName

Email: $email

Attending: $numberAttending

Bringing Children: $childrenY
Not Bringing Children: $childrenN

Dietary Restrictions: $dietaryRest

Physical Limitations or Disabilities: $disab

Song Request: $songRequest

Fun Fact: $funFact

A Piece of Advice: $advice

";

$headers = "From: $hostEmail";

mail($hostEmail, $subject, $message, $headers);

/* Confirmation to guest */
$guestSubject = "Your RSVP Confirmation";

$guestMessage = "
Hello $firtName,

Thank you for your RSVP.

Name: $firstName $lastName

Number of guests: $numberAttending

Dietary Restrictions: $dietaryRest

Physical Limitations or Disabilities: $disab

We look forward to seeing you on October 17 at Rose Hill Manor!
";

mail($email, $guestSubject, $guestMessage, $headers);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>Ashley & Bryan's Wedding</title>
    <link rel="icon" href="/images/icons_logos/roses1.png">
    <link rel="stylesheet" href="/title_format.css">
</head>

<body class="interior">
    <header class="masthead mb-auto" data-bs-theme="dark">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="/images/icons_logos/AB2.png" style="height: auto; width: 40px;"></a>
                <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/index.html ">Home </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/our_story_photos.html">Our Story & Photos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/rsvp.html">RSVP </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/donate.html">Honeymoon Fund </a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Additional Info
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/timeline_of_events.html">Timeline of Events</a>
                                <a class="dropdown-item" href="/about_the_venue.html">About the Venue </a>
                                <a class="dropdown-item" href="/dress_code.html">Dress Code </a>
                                <a class="dropdown-item" href="/qna.html">Q & A </a>
                    </ul>
                </div>
                <div style="color: rgb(119, 165, 148); padding-right: 20px;">
                    <script src="/countdown.js"></script> <span id="demo"></span> <span>Until We Tie the Knot! </span>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>

        <div class="d-flex" style="flex-direction: column; text-align: center; align-items: center">
            <img class="png-min-rsvp" src="/images/titles/rsvp.png"
                style="width: 100%; height: auto;" id="rsvp">
            <h1 class="display-6" style="color: white"><i>Thank You for Your Confirmation!</i></h1>
            <p class="lead" style="color: white">We look forward to seeing you on the big day. Click <a class="link-light text-decoration-none" 
            href="/index.html" style="color: rgb(119, 165, 148);">Here </a>to return to the Home Page.</p><br>
        </div>

</body>
<script src="/countdown.js"></script>

</html>