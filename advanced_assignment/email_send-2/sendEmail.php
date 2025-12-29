<?php
require 'emailSender.php';

// Create EmailSender object
$email = new EmailSender(
    'smtp.gmail.com',      // SMTP host
    'mathakiyainzamul43@gmail.com', // Your email
    '',    // App password
    587,                    // Port
    'tls'                   // Encryption
);

// Set sender
$email->setFrom('mathakiyainzamul43@gmail.com', 'inzamul');

// Add recipient
$email->addRecipient('mathakiyainzamul3@gmail.com', 'Recipient Name');

// Set subject and body
$email->setSubject('Test Email using OOP PHPMailer');
$email->setBody('<h1>Hello from OOP PHPMailer!</h1>', 'Hello from OOP PHPMailer!');

// Send email
if($email->send()) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
