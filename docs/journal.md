# Plan d'intervention
Premièrement j'observe la vidéo et je dessine sur papier le resultat obtenu.

L'objectif est de créer un bouton Modération, qui, lorsqu'il est cliqué,affichera :
- Une colone comprenant les pseudos des utilisateurs.
- Leurs opinions.
- L'état dans lequel l'opinion est placée.

Il y autre un filtre, permettant de trier les opinions par états.

Mon premier objectif est de créer les tests pour afficher correcement les opinons.


Création du bouton "modération".

On a besoin de créer la structure moderation. pour cela je crée une structure MVC similaire à celui de référence. J'adaptereai après le code.

Parfait, maintenant avec une petite adaptation ma page affiche déjà mes opinons. Il faut maintenant ajouter le pseudo et ainsi que les états.

Il est temps maintenant de tester si la fonction all() récupère mes trois valeurs souhaitées.

(Voir model/document/MLD.pdf) Je viens de me rendre comte d'un *- petit problème* -, la table "Opinions possède deux foreign key, je vais devoir rajouter deux inner join dans ma requête.

```sql
select * from opinions as op inner join users as us on us.id = op.user_id inner join states as st on st.id = op.opinionstate_id
```

Après quelques ajustements dans l'index.php, le contenu ets correctement ajouté !


