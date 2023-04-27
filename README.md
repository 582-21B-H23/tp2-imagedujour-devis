# TP #2 : Intégration PHP/MySQL et gestion de contenu.
## Travail d'équipe permis (mais pas plus de 2 personnes par équipe).

>Si vous travaillez en équipe, les deux personnes doivent accepter les fichiers du TP sur *GitHub Classroom*.

>Vous travaillez ensuite chacun.e sur votre version de code, en autant que vous faites vos fusions et synchronisations du code correctement.

>Divisez le travail dans l'équipe de façon à simplifier/faciliter ces fusions (expérimentez, c'est le moment idéal !)

## Objectif/exigences généraux
* Vous produisez le code nécessaire pour implémenter les fonctionnalités de gestion du contenu spécifiées ci-dessous pour l'application Web `Image du jour` dont la base de données a été conçue dans le TP #1

* Produisez un code modulaire, suivant les conventions qui ont été montrées en classe, idéalement en séparant vos éléments de code par *responsabilité*, ici à l'aide du *patron de conception* **MVC** :
    1. Vue = Affichage de l'interface utilisateur de l'application (ici, tout ce qui touche à la production dynamique de la structure et du contenu du UI, ou écrans de l'application, c'est à dire dans la mise en page HTML/CSS)
    2. Contrôleur = Gestion de l'interactivité avec l'utilisateur de l'application (ici, tout ce qui gravite autour des messages de requêtes/réponses HTTP)
    3. Modèle = Manipulation des données de l'application (ici, les opérations CRUD sur les données gérées dans une BD relationnelle MySQL)

>Vous voulez tendre vers ce *nirvana* (séparation des responsabilités ou des *précoccupations*, en anglais **SoC** : *Separation Of Concerns*) : ça ne veut pas dire que vous devez vous tuer pour y arriver ;-)

* Utilisez comme point de départ les fichiers de code distribués dans ce dépôt. En particulier, vous devez **impérativement** utiliser la base de données distribuée dans ce dépôt (c'est la solution modèle du TP #1, avec des données légèrement modifiées). SVP, <u>n'utilisez pas</u> votre propre solution du TP #1 !

* Dans la démo fournie (ci-dessous), vous verrez des messages de UI (les "messages *toast*"), **ça ne fait pas partie de l'évaluation**, mais ce n'est pas difficile à implémenter, donc je vous invite à le faire. Peut être que nous aurons le temps d'en faire l'implémentation dans l'exemple de classe du gestionnaire de contenu du *Restaurant Leila* (pas de garantie)

## Étapes à suivre
1. *Clonez* le dépôt sur votre machine locale dans un emplacement **approprié**

2. Créez un `alias` dans la configuration de votre serveur Web, ou déposez simplement le dossier de code de l'atelier à la `racine` des documents de votre serveur Web (`Document Root`)

3. En partant du script `SQL` distribué, créez la base de données sur votre serveur ; notez que cette base de données est nommée différement ! Ajustez au besoin la configuration pour l'accès BD dans ce projet dans le document `config-temp/21b-h23-idj.cfg.php` (laissez ce fichier à cette place pour les besoins de ce travail)

4. Testez le site Web avant d'ajouter votre propre code !!

5. Complétez le code pour les `controleurs` et les `modeles` des 5 *modules* (*Utilisateur*, *Image*, *Plébiscite*, *Commentaire*, et *Vote*)

6. Produisez les fonctionnalités requises par l'interactivité de votre application : 
    1. `Utilisateur` : se connecter, se déconnecter. Notez bien ici que vous n'avez pas à implémenter la fonctionnalité de création de compte. Les comptes existants sont tous configurés pour avoir le mot de passe exactement le même que le pseudo. Le mot de passe a été encrypté avec la fonction `password_hash()` de PHP en utilisant l'algorithme d'encryptage par défaut (c'est à dire, PASSWORD_DEFAULT). Pour vérifier l'authentification et permettre à un utilisateur de se *connecter*, vous faites comme vu en classe en utilisant la fonction `password_verify()` de PHP.
    2. `Image` : afficher l'image du jour (n'importe quel jour ; par défaut aujourd'hui), et l'état du plébiscite (pour utilisateur connecté seulement), et le décompte du plébiscite, et les commentaires en ordre chronologique descendant, incluant le pseudo de l'utilisateur ayant écrit le commentaire (et le décompte des votes approbateurs/désapprobateurs) 
    3. `Plébiscite` : plébisciter une image (seulement utilisateur connecté)
    4. `Commentaire` : ajouter un commentaire (seulement utilisateur connecté), supprimer un commentaire (seulement commentaire appartenant à l'utilisateur connecté)
    5. `Vote` : voter sur un commentaire (seulement utilisateur connecté) ; cette fonctionnalité est un peu compliquée et pas très intuitive, mais voici ce qui est demandé : si l'utilisateur n'a pas de vote préalable sur le commentaire, alors on ajoute le vote tel qu'indiqué par le bouton cliqué (pouce haut = 1, pouce bas = -1); mais si l'utilisateur a déjà un vote sur ce commentaire, alors on le retire si le nouveau vote est le même (donc si le vote était 1 par exemple, et l'utilisateur clique le pouce vers le haut, on retire le vote de la table), ou on le met à jour si le nouveau vote est l'inverse de l'ancien (donc si le vote était 1 par exemple, et l'utilisateur clique le pouce vers le bas, on modifie le vote pour y mettre -1).

7. Voici quelques suggestions/trucs/astuces qui pourront vous être utiles : 
    1. Comme l'application n'a qu'un seul écran (avec des variations de contenu), une approche serait de supposer que la seule "vue" avec du code HTML est celle du module `Image` représenté par la page `index.php`. Les 4 autres "vues" ne serviront qu'à inclure les fichiers "contrôleurs" correspondants
    2. Toute opération dans ces 4 autres modules mène finalement à la page `index` (redirection)
    3. Selon moi, la fonctionnalité la plus difficile dans ce travail est le contrôle de l'affichage de l'image du jour pour les jours *précédent*, *suivant*, *premier*, *dernier*. L'arithmétique de calendrier n'est vraiment pas un point fort de PHP :sob: ! Je vous conseille donc de ne pas trop insister sur cette fonctionnalité avant d'avoir fini toutes les autres, que je considère assez simples : connexion, déconnexion, modification du plébiscite, ajout/retrait d'un commentaire, gestion des votes sur commentaire 
    4. Pour travailler avec les dates en PHP, j'ai moi-même utilisé la librairie DateTime (existe en style *procédural* et *orienté-objet*) et les fonctions suivantes : `date_create()`, `date_add()`, `date_sub()`, etc. (dont cette fonction au nom pas très commode : `date_interval_create_from_date_string` :grimacing:)
    5. Remarquez qu'il se peut que votre configuration PHP ne soit pas dans le bon fuseau horaire (dépend de l'environnement utilisé : la mienne était 'Europe/Berlin', j'imagine parce que XAMPP est développé en Allemagne :unamused:) ; vous pouvez évidement changer cette configuration, de plusieurs façons, mais en particulier avec la fonction `date_default_timezone_set()` directement dans votre code

8. Synchronisez votre solution complétée avec le dépôt GitHub qui vous a été assigné lorsque vous avez accepté le travail (c'est le dépôt distant (*remote*) déjà défini dans votre projet)

9. Si vous synchronisez votre solution sur GitHub au delà de la date limite, la remise sera considérée tardive et la pénalité de retard sera appliquée (5% par jour). Si vous le faites par erreur, vous pouvez toujours m'écrire pour me demander de corriger seulement le dernier *commit* de dépôt avant l'échéance de remise ;-)

### Gardez une copie personnelle de votre travail : le dépôt de remise sur `582-21B` pourra être supprimé une fois la correction complétée et les notes publiées.

---

<img src="/demo.gif" alt="demo de la solution" title="Démo de la solution" />
