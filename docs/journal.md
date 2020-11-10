# Plan d'intervention
- Implémenter modèle Opinion
- Nouvelle vue ModerateOpinions
- Modifier le layout de base pour ajouter le boutton "Modération"
- Implémenter controlleur OpinionsController
- Implémenter le script JS de filtrage

# Execution
- Mise en place de la nouvelle BDD
- Mise en place de la structure (modèle, vue, controlleur) vide pour l'instant afin de permettre d'afficher une simple page vide pour la modération des opinions
- Implémentation de nouvelles methodes DB (selectToArray) vu que select() parse lui-même le résultat de la query et que la table Opinions a des clés étrangères ... 
- Implémentation de la méthode load() du modèle Opinion