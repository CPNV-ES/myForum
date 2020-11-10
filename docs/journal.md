# Plan d'intervention
 - Ajouter un bouton 'Modération' dans le layout
 - Enregister une nouvelle route pour la pages des opinions
 - Créer une vue pour la nouvelle route contenant un tableau (Auteur, Opinion, Etat)
 - Créer le modèle Opinion 
 - Créer le modèle OpinionState
 - Ajouter une requête à l'aide du modèle pour récupérer les opinions et y joindre les users et les états d'opinions
 - Passer les modèles récupérer par la requête à la vue
 - Modifier la vue pour y afficher les donnnées récupérés
 - Ajouter une liste déroulante avec les états possible d'une opinion (ainsi que l'état "--- Tous ---")
 - Ajouter un évenement Javascript sur la modification de la liste déroulante pour filter les lignes à afficher dans la listes des opinions

# Éxecution
 - Ajout du bouton 'Modération dans le layout
 - Ajout de la nouvelle route pour la page des opinions dans le routeur
 - Création d'une nouvelle vue et appel de celle-ci dans la nouvelle route avec le Renderer
 - Création du modèle Opinion, OpinionState et User
 - Ajout des relations entre les modèles (has_one, has_many...)
 - Ajout de la requête à la base de données pour récupérer les opinions contenant l'auteur et l'état d'opinion
 - Affichage des opinions dans la vue de modération
 - Ajout d'une requête permettant de récupérer les état d'opinions qui n'était pas prévu dans le plan d'intervetion.
 - Ajout des options de filtre dans le select
 - Ajout d'un script Javascript permettant le filtre d'éléments à partir de la valeur d'un autre élément. J'ai choisi cette solution car elle permet de réutiliser le système de filtre sur d'autres vues