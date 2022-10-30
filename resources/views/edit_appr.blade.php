@extends('base')

@section('style-link')
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <h1>Modifier Apprenant</h1>
    <form action="{{ route('update_appr', ['id_appr' => $data[0]->id_appr]) }}" method="POST">
        {{ csrf_field() }}
        <label><span>Nom: </span><input type="text" name="nom" value="{{ $data[0]->nom_appr }}"></label>
        <label><span>Prenom: </span><input type="text" name="prenom" value="{{ $data[0]->prenom }}"></label>
        <label><span>Email: </span><input type="text" name="email" value="{{ $data[0]->email }}"></label>
        <label><span>Promotion: </span>
            <select name="id_promo">
                @foreach ($prom as $row)
                    <option @if ($row->id == $data[0]->id_prom) selected @endif value="{{ $row->id }}">
                        {{ $row->nom }}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" name="submit">
    </form>
@endsection
