<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment-received</title>
</head>

<body>
    <h2>New Appointment</h2>
    <p><strong>Name:</strong> {{ $data['full_name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Date:</strong> {{ $data['date'] }}</p>
    <p><strong>Time:</strong> {{ $data['time'] }}</p>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>
</body>

</html>
