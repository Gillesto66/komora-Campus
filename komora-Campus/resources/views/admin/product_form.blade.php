<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Titre <span class="text-danger">*</span></label>
        <input type="text" name="title" value="{{ old('title', $product->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Type <span class="text-danger">*</span></label>
        <select name="type" class="form-select @error('type') is-invalid @enderror">
            <option value="matiere" {{ old('type', $product->type ?? '') === 'matiere' ? 'selected' : '' }}>Matière</option>
            <option value="semestre" {{ old('type', $product->type ?? '') === 'semestre' ? 'selected' : '' }}>Semestre</option>
        </select>
        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Matière (si type matière)</label>
        <select name="matiere_id" class="form-select @error('matiere_id') is-invalid @enderror">
            <option value="">-- Choisir --</option>
            @foreach ($matieres as $m)
                <option value="{{ $m->id }}" {{ old('matiere_id', $product->matiere_id ?? '') == $m->id ? 'selected' : '' }}>
                    {{ $m->name }} ({{ $m->niveau->name }} - {{ $m->niveau->filiere->name }})
                </option>
            @endforeach
        </select>
        @error('matiere_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Période <span class="text-danger">*</span></label>
        <input type="text" name="period" value="{{ old('period', $product->period ?? '') }}"
               class="form-control @error('period') is-invalid @enderror">
        @error('period') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_corrected" id="is_corrected"
                   {{ old('is_corrected', $product->is_corrected ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_corrected">Corrigé</label>
        </div>
    </div>

    <div class="col-md-4">
        <label class="form-label">Prix CFA <span class="text-danger">*</span></label>
        <input type="number" name="price_cfa" value="{{ old('price_cfa', $product->price_cfa ?? '') }}"
               class="form-control @error('price_cfa') is-invalid @enderror">
        @error('price_cfa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Prix Euro (optionnel)</label>
        <input type="number" step="0.01" name="price_euro" value="{{ old('price_euro', $product->price_euro ?? '') }}"
               class="form-control @error('price_euro') is-invalid @enderror">
    </div>

    <div class="col-12">
        <label class="form-label">Description <span class="text-danger">*</span></label>
        <textarea name="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Fichier PDF @if(!isset($product)) <span class="text-danger">*</span> @else (laisser vide pour garder l'actuel) @endif</label>
        <input type="file" name="file" accept=".pdf"
               class="form-control @error('file') is-invalid @enderror">
        @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Aperçu image (optionnel)</label>
        <input type="file" name="preview" accept="image/*"
               class="form-control @error('preview') is-invalid @enderror">
        @error('preview') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary px-4">
            @if(isset($product)) Enregistrer les modifications @else Ajouter le produit @endif
        </button>
    </div>
</div>