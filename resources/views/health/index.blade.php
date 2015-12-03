<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health</title>
</head>
<body>
<form method="post" action="/individual/health/daily">
    {!! csrf_field() !!}
    <input type="file" name="daily_health_data">
    <input type="submit">
</form>
</body>
</html>
