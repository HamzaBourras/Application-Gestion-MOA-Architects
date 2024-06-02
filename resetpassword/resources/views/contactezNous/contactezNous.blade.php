<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <div>
        <div>
            <p style="font-weight: 600; font-size:16px;" > {{ $emailMessage }} </p>
        </div>
        <div>
            <p>
                <span style="font-weight: 600; margin-bottom:10px;" > {{ strtoupper($nom) . " ". strtoupper($prenom) }} </span> <br>
                <span> <span style="font-weight: 500" >Email : </span> {{ $email }} </span> <br>
                <span> <span style="font-weight: 500" >Telephone : </span> {{ $telephone }} </span>
            </p>
        </div>
    </div>
</body>
</html>