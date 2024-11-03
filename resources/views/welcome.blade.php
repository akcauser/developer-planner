<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer Planner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @foreach($solutions as $key => $solution)
    <h1></h1>
    <table class="table table-hover text-center table-bordered">
        <tr class="table-success">
            <th colspan="2">
                {{ $key }} <br>
                <strong>Elapsed Time:</strong> {{ $solution['elapsedTime'] }} hours 
                --
                <strong>Elapsed Time:</strong> {{ ceil($solution['elapsedTime'] / 45)  }} week(s)
            </th>
        </tr>
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
    @endforeach
</body>
</html>
