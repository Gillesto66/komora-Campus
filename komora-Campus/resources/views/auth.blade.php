<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion / Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #6610f2);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .auth-container {
            max-width: 420px;
            margin: 50px auto;
        }
        .card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .card-header {
            background: #007bff;
            color: white;
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
        }
        .tab-content {
            padding: 2rem;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #007bff;
            font-weight: 600;
        }
        .nav-tabs .nav-link.active {
            color: #007bff;
            border-bottom: 3px solid #007bff;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .form-check-label {
            font-size: 0.9rem;
        }
        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="card">
        <div class="card-header">
            <h3><i class="bi bi-shield-lock"></i> Bienvenue</h3>
        </div>

        <div class="card-body p-0">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#register">Inscription</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Login Form -->
                <div id="login" class="tab-pane fade show active">
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-lock"></i> Mot de passe</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Se souvenir de moi</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right"></i> Se connecter
                        </button>
                    </form>
                </div>

                <!-- Register Form -->
                <div id="register" class="tab-pane fade">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person"></i> Nom complet</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-phone"></i> Téléphone (optionnel)</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="form-control" placeholder="+221 77 123 45 67">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-badge"></i> Rôle</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="">Choisir un rôle</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Étudiant / Utilisateur</option>
                                <option value="affilier" {{ old('role') == 'affilier' ? 'selected' : '' }}>Affilié (Revendeur)</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            </select>
                            @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-lock"></i> Mot de passe</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-lock-fill"></i> Confirmer</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-person-plus"></i> Créer mon compte
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center text-white mt-4">
        <p>© {{ date('Y') }} - Plateforme d'excellence académique</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>