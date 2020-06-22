@extends('layouts.mainLayout')
@section('content')
<div class="cagnolino">
  <h1>Modifica dati del cagnolino:</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors -> all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="" action="{{route('updateCagnolino',$cagnolino['id'])}}" method="post">
    @csrf
    @method('post')
    <ul>
      <li><b>Nome:</b><input type="text" name="nome" value="{{old("nome",$cagnolino['nome'])}}"></li>
      <li><b>Tipo:</b><input type="text" name="tipo" value="{{old("tipo",$cagnolino['tipo'])}}"></li>
      <li><b>Altezza:</b><input type="text" name="altezza" value="{{old("tipo",$cagnolino['altezza'])}}"></li>
      <li><b>Peso:</b><input type="text" name="peso" value="{{old("tipo",$cagnolino['peso'])}}"></li>
    </ul>
    <button type="submit" name="submit">Modifica</button>
  </form>
</div>

@endsection
