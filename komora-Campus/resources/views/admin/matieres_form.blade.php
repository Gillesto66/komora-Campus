<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nom de la matière <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name', $matiere->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Semestre <span class="text-danger">*</span></label>
        <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
            <option value="S1" {{ old('semester', $matiere->semester ?? '') === 'S1' ? 'selected' : '' }}>S1</option>
            <option value="S2" {{ old('semester', $matiere->semester ?? '') === 'S2' ? 'selected' : '' }}>S2</option>
        </select>
        @error('semester') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Filière <span class="text-danger">*</span></label>
        <select class="form-select @error('filiere_id') is-invalid @enderror"
                data-filiere data-target="niveau_select_{{ $matiere->id ?? 'add' }}"
                onchange="loadNiveaux(this, 'niveau_select_{{ $matiere->id ?? 'add' }}')">
            <option value="">-- Choisir une filière --</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}"
                    {{ old('filiere_id', $matiere?->niveau?->filiere_id) == $filiere->id ? 'selected' : '' }}>
                    {{ $filiere->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Niveau <span class="text-danger">*</span></label>
        <select name="niveau_id" id="niveau_select_{{ $matiere->id ?? 'add' }}"
                class="form-select @error('niveau_id') is-invalid @enderror" required>
            <option value="">-- Choisir un niveau --</option>
        </select>
        @error('niveau_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary px-5">
            {{ isset($matiere) ? 'Enregistrer' : 'Créer la matière' }}
        </button>
    </div>
</div>