<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>NodeManager</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NodeManager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Voir les services</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Ajouter un service</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Supprimer un service</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Certifier un service-web</a>
                </li>
            </ul>
            <form class="d-flex">
                <p>Bienvenue sur l'IHM du NodeManager !</p>
            </form>
            </div>
        </div>
    </nav>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        var_dump($_POST);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["type"] == "addwebsite") {
                $fqdn = htmlspecialchars($_POST["FQDN"]);
                $git = htmlspecialchars($_POST["git"]);
                $acl = htmlspecialchars($_POST["acl"]);

                echo "F.Q.D.N : $fqdn<br>";
                echo "Lien git : $git   <br>";
                echo "ACL : $acl<br>";
            } elseif ($_POST["type"] == "delwebsite") {
                $fqdn = htmlspecialchars($_POST["FQDN"]);

                // Exemple : afficher les données pour vérification
                echo "Service-web supprimé : $fqdn<br>";
            }
        }
        # VARIABLES
        $IP_GATEWAY = "172.33.40.1";
        $USER_GATEWAY = "user-ansible";
        $PRIVATE_KEY = "/root/test/id_rsa_gateway";
        $PUB_KEY = "/root/test/id_rsa_gateway.pub";

        $connection = ssh2_connect($IP_GATEWAY, 22);

        // Authentification SSH
        if (ssh2_auth_pubkey_file($connection, 'user-ansible', $PUB_KEY, $PRIVATE_KEY)) {
            echo "Authentification réussie\n";
        } else {
            die('Echec de l\'authentification');
        }

        // Exécution de la commande SSH
        $stream = ssh2_exec($connection, 'ls -la');
        stream_set_blocking($stream, true);
        $data = '';

        // Lecture des données de sortie
        while ($buffer = fread($stream, 4096)) {
            $data .= $buffer;
        }

        // Fermeture de la connexion
        fclose($stream);

        // Affichage des résultats
        echo nl2br($data);

    ?>
    <div class="container">
        <hr>
        <h2>Les services</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Adresse IP (locale)</th>
                <th scope="col">FQDN</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h2>Ajouter un service-web</h2>
        <form action="/" method="post">
            <div class="mb-3 row">
                <label for="Name" class="col-sm-2 col-form-label">F.Q.D.N</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="FQDN" id="FQDN" required >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Lien git: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="git" id="git" required >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">ACL (Laisser vide si pas d'ACL) :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Require ip 192.168.1.0/24 Require ip 172.33.40.2 ..." name="acl" id="acl">
                </div>
            </div>
            <button type="submit" name="type" value="addwebsite" class="btn btn-success">Mettre en service</button>
        </form>
        <hr>
        <h2>Supprimer un service-web</h2>
        <form action="/" method="post">
            <div class="mb-3 row">
                <label for="Name" class="col-sm-2 col-form-label">F.Q.D.N</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="FQDN" id="FQDN" required >
                </div>
            </div>
            <button type="submit" name="type" value="delwebsite" class="btn btn-danger">Eteindre</button>
        </form>
    </div>  
  </body>
</html>
