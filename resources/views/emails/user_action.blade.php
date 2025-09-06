<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User {{ ucfirst($action) }}</title>
</head>
<body>
  <h2>User Action Notification</h2>
<p><strong>User:</strong> {{ $username }} ({{ $email }})</p>
<p><strong>Action:</strong> {{ ucfirst($action) }}</p>
<p>Time: {{ now() }}</p>

</body>
</html>
