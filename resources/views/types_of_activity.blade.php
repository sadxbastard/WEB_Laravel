<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style>
        .button {
            display: inline-block;
            background-color: #000;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* При наведении курсора на кнопку */
        .button:hover {
            background-color: #9ca3af;
        }
    </style>
</head>
<body>
    <h2>Список видов активностей:</h2>
    <table border="1">
        <thead>
        <td>id</td>
        <td>Имя</td>
        <td>Название вида активности</td>
        <td>Максимальный балл</td>
        <td>Действия</td>
        </thead>
        @foreach($types_of_activity as $type_of_activity)
            <tr>
                <td>{{$type_of_activity->id}}</td>
                <td>{{$type_of_activity->user->name}}</td>
                <td>{{$type_of_activity->activity_name}}</td>
                <td>{{$type_of_activity->maximum_score}}</td>
                <td>
                    <a href="{{url('type_of_activity/destroy/'.$type_of_activity->id)}}">Удалить</a>
                    <a href="{{url('type_of_activity/edit/'.$type_of_activity->id)}}">Редактировать</a>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    {{ $types_of_activity->links() }}
    <br>
    <a href="type_of_activity/create" class="button">Создать</a>
</body>
</html>
