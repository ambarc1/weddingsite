<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$numberAttending = htmlspecialchars($_POST['numberAttending']);
$children = htmlspecialchars($_POST['children']);
$dietaryRest = htmlspecialchars($_POST['dietaryRest']);
$disab = htmlspecialchars($_POST['disab']);
$songRequest = htmlspecialchars($_POST['songRequest']);
$funFact = htmlspecialchars($_POST['funFact']);
$advice = htmlspecialchars($_POST['advice']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if ($children === 'Yes') {
    $childResponse = "Yes";
} else {
    $childResponse = "No";
}

// ==================================================
// Adds Responses to CSV File
// ==================================================
$file = 'rsvp_responses.csv';
$fp = fopen($file, 'a');

fputcsv($fp, [
    date('Y-m-d H:i:s'),
    $firstName,
    $lastName,
    $numberAttending,
    $children,
    $dietaryRest,
    $disab,
    $songRequest,
    $funFact,
    $advice,
    $email
]);
fclose($fp);

try {
// ==================================================
// Email to Host
// ==================================================
$hostmail = new PHPMailer(true);

$hostmail->isSMTP();

$hostmail->Host = 'ganttwedding.com';
$hostmail->SMTPAuth = true;
$hostmail->Username = 'rsvp_noreply@ganttwedding.com';
$hostmail->Password = 'TankaJahari';
$hostmail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$hostmail->Port = 587;

$hostmail->setFrom('rsvp_noreply@ganttwedding.com', 'The Gantt Wedding');
$hostmail->addAddress('nicola.barclift@gmail.com');
$hostmail->addAddress('dragonzkiller@gmail.com');

$hostmail->isHTML(true);
$hostmail->Subject = 'New RSVP Submission';

$hostmail->Body = "
        <h2>New RSVP Received! Guest details are below.</h2>
        <p><strong>First Name:</strong> {$firstName}</p>
        <p><strong>Last Name:</strong> {$lastName}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Number of Attendees:</strong> {$numberAttending}</p>
        <p><strong>Children Under 10 Attending?:</strong> {$childResponse}</p>
        <p><strong>Dietary Restrictions:</strong> {$dietaryRest}</p>
        <p><strong>Physical Limitations or Disabilities:</strong> {$disab}</p>
        <p><strong>Song Request:</strong> {$songRequest}</p>
        <p><strong>Fun Fact:</strong> {$funFact}</p>
        <p><strong>A Piece of Advice:</strong> {$advice}</p>
    ";

$hostmail->send();

// ==================================================
// Confirmation Email to Guest
// ==================================================
$guestmail = new PHPMailer(true);

$guestmail->isSMTP();

$guestmail->Host = 'ganttwedding.com';
$guestmail->SMTPAuth = true;
$guestmail->Username = 'rsvp_noreply@ganttwedding.com';
$guestmail->Password = 'TankaJahari';
$guestmail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$guestmail->Port = 587;

$guestmail->setFrom('rsvp_noreply@ganttwedding.com', 'The Gantt Wedding');
    $guestmail->addAddress($email, $firstName);

    $guestmail->isHTML(true);
    $guestmail->Subject = 'RSVP Confirmation';

    $guestmail->Body = "
        <h2>Thank you for your RSVP!</h2>
        <p>Hello {$firstName},</p>
        <p>We have received your RSVP response. Your submission details are below.</p>
        <p><strong>First Name:</strong> {$firstName}</p>
        <p><strong>Last Name:</strong> {$lastName}</p>
        <p><strong>Number of Attendees:</strong> {$numberAttending}</p>
        <p><strong>Children Under 10 Attending?:</strong> {$childResponse}</p>
        <p><strong>Dietary Restrictions:</strong> {$dietaryRest}</p>
        <p><strong>Physical Limitations or Disabilities:</strong> {$disab}</p>
        <p>Thank you so much for your support. We look forward to celebrating 
        with you! As a reminder, the wedding will be held on October 17 at Rose 
        Hill Manor in Leesburg, VA</p>
    ";
    $guestmail->send();
    echo "RSVP submitted successfully.";
} 

catch (Exception $e) {
    echo "Message could not be sent. Error: {$hostmail->ErrorInfo}";
}

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
            <p class="lead" style="color: white">You will receive an email confirmation shortly. We look forward to seeing you on the big day. Click <a class="link-light text-decoration-none" 
            href="/index.html" style="color: rgb(119, 165, 148);">Here </a>to return to the Home Page.</p><br>
        </div>

</body>
<script src="/countdown.js"></script>

</html>