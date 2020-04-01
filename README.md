# Travaux pratiques PHP / Base de données

## 1. Installer la base de données

Utiliser le fichier **videogames.sql** fourni pour générer une copie de la base de données.

Ecrire le code PHP permettant de réaliser la connexion avec cette base de données, et la tester avec une requête SQL simple.

## 2. Afficher tous les jeux vidéos

Au chargement de la page, envoyer une requête SQL permettant de récupérer les données de tous les jeux vidéos. Afficher dynamiquement la liste des jeux en s'inspirant du code HTML écrit en dur.

## 3. Trier les jeux vidéos

Lorsque l'on clique sur l'icône de flèche à côté du nom d'une colonne, la liste des jeux vidéos doit apparaître triée en fonction de ce critère.

## 4. Créer un nouveau jeu vidéo

Lorsque le formulaire dans la dernière ligne du tableau est validé, envoyer une requête SQL permettant d'ajouter un nouveau jeu vidéo à la base de données. Valider le contenu du formulaire préalablement (si un champ contient une mauvaise valeur, la requête ne doit pas être envoyée, et un message d'erreur doit s'afficher à la place).

## 5. Modifier un jeu vidéo existant

Lorsque l'on clique sur le bouton "modifier" d'un jeu vidéo, son affichage doit être remplacé par un formulaire similaire au formulaire d'ajout de jeu, et le bouton "modifier" doit être remplacé par un bouton "valider". Lorsque ce formulaire est validé, envoyer une requête SQL permettant de modifier le jeu vidéo dans la base de données. Une fois de plus, penser à bien valider le contenu du formulaire.

## 6. Supprimer un jeu vidéo

Lorsque l'on clique sur le bouton "supprimer" d'un jeu vidéo, envoyer une requête SQL permettant de le retirer de la base de données.

## BONUS

- Afficher une boîte de dialogue demandant de confirmer la suppression d'un jeu vidéo.
- Les boutons permettant de trier la liste de jeu permettent de trier dans l'ordre inverse lorsqu'on clique une deuxième fois dessus
- Le contenu des menus déroulants doit être dynamique aussi
- Factoriser le formulaire de création/modification d'un jeu vidéo dans un fichier à part pour éviter de répéter le code
