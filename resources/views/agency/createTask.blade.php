@extends('layouts.mainLayout')
@section('content')
<div class="task">
  <h1>Aggiungi un task:</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors -> all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="" action="{{route('storeTask')}}" method="post">
    @csrf
    @method('post')
    <ul>
      <li><b>Nome:</b><input type="text" name="name" value="{{old('name')}}"></li>
      <li><b>Descrizione:</b><input type="text" name="description" value="{{old('description')}}"></li>
      <li><b>Scadenza:</b><input type="text" name="deadLine" value="{{old('deadLine')}}"></li>
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
    <button type="submit" name="submit">Crea!</button>
</form>

</div>

@endsection
