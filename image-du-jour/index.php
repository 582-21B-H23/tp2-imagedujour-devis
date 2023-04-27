<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lundi, 3 avril 2023 :: IdJ</title>
    <link rel="shortcut icon" href="ressources/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="ressources/css/idj.css">
    <style>
        /* L'image du jour est placée avec CSS comme "fond d'écran" */
        html {
            background-image: url(ressources/photos/fortezza-che-domina-la-valle.jpg);
        }
    </style>
</head>
<body>
    <div class="etiquette aime">
        <!-- Seul un utilisateur connecté peut soumettre un plébiscite -->
        <a href="plebiscite.php?op=plebisciter&iid=25" class="btn-aime"><img src="ressources/images/aime-1.png" alt=""></a>
        752
    </div>
    <aside>
        <!-- Seulement si utilisateur n'est pas connecté -->
        <!-- Connexion -->
        <form action="utilisateur.php?op=connexion" class="connexion">
            <input type="text" name="pseudo" placeholder="Pseudo">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <button type="submit" title="Connexion">&#x279C;</button>
        </form>

        <!-- Seulement si utilisateur connecté -->
        <div class="gestion-util">
            <!-- Profil utilisateur et déconnexion -->
            <div class="utilisateur-courant">
                <span class="util">Tigre-Apocalyptique</span>
                <a href="utilisateur.php?op=deconnexion" title="Déconnexion">
                    <img src="ressources/images/logout.png" alt="logout">
                </a>
            </div>
            <!-- Ajout de commentaire -->
            <form class="commentaire" action="commentaire.php?op=ajouter&iid=25">
                <textarea name="texte" id="commentaire"></textarea>
                <button type="submit" title="Envoyer">&#x279C;</button>
            </form>    
        </div>

        <ul class="commentaires">
            <li style="opacity: clamp(0.25,0.73,1)">
                <span class="util">Cobra-Bleu</span>
                <span class="texte">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, officiis!</span>
                <div class="vote">
                    <a href="vote.php?op=voter&updown=1&cid=27"><span class="up">32</span></a>
                    <a href="vote.php?op=voter&updown=-1&cid=27"><span class="down">12</span></a>
                </div>
            </li>
            <li style="opacity: clamp(0.25,0.11,1)">
                <span class="util">Chou-Trépidant</span>
                <span class="texte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur sapiente deleniti dolore accusamus facilis voluptates.</span>
                <div class="vote">
                    <a href="vote.php?op=voter&updown=1&cid=854"><span class="up">10</span></a>
                    <a href="vote.php?op=voter&updown=-1&cid=854"><span class="down">78</span></a>
                </div>
            </li>
            <li style="opacity: clamp(0.25,0.15,1)">
                <!-- Seulement si ce commentaire appartient à l'utilisateur connecté -->
                <a href="commentaire.php?op=supprimer&cid=3587" class="btn-supprimer-commentaire" title="Supprimer ce commentaire">&#x2716;</a>
                
                <span class="util">Tigre-Apocalyptique</span>
                <span class="texte">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto reprehenderit dolores culpa!</span>
                <div class="vote">
                    <a href="vote.php?op=voter&updown=1&cid=3587"><span class="up">15</span></a>
                    <a href="vote.php?op=voter&updown=-1&cid=3587"><span class="down">87</span></a>
                </div>
            </li>
            <li style="opacity: clamp(0.25,1,1)">
                <span class="util">Andésite-Noir</span>
                <span class="texte">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</span>
                <div class="vote">
                    <a href="vote.php?op=voter&updown=1&cid=632"><span class="up">5</span></a>
                    <a href="vote.php?op=voter&updown=-1&cid=632"><span class="down">0</span></a>
                </div>
            </li>
            <li style="opacity: clamp(0.25,0.98,1)">
                <span class="util">Chou-Trépidant</span>
                <span class="texte">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus, cumque. Saepe modi illum, quisquam obcaecati ut repudiandae nostrum tenetur dolore.</span>
                <div class="vote">
                    <a href="vote.php?op=voter&updown=1&cid=5"><span class="up">125</span></a>
                    <a href="vote.php?op=voter&updown=-1&cid=5"><span class="down">2</span></a>
                </div>
            </li>
        </ul>
    </aside>
    <div class="info">
        <div class="date">
            <span class="premier">
                <a title="Premier jour disponible (18 février 2023)" href="index.php?op=afficher&jour=2023-02-18">&#x2B70;</a>
            </span>
            <span class="prec">
                <a title="Jour précédent (2 avril 2023)" href="index.php?op=afficher&jour=2023-04-02">&#x2B60;</a>
            </span>
            <span class="suiv">
                <a class="lien-inactif" title="Jour suivant (4 avril 2023)" href="index.php?op=afficher&jour=2023-04-04">&#x2B62;</a>
            </span>
            <span class="dernier">
                <a class="lien-inactif" title="Aujourd'hui (3 avril 2023)" href="index.php?op=afficher&jour=2023-04-03">&#x2B72;</a>
            </span>
            <i>Lundi, 3 avril 2023</i>
        </div>
        <!-- Seulement si la description est présente ! -->
        <div class="etiquette etiquette-etendue description">Intérieur du château de Verrucole , le long du chemin de l'archéoparc.</div>
    </div>
</body>
</html>