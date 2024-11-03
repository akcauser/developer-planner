<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer Planner</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    @foreach($solutions as $key => $solution)
    <h1>{{ $key }}</h1>
    <table>
        <tr>
            <th>Developer</th>
            <th>Tasks</th>
        </tr>
        @foreach($solution['developers'] as $key => $developer)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ implode(',', $developer['tasks']) }}</td>
            </tr>
        @endforeach

    </table>
    <br>
    <b>Elapsed Time:</b> {{ $solution['elapsedTime'] }} hours
    <br>
    <b>Elapsed Time:</b> {{ ceil($solution['elapsedTime'] / 45)  }} week(s)
    @endforeach
</body>
</html>
