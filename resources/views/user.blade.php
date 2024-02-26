<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
    <h2>{{$user ? "Список видов активности персоны: ".$user->name : "Неверный ID персоны"}}</h2>
    @if($user)
    <table border="1">
        <thead>
        <td>id</td>
        <td>Название</td>
        <td>Максимальный балл</td>
        </thead>
        @foreach($user->types_of_activity as $type_of_activity)
            <tr>
                <td>{{$type_of_activity->id}}</td>
                <td>{{$type_of_activity->activity_name}}</td>
                <td>{{$type_of_activity->maximum_score}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
