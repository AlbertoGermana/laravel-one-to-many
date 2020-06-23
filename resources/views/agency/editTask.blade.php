@extends('layouts.mainLayout')
@section('content')
<div class="task">
  <h1>Modifica task:</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors -> all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="" action="{{route('updateTask', $task['id'])}}" method="post">
    @csrf
    @method('POST')
    <ul>
      <li><b>Scadenza:</b><input type="text" name="deadLine" value="{{old('deadLine', $task['deadLine'])}}"></li>
      <li><b>Nome:</b><input type="text" name="name" value="{{old('name', $task['name'])}}"></li>
      <li><b>Descrizione:</b><input type="text" name="description" value="{{old('description', $task['description'])}}"></li>
      <li>--------------------------------------------</li>
      <li>
        <select name="employee_id">
          @foreach ($employees as $employee)
            <option value="{{$employee['id']}}">
              {{$employee['firstName']}}
              {{$employee['lastName']}}
            </option>
          @endforeach
        </select>
      </li>
    </ul>
    <button type="submit" name="submit">Modifica!</button>
</form>

</div>

@endsection
