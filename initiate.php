<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the PHPMailer library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipient_email = $_POST['email'];
    $subject = 'Test Mailer';

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = '';//username here
        $mail->Password = '';//app password here/email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipient
        $mail->setFrom('wherefromemail', 'Justanyname');
        $mail->addAddress($recipient_email);

        // Content
        $mail->isHTML(true); // Set to true to send HTML content
        $mail->Subject = 'Mail Test';

        // HTML email template
        $emailTemplate = '
        <html> 
        
      </p><br><p>Hello User"</p>
      <br><br>
      </p><br><p>@User,</p>
      <br><p>This is a test email</p>
      <br>
      
<a href=""
style="background-color: #00A5EF; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;">Verify</a><br>

</html>
';

        $mail->msgHTML($emailTemplate);

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: send.php");
}
?>
