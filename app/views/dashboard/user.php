<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">User Dashboard</h1>
        <p class="mb-4">Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
    </div>
</body>
</html>