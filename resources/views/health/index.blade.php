<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health</title>
</head>
<body>
<form name="daily" method="post" action="/health/daily" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="file" name="daily_health_data">
    <input type="submit" name="submit">
</form>
</body>
</html>
