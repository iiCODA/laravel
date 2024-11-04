<!-- resources/views/validate-user.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate User</title>
</head>

<body>
    <form action="{{ route('validateUser') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
