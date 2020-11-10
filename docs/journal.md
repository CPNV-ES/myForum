# Plan d'intervention
- Implémenter modèle Opinion
- Nouvelle vue ModerateOpinions
- Modifier le layout de base pour ajouter le boutton "Modération"
- Implémenter controlleur OpinionsController
- Implémenter le script JS de filtrage

# Execution
- Mise en place de la nouvelle BDD
- Mise en place de la structure (modèle, vue, controlleur) vide pour l'instant afin de permettre d'afficher une simple page vide pour la modération des opinions
- Implémentation de nouvelles methodes DB (selectToArray) vu que select() parse lui-même le résultat de la query à partir d'un nom de classe et que la table Opinions a des clés étrangères et devrait donc parser un user et un opinionstate et je ne veux pas perdre de temps
- Implémentation de la méthode load() du modèle Opinion
- Implémentation de ::all() du modèle Opinion
- Affichage dans tableau des opitions
- Implémentation d'un modèle OpitionState
- Affichage du select de filtrage en utilisant les opitionstates obtenus depuis la bdd
- Ajout d'un attribut a chaque <tr> du tableau correspondant à l'id de l'opinionstate
- Ecriture du script de filtrage