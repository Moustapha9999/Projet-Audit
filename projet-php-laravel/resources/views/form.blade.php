@extends('base')

@section('title', $title)


@section('content')
    <h1>{{ $title }}</h1>

    <form method="POST" action="{{ request()->route()->getName() === "etudiants.edit" ? route( 'etudiants.update', $etudiant) : route( 'etudiants.store') }}" class="row g-3 mt-1">
        @csrf
        @if(request()->route()->getName() === "etudiants.edit")
            @method('PUT')
        @endif

        <div class="col-md-8">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $etudiant->nom) }}" required>
            @error('nom')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $etudiant->date_naissance) }}" required>
            @error('date_naissance')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $etudiant->email) }}" aria-describedby="inputGroupPrepend" required>
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="faculte" class="form-label">Faculté</label>
            <select name="faculte" class="form-select" id="faculte" required>
                <option selected disabled value="">Choisir...</option>
                <option value="Sciences Informatiques" @if(old('faculte', $etudiant->faculte) === "Sciences Informatiques") {{ 'selected' }} @endif>Sciences Informatiques</option>
                <option value="Sciences Économiques" @if(old('faculte', $etudiant->faculte) === "Sciences Économiques") {{ 'selected' }} @endif>Sciences Économiques</option>
                <option value="Sciences Sociales" @if(old('faculte', $etudiant->faculte) === "Sciences Sociales") {{ 'selected' }} @endif>Sciences Sociales</option>
                <option value="École de Santé Publique" @if(old('faculte', $etudiant->faculte) === "École de Santé Publique") {{ 'selected' }} @endif>École de Santé Publique</option>
            </select>
            @error('faculte')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="promotion" class="form-label">Promotion</label>
            <select name="promotion" class="form-select" id="promotion" required>
                <option selected disabled value="">Choisir...</option>
                <option value="BAC-1" @if(old('promotion', $etudiant->promotion) === "BAC-1") {{ 'selected' }} @endif>Premier Bachelier</option>
                <option value="BAC-2" @if(old('promotion', $etudiant->promotion) === "BAC-2") {{ 'selected' }} @endif>Deuxième Bachelier</option>
                <option value="BAC-3" @if(old('promotion', $etudiant->promotion) === "BAC-3") {{ 'selected' }} @endif>Troisième Bachelier</option>
                <option value="BAC-4" @if(old('promotion', $etudiant->promotion) === "BAC-4") {{ 'selected' }} @endif>Quatrième Bachelier</option>
            </select>
            @error('promotion')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">
                @if(request()->route()->getName() === "etudiants.edit")
                    Modifier Étudiant
                @else
                    Créer Étudiant
                @endif
            </button>
        </div>
    </form>
@endsection
