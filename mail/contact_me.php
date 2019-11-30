<?php
// Check for empty fields
if(
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['streetAddress']) ||
    empty($_POST['city']) ||
    empty($_POST['postcode']) ||
    empty($_POST['state']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
  ) {
  http_response_code(500);
  exit();
}

$firstName = strip_tags(htmlspecialchars($_POST['firstName']));
$lastName = strip_tags(htmlspecialchars($_POST['lastName']));
$streetAddress = strip_tags(htmlspecialchars($_POST['streetAddress']));
$city = strip_tags(htmlspecialchars($_POST['city']));
$postcode = strip_tags(htmlspecialchars($_POST['postcode']));
$state = strip_tags(htmlspecialchars($_POST['state']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$refNum = time() . rand(10*45, 100*98);


// Create the email and send the message
$to = "billboardk.aus@gmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Pre-oder Form: $firstName" . " " . "$lastName";
$body = "You have received a new pre-order from your website pre-order form.\n\n".
        "Here are the details (Order Ref# $refNum):\n\n
        Name: $firstName" . " " . "$lastName\n\n
        Email: $email\n\n
        Phone: $phone\n\n
        Street Address: $streetAddress\n\n
        City: $city \n\n
        Postal Code: $postcode \n\n
        State: $state \n\n
        Message:\n$message";
$header = "From: noreply@billboardkorea.com.au\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
