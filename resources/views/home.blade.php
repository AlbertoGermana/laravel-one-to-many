@extends('layouts.mainLayout')
@section('content')
<div class="home">
  <h1>Tasks attualmente attivi:</h1>
  @if (session('success'))
    <h5>{{session('success')}}</h5>
  @endif
  <form action="{{route('createTask')}}">
    <input class="create-button" type="submit" value="Crea" />
  </form>
  <div>
    <table>
      <tbody>
        @foreach ($tasks as $task)
          <tr>
            <td>{{$task["deadLine"]}}</td>
            <td>{{$task["name"]}}</td>
            <td>
              <form action="{{route('showTask', $task["id"])}}">
                <input class="show-button" type="submit" value="->" />
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
