<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Save Tweets</title>
</head>
<body>
    <h1>Save Tweets</h1>
    <form action="{{route('tweet.save')}}" method="POST">
        {{ csrf_field() }}
        <label for="account">Account</label>
        <input type="text" name="account">
        <label for="tweet">Tweet</label>
        <textarea name="tweet" id="tweet" cols="30" rows="10"></textarea>
        <label for="date"></label>
        <input type="date" name="tweeted_at" id="">
        <input type="submit" value="Guardar" class="btn btn-primary">
       
    </form>
</body>
</html>