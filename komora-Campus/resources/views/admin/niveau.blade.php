<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Niveaux</title>
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
            <h2><i class="bi bi-layers"></i> Gestion des Niveaux</h2>
        </div>

        <div class="card-body bg-white">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> Ajouter un niveau
            </button>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Niveau</th>
                            <th>Filière</th>
                            <th>Matières</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($niveaux as $niveau)
                            <tr>
                                <td><strong>{{ $niveau->name }}</strong></td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $niveau->filiere?->name ?? '—' }}
                                    </span>
                                </td>
                                <td>{{ $niveau->matieres->count() }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $niveau->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <form action="{{ route('niveaux.destroy', $niveau) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Supprimer ce niveau ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $niveau->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content border-primary">
                                        <div class="modal-header text-white">
                                            <h5>Modifier le niveau</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('niveaux.update', $niveau) }}" method="POST">
                                                @csrf @method('PUT')
                                                @include('admin.niveaux_form', ['niveau' => $niveau])
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $niveaux->links() }}
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
                    <h5>Ajouter un niveau</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('niveaux.store') }}" method="POST">
                        @csrf
                        @include('admin.niveaux_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if($errors->any())
            @if(request()->isMethod('post'))
                new bootstrap.Modal('#addModal').show();
            @elseif(request()->isMethod('put'))
                const modalId = '#editModal{{ request()->route("niveau") }}';
                const modalEl = document.querySelector(modalId);
                if (modalEl) new bootstrap.Modal(modalEl).show();
            @endif
        @endif
    });
</script>
</body>
</html>