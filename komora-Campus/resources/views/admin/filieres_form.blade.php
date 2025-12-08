<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Nom de la filière <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name', $filiere->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Emblème / Logo @if(!isset($filiere)) <span class="text-danger">*</span> @endif</label>
        <input type="file" name="emblem" accept="image/*"
               class="form-control @error('emblem') is-invalid @enderror" {{ !isset($filiere) ? 'required' : '' }}>
        @error('emblem') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if(isset($filiere) && $filiere->emblem)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $filiere->emblem) }}" alt="current" style="max-height:80px;" class="rounded">
                <small class="text-muted">Actuel</small>
            </div>
        @endif
    </div>

    <div class="col-12">
        <label class="form-label">Description <span class="text-danger">*</span></label>
        <textarea name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $filiere->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary px-5">
            {{ isset($filiere) ? 'Enregistrer' : 'Créer la filière' }}
        </button>
    </div>
</div>