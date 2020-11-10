# Plan d'intervention
Premièrement j'observe la vidéo et je dessine sur papier le resultat obtenu.

## Objectif
L'objectif est de créer un bouton Modération, qui, lorsqu'il est cliqué,affichera :
- Une colone comprenant les pseudos des utilisateurs.
- Leurs opinions.
- L'état dans lequel l'opinion est placée.

Il y autre un filtre, permettant de trier les opinions par états.

Mon premier objectif est de créer les tests pour afficher correcement les opinons.

## Modification page d'accueil
Création du bouton "modération".

## MVC Structure
On a besoin de créer la structure moderation. pour cela je crée une structure MVC similaire à celui de référence. J'adaptereai après le code.

Parfait, maintenant avec une petite adaptation ma page affiche déjà mes opinons. Il faut maintenant ajouter le pseudo et ainsi que les états.

## Database connection
Il est temps maintenant de tester si la fonction all() récupère mes trois valeurs souhaitées.

(Voir model/document/MLD.pdf). Il y a un détail à noter : la table "Opinions possède deux foreign key, je vais devoir rajouter des inner join dans ma requête.

```sql
select * from opinions as op inner join users as us on us.id = op.user_id inner join states as st on st.id = op.opinionstate_id
```
## Index.php and view
Après quelques ajustements dans l'index.php, le contenu est maintenant correctement ajouté !

J'ai rapidement changé l'affichage CSS de la bar de titre.

### List déroulante
Il faut maintenant rajouter une liste déroulante.

```html
<select name="states" id="states" class="description-title white-text">
    <option value="all">--- Tous ---</option>
    <option value="saab">Censuré</option>
    <option value="opel">Clos</option>
    <option value="audi">En discussion</option>
    <option value="audi">Proposé</option>
    <option value="audi">Publié</option>
</select>
```

L'affichage de la liste déroulante est fonctionnelle, cependant elle est écrite en dure, je n'aime pas cela car ça signifie que si un jour, un état est modfié / ajouté / supprimé, un changement devra être necessaire.

La solution simple sera de récupérer le nom des états puis de les afficher dynamiquement.

```sql
select * from states
```

ça tombe bien, en peut réutiliser notre code créé en classe !

```php
//Model
require_once("model/State.php");

//[...]

$states = State::all();

//View
<?php
    foreach($states as $state) 
    {
        echo <<<EOD
            <option value="$state->name">$state->name</option>
        EOD;
    }
?>
```

Voilà maintenant qui est parfait !
J'espère seulement que les noms en français ne posseront pas de problème lors des contrôles techniques faits en java script...

## Java Scrip interactions

