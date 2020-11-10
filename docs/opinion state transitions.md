# Enoncé

En tant qu'administrateur du forum,

je veux pouvoir modifier le cycle de vie des opinions

pour adapter le forum en fonction du nombre et du comportement des utilisateurs

# Definition of Done

- Quand je suis sur la page d'accueil du forum, j'ai un bouton 'Cycle de vie' à ma disposition _(2p)_

- Quand je clique le bouton 'Cycle de vie', j'arrive sur la page 'Cycle de vie'. Toutes les transitions actuellement acceptées y sont listées sous forme de tableau avec les colonnes:  _(5p)_

  - De
  - Å
  
- A côté de chaque transition, il y a un bouton 'poubelle'. Lorsque je clique un de ces boutons, la transition concernée est supprimée. Je me retrouve sur la même page, avec un message de confirmation de l'effacement.
 
- En bas de la liste se trouve deux listes déroulantes contenant chacune la tous les états, ainsi qu'un bouton 'Ajouter'

- Lorsque je sélectionne 'Nouveau' dans la première liste, 'Publié' dans la seconde et que je clique 'Ajouté', la transition de 'Nouveau' à 'Publié' est ajoutée à la liste. Je me retrouve sur la même page, avec un message de confirmation de l'ajout. 

- Lorsque la combinaison choisie est invalide et que je clique 'Ajouter', je me retrouve sur la même page, avec un message d'erreur. Une transition est invalide si les deux états choisis sont identiques ou si elle existe déjà.
# Valeur

Cette user story vaut 30 points

- 23 points sont répartis sur les tests du DoD

- 4 points sont attribués à la qualité du code (présentation, choix d'identificateurs, commentaires, ...)

- 3 points sont attribués à la qualité des commits Git (nommage, atomicité, granularité) 
