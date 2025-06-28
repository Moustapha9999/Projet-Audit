@extends('base')

@section('title', $title)

@section('content')
    <h1>Liste des Étudiants</h1>

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de Naissance</th>
            <th>Faculté</th>
            <th>Promotion</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de Naissance</th>
            <th>Faculté</th>
            <th>Promotion</th>
            <th colspan="2">Actions</th>
        </tr>
        </tfoot>
        <tbody>
        @php $i = 1 @endphp
        @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>{{ $etudiant->date_naissance }}</td>
                <td>{{ $etudiant->faculte }}</td>
                <td>{{ $etudiant->promotion }}</td>
                <td><a role="button" class="btn btn-warning btn-sm" href="{{ route('etudiants.edit', $etudiant) }}">Modifier</a></td>
                <td>
                    <form method="POST" action="{{ route('etudiants.destroy', $etudiant) }}">
                        @csrf
                        @method('DELETE')
                        <button
                            onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')"
                            type="submit"
                            class="btn btn-danger btn-sm">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
