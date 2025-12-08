<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Produits</title>

    <!-- Bootstrap 5 CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }
        .card { border: 2px solid #007bff; }
        .btn-primary, .modal-header, .table thead { background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        .table thead { color: white; }
    </style>
</head>
<body class="p-4">

<div class="container">
    <div class="card shadow">
        <div class="card-header text-white text-center" style="background:#007bff;">
            <h2 class="mb-0"><i class="bi bi-book"></i> Gestion des Produits</h2>
        </div>

        <div class="card-body bg-white">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> Ajouter un produit
            </button>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Période</th>
                            <th>Prix CFA</th>
                            <th>Pages</th>
                            <th>Poids</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ ucfirst($product->type) }}</td>
                                <td>{{ $product->period }}</td>
                                <td>{{ number_format($product->price_cfa) }}</td>
                                <td>{{ $product->nombre_pages ?? $product->pages_count ?? '—' }}</td>
                                <td>{{ $product->poids ?? $product->file_size_kb ?? '—' }} Ko</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $product->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                          class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Confirmer la suppression ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content border-primary">
                                        <div class="modal-header text-white">
                                            <h5 class="modal-title">Modifier le produit</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('products.update', $product) }}"
                                                  method="POST" enctype="multipart/form-data">
                                                @csrf @method('PUT')

                                                @include('admin.product_form', ['product' => $product])
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $products->links() }}
        </div>
    </div>
    <button>
        <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary mt-4">
            <i class="bi bi-arrow-left"></i> Retour au Tableau de bord
        </a>
    </button>

    {{-- Modal Add --}}
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-primary">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Ajouter un produit</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.product_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ouvre automatiquement le modal d'ajout si erreurs sur create
        @if ($errors->any() && request()->isMethod('post') && request()->routeIs('products.store'))
            new bootstrap.Modal(document.getElementById('addModal')).show();
        @endif

        // Ouvre le modal d'édition correspondant si erreurs sur update
        @if ($errors->any() && request()->isMethod('put'))
            const editModalId = 'editModal{{ old('product_id') ?? request()->route('product') }}';
            const modalEl = document.getElementById(editModalId);
            if (modalEl) new bootstrap.Modal(modalEl).show();
        @endif
    });
</script>
</body>
</html>