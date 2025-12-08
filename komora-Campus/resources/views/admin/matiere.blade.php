<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Matières</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f7ff; }
        .card { border: 2px solid #007bff; }
        .btn-primary, .modal-header, .table thead { background-color: #007bff !important; color: white !important; }
        .btn-primary:hover { background-color: #0056b3 !important; }
    </style>
</head>
<body class="p-4">

<div class="container">
    <div class="card shadow">
        <div class="card-header text-center text-white">
            <h2><i class="bi bi-journal-text"></i> Gestion des Matières</h2>
        </div>

        <div class="card-body bg-white">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> Ajouter une matière
            </button>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Filière → Niveau</th>
                            <th>Semestre</th>
                            <th>Produits</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matieres as $matiere)
                            <tr>
                                <td><strong>{{ $matiere->name }}</strong></td>
                                <td>
                                    <span class="badge bg-primary">{{ $matiere->niveau?->filiere?->name ?? '—' }}</span>
                                    → {{ $matiere->niveau?->name ?? '—' }}
                                </td>
                                <td><span class="badge bg-info text-dark">{{ $matiere->semester }}</span></td>
                                <td>{{ $matiere->products->count() }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $matiere->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <form action="{{ route('matieres.destroy', $matiere) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Supprimer cette matière ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $matiere->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content border-primary">
                                        <div class="modal-header text-white">
                                            <h5>Modifier la matière</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('matieres.update', $matiere) }}" method="POST">
                                                @csrf @method('PUT')
                                                @include('admin.matieres_form', ['matiere' => $matiere, 'filieres' => $filieres])
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $matieres->links() }}
        </div>
    </div>

    <button>
        <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary mt-4">
            <i class="bi bi-arrow-left"></i> Retour au Tableau de bord
        </a>
    </button>

    <!-- Modal Add -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-primary">
                <div class="modal-header text-white">
                    <h5>Ajouter une matière</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('matieres.store') }}" method="POST">
                        @csrf
                        @include('admin.matieres_form', ['filieres' => $filieres])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fonction pour charger les niveaux quand on change de filière
    function loadNiveaux(selectFiliere, targetSelect, selectedNiveauId = null) {
        const filiereId = selectFiliere.value;
        const niveauSelect = document.getElementById(targetSelect);

        if (!filiereId) {
            niveauSelect.innerHTML = '<option value="">-- Choisir un niveau --</option>';
            return;
        }

        fetch(`/filieres/${filiereId}/niveaux`)
            .then(r => r.json())
            .then(niveaux => {
                niveauSelect.innerHTML = '<option value="">-- Choisir un niveau --</option>';
                niveaux.forEach(n => {
                    const opt = document.createElement('option');
                    opt.value = n.id;
                    opt.textContent = n.name;
                    if (selectedNiveauId && selectedNiveauId == n.id) opt.selected = true;
                    niveauSelect.appendChild(opt);
                });
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Réouverture du modal en cas d'erreur
        @if($errors->any())
            @if(request()->isMethod('post'))
                new bootstrap.Modal('#addModal').show();
            @elseif(request()->isMethod('put'))
                new bootstrap.Modal('#editModal{{ request()->route("matiere") }}').show();
            @endif
        @endif

        // Initialisation au chargement (pour edit modal)
        document.querySelectorAll('select[data-filiere]').forEach(sel => {
            const niveauId = sel.dataset.niveau ?? null;
            if (sel.value) loadNiveaux(sel, sel.dataset.target, niveauId);
        });
    });
</script>
</body>
</html>