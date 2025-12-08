<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nom du niveau <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name', $niveau->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Filière <span class="text-danger">*</span></label>
        <select name="filiere_id" class="form-select @error('filiere_id') is-invalid @enderror" required>
            <option value="">-- Choisir une filière --</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}"
                    {{ old('filiere_id', $niveau->filiere_id ?? '') == $filiere->id ? 'selected' : '' }}>
                    {{ $filiere->name }}
                </option>
            @endforeach
        </select>
        @error('filiere_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary px-5">
            {{ isset($niveau) ? 'Enregistrer' : 'Créer le niveau' }}
        </button>
    </div>
</div>