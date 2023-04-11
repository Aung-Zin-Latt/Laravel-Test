<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Email</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <p>Thank you for submitting the contact form. Below are the details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $data->name }}</li>
        <li><strong>Phone Number:</strong> {{ $data->phone_number }}</li>
        <li><strong>Date of Birth:</strong> {{ $data->date_of_birth }}</li>
        <li><strong>Gender:</strong> {{ $data->gender }}</li>
    </ul>
    <p>Thank you for your submission.</p>
</body>
</html>



