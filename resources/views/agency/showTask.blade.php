@extends('layouts.mainLayout')
@section('content')
<div class="task">
  <h1>Task selezionato:</h1>
  @if (session('success'))
    <h5>{{session('success')}}</h5>
  @endif
  <ul>
    <li><b>Scadenza:</b> {{$task['deadLine']}}</li>
    <li><b>Task:</b> {{$task['name']}}</li>
    <li><b>Descrizione:</b> {{$task['description']}}</li>
    <li>--------------------------------------------</li>
    <li><b>Dipendente:</b> {{$task -> employee -> firstName}} {{$task -> employee -> lastName}}</li>
    <li>
      <ul>
    @foreach ($task -> employee -> locations as $location)
        <li>
          Stato: {{$location -> state}}, Città: {{$location -> city}}, Via: {{$location -> street}}
        </li>
    @endforeach</li>
  </ul>
  </ul>
  <div class="buttons">
    <form action="{{route('home')}}" method="get">
      <input class="show-button" type="submit" value="<-">
    </form>
    <form action="{{route('editTask',$task['id'])}}" method="get">
      <input class="edit-button" type="submit" value="Modifica">
    </form>
    <form action="{{route('deleteTask',$task['id'])}}" method="get">
      <input class="delete-button" type="submit" value="Elimina">
    </form>
  </div>
</div>

@endsection
