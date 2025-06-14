<?php
// PHP code to process the form submission and send an email

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve data from the POST request
    // Using htmlspecialchars to prevent XSS attacks when displaying data later
    $name = htmlspecialchars($_POST['name']);
    $visitor_email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Define the email address that the email will appear to come from.
    // IMPORTANT: For production, this should ideally be an email address
    // on your server's domain to prevent emails from being flagged as spam.
    // Replace 'your-website@example.com' with an actual email from your domain.
    $email_from = 'noreply@yourappdomain.com'; // <--- CHANGE THIS to a valid email on your server's domain

    // Define the subject line for the email
    $email_subject = 'New Message from Vacation Spots Contact Form';

    // Construct the email body with the collected data
    // Using .= for concatenation is safer than direct interpolation for multiline strings
    $email_body = "Name: $name\n";
    $email_body .= "Email: $visitor_email\n";
    $email_body .= "Message:\n$message\n";

    // Define the recipient email address
    $to = "Stella.Namude@gmail.com"; // Your recipient email address

    // Build the email headers
    // Using .= to append headers correctly
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    $headers .= "MIME-Version: 1.0\r\n"; // Standard for email clients
    $headers .= "Content-type: text/plain; charset=utf-8\r\n"; // Specify content type and character set

    // Send the email
    $mail_sent = mail($to, $email_subject, $email_body, $headers);

    // Optional: Add logging or error handling for debugging
    if ($mail_sent) {
        // Email sent successfully, redirect to a success page
        header("Location: VacationSpotsST.html?status=success"); // Added status parameter
        exit(); // Always exit after a header redirect
    } else {
        // Email failed to send, redirect to an error page or show an error
        header("Location: VacationSpotsST.html?status=error"); // Added status parameter
        exit(); // Always exit after a header redirect
    }

} else {
    // If accessed directly without POST data, redirect to the form page
    header("Location: VacationSpotsST.html");
    exit();
}
?>
