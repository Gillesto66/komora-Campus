<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Filières</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f7ff; }
        .card { border: 2px solid #007bff; }
        .btn-primary, .modal-header, .table thead { background-color: #007bff; border-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; }
        .emblem-img { width: 50px; height: 50px; object-fit: contain; }
    </style>
</head>
<body class="p-4">

<div class="container">
    <div class="card shadow">
        <div class="card-header text-center text-white">
            <h2><i class="bi bi-building"></i> Gestion des Filières</h2>
        </div>

        <div class="card-body bg-white">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> Ajouter une filière
            </button>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Emblème</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Niveaux</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filieres as $filiere)
                            <tr>
                                <td>
                                    @if($filiere->emblem)
                                        <img src="{{ asset('storage/' . $filiere->emblem) }}" alt="emblem" class="emblem-img rounded">
                                    @else
                                        —
                                    @endif
                                </td>
                                <td><strong>{{ $filiere->name }}</strong></td>
                                <td>{{ Str::limit($filiere->description, 80) }}</td>
                                <td>{{ $filiere->niveaux->count() }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $filiere->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <form action="{{ route('filieres.destroy', $filiere) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Supprimer cette filière ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $filiere->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content border-primary">
                                        <div class="modal-header text-white">
                                            <h5>Modifier la filière</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('filieres.update', $filiere) }}"
                                                  method="POST" enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                @include('admin.filieres_form', ['filiere' => $filiere])
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $filieres->links() }}
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
                    <h5>Ajouter une filière</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('filieres.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.filieres_form')
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
                new bootstrap.Modal('#editModal{{ old("filiere_id") ?? request()->route("filiere") }}').show();
            @endif
        @endif
    });
</script>
</body>
</html>