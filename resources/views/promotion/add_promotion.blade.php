@extends('base')

@section('content')
<h1>Ajouter Promotion</h1>
    <form action="{{ route('insert-promotion') }}" method="POST">
        {{ csrf_field() }}
        <label>Nom: <input type="text" name="nom"></label>
        <input type="submit" name="add_promotion">
    </form>
@endsection
