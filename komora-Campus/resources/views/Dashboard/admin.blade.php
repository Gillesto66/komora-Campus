<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4"></script>
    <style>
        body { background: #f0f7ff; color: #333; }
        .card { border: 2px solid #007bff; background: white; }
        .btn-primary, .list-group-item.active { background: #007bff; border-color: #007bff; color: white; }
        .stat-card { text-align: center; padding: 1rem; border-radius: 0.5rem; background: #e9f7ff; }
        .stat-number { font-size: 2rem; color: #007bff; }
    </style>
</head>
<body class="p-4">

<div class="container">
    <div class="card shadow">
        <div class="card-header text-center text-white bg-primary">
            <h2><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action active"><i class="bi bi-box-seam"></i> Gestion Produits</a>
                        <a href="{{ route('filieres.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-building"></i> Gestion Filières</a>
                        <a href="{{ route('niveaux.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-layers"></i> Gestion Niveaux</a>
                        <a href="{{ route('matieres.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-journal-text"></i> Gestion Matières</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- Ajouter d'autres redirections si besoin -->
                    </div>
                </div>

                <div class="col-md-9">
                    <h4 class="mb-3">Statistiques Clés</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="stat-card shadow">
                                <div class="stat-number">{{ $stats['products_count'] }}</div>
                                <small>Produits</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card shadow">
                                <div class="stat-number">{{ $stats['filieres_count'] }}</div>
                                <small>Filières</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card shadow">
                                <div class="stat-number">{{ $stats['niveaux_count'] }}</div>
                                <small>Niveaux</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card shadow">
                                <div class="stat-number">{{ $stats['matieres_count'] }}</div>
                                <small>Matières</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card shadow">
                                <div class="stat-number">{{ $stats['users_count'] }}</div>
                                <small>Utilisateurs</small>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-4 mb-3">Répartition Globale</h4>
                    <canvas id="statsChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const ctx = document.getElementById('statsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Produits', 'Filières', 'Niveaux', 'Matières', 'Utilisateurs'],
            datasets: [{
                label: 'Comptes',
                data: [{{ $stats['products_count'] }}, {{ $stats['filieres_count'] }}, {{ $stats['niveaux_count'] }}, {{ $stats['matieres_count'] }}, {{ $stats['users_count'] }}],
                backgroundColor: '#007bff',
                borderColor: '#0056b3',
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        }
    });
</script>
</body>
</html>