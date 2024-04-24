@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">
        <form method="post" action={{url('type_of_activity')}}>
            @csrf
            <div class="mb-3">
                <label for="activity_name" class="form-label">Название</label>
                <input type="text" class="form-control @error('activity_name') is-invalid @enderror"
                    id="activity_name" name="activity_name" aria-describedby="activity_nameHelp" value={{old('activity_name')}}>
                <div id="activity_nameHelp" class="form-text">*Введите название вида активности</div>
                @error('activity_name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="maximum_score" class="form-label">Максимальный балл</label>
                <input type="text" class="form-control @error('maximum_score') is-invalid @enderror"
                    id="maximum_score" name="maximum_score" aria-describedby="maximum_scoreHelp" value={{old('maximum_score')}}>
                <div id="maximum_scoreHelp" class="form-text">*Введите максимальный балл вида активности</div>
                @error('maximum_score')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user" class="form-label">Персона</label>
                <select class="form-select" id="user" name="user_id" aria-describedby="userHelp" value={{old('user_id')}}>
                    @foreach($users as $user)
                        <option value="{{$user->id}}"
                            @if(old('user_id') == $user->id) selected
                            @endif>{{$user->name}}
                        </option>
                    @endforeach
                </select>
                <div id="userHelp" class="form-text">Выберите персону</div>
                @error('user_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
