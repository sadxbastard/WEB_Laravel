<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
    <style> .is-invalid {color: red;} </style>
</head>
<body>
<h2>Редактирование вида активности</h2>
<form method="post" action="{{url('type_of_activity/update/' .$type_of_activity->id)}}">
    @csrf
    <label>Название</label>
    <input type="text" name="activity_name" value="@if (old('activity_name')) {{old('activity_name')}} @else {{$type_of_activity->activity_name}} @endif"/>
    @error('activity_name')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br><br>
    <label>Максимальный балл</label>
    <input type="text" name="maximum_score" value="@if (old('maximum_score')) {{old('maximum_score')}} @else {{$type_of_activity->maximum_score}} @endif"/>
    @error('maximum_score')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br><br>
    <label>Персоны:</label>
    <select name="user_id" value="{{old('user_id')}}">
        @foreach($users as $user)
            <option value="{{$user->id}}"
                @if(old('user_id'))
                    @if(old('user_id') == $user->id) selected @endif
                @else
                    @if($type_of_activity->user_id == $user->id) selected @endif
                @endif>{{$user->name}}
            </option>
        @endforeach
    </select>
    @error('user_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br><br>
    <input type="submit">
</form>
</body>
</html>
