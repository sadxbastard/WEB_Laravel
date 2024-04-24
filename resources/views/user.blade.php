@extends('layout')
@section('content')
<h2>{{$user ? "Мои виды активностей ": "Неверный ID персоны"}}</h2>
@if($user)
<table border="1">
    <thead>
    <td>id</td>
    <td>Имя</td>
    <td>Название вида активности</td>
    <td>Максимальный балл</td>
    <td>Действия</td>
    </thead>
    @foreach($user->types_of_activity as $type_of_activity)
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
@if($user->types_of_activity instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $user->types_of_activity->links() }}
@endif
@endif
@endsection
