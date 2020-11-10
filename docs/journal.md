# Journal de travail

## Plan d'intervention

### Etape :

1. Ajouter les données des opinions dans la db 
2. Créer une nouvelle page de modération
3. Ajouter le controller lié à cette page
4. Créer les models User State et Opinions
5. Faire les fonctions de récupération des données dans les models
6. Appeler ces fonctions depuis le controller et passer les valeurs à la vue
7. Afficher les valeurs dans la vue.
8. Mettre en place un système de filtre en javascript

## Execution

### Ajouter les données des opinions dans la db 

Utilisation du script fournis dans la branche master du repo

### Créer une nouvelle page de modération

Ajout d'un dossier moderation dans le dossier view et ajout de la page index.view.php

### Ajouter le controller lié à cette page

Ajout du fichier ModerationController.php

### Créer les models User State et Opinions

Ajout des fichiers Opinion.php, User.php et State.php

On stock le username et le state_name dans l'objet opinions pour facilité l'aquisition de ces valeurs dans la vue.

### Faire les fonctions de récupération des données dans les models

Ajout des fonctions all() dans les models. Ainsi que les fonctions getStateById() et getUsernameById() dans les model State et User.

### Appeler ces fonctions depuis le controller et passer les valeurs à la vue

Appel des fonctions statique du model depuis le controller

### Afficher les valeurs dans la vue.

Affichage des valeurs dans un élément  *\<table>* à l'aide d'un foreach

### Mettre en place un système de filtre en javascript

Utilisation de code trouvé sur stack overflow. 
https://stackoverflow.com/questions/51187477/how-to-filter-a-html-table-using-simple-javascript