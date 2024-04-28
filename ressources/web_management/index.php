<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Contrôle des Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+1hb6b8g5g0n3lOLo4y4gx5nU4w2f4Z+d5GDK6bj" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <h1>Page de Contrôle des Services</h1>

    <div class="d-flex justify-content-end mb-2">
        <!-- Boutons -->
        <button type="button" class="btn btn-primary me-2">Gérer</button>
        <button type="button" class="btn btn-secondary me-2">Créer un service</button>
        <span>Authentifié sous le login user</span>
    </div>

    <!-- Informations sur les services -->
    <div class="">
        <h2>Les services installés</h2>

        <!-- Site Web 1 -->
        <div class="">
            <!-- Détails -->
            Website1<br/>
            Adresse IPv4 : 172.33.40.2<br/>
            Image : debian-ssh-py<br/>
            État : Fonctionne<br/>
            FQDN : <a href="https://bordenaevetelecom.fr">https://bordenaevetelecom.fr</a>
        </div>

        <!-- Actions -->
        <div class="">
            Clé SSH | Éteindre le service | Portainer
        </div>
    </div>

    <!-- JavaScript facultatif ; choisissez l'une des deux options ! -->

    <!-- Option 1: Bootstrap Bundle avec Popper -->
    <!--<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>-->
    
    <!-- Option 2: Popper et Bootstrap JS séparés -->
    <!--<script src="../assets/dist/js/popper.min.js"></script>-->
    <!--<script src="../assets/dist/js/bootstrap.min.js"></script>-->
</body>
</html>
