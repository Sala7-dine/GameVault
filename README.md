# 🎮 **GameVault** - Gestion de Collection de Jeux Vidéo

## Description du projet

**GameVault** est une application web permettant aux joueurs de gérer leur collection de jeux vidéo de manière organisée et sociale. Les utilisateurs peuvent suivre leurs jeux, partager leurs expériences, et interagir avec d'autres joueurs via un système de chat intégré. Ce projet utilise PHP8 avec une architecture orientée objet (OOP) et PDO pour la gestion des bases de données.

### 👫 **Projet réalisé en binôme** :
- **Salahdine Daha**  
- **Meryem Litim**

---

## 🧑‍💻 **Contexte du projet**

Le projet **GameVault** a été créé dans le cadre d'une application web permettant aux joueurs de mieux gérer leur collection de jeux vidéo. En tant que développeur Backend junior, l'objectif principal était de concevoir et d'implémenter un système backend robuste en utilisant PHP8 et PDO pour la gestion des bases de données, tout en assurant la sécurité et la fluidité des interactions entre les utilisateurs.

L'application inclut des fonctionnalités telles que la gestion de la bibliothèque de jeux, un système de chat intégré pour discuter avec d'autres joueurs, ainsi que des outils d'administration pour superviser les utilisateurs et le contenu. Le projet s'inscrit dans un contexte de développement moderne, avec une approche orientée objet pour garantir la maintenabilité du code.

---

## 🚀 **Fonctionnalités principales**

| Fonctionnalité                          | Description |
|-----------------------------------------|-------------|
| 📚 **Gestion de Bibliothèque**         | Permet d'ajouter, modifier ou supprimer des jeux dans la bibliothèque du joueur, avec un suivi du statut (En cours, Terminé, Abandonné), un système de notation et un suivi du temps de jeu. |
| 👤 **Système Utilisateur**             | Inscription et connexion, gestion du profil et suivi de l'historique des jeux joués. |
| 🎮 **Base de Données des Jeux**        | Informations détaillées sur les jeux : titre, date de sortie, genre, critiques, et galerie de captures d'écran. |
| 💬 **Système de Chat**                 | Discussion entre joueurs dans des salons dédiés à chaque jeu, avec un historique des conversations. |
| 🛠️ **Administration**                  | Gestion des utilisateurs et de leurs rôles, ajout/suppression de jeux, modération du contenu et gestion des bannissements. |

---

## 📝 **Détails des fonctionnalités**

### 📚 **Gestion de Bibliothèque**
- **Ajout/Modification/Suppression de jeux** : Permet aux joueurs d'ajouter des jeux à leur bibliothèque, de les modifier ou de les supprimer.
- **Suivi du statut des jeux** : Chaque jeu peut être marqué comme "En cours", "Terminé" ou "Abandonné".
- **Système de notation personnelle** : Les joueurs peuvent attribuer une note à chaque jeu pour indiquer leur appréciation.
- **Temps de jeu** : Permet de suivre le temps que chaque joueur a passé sur un jeu.
- **Favoris** : Les joueurs peuvent marquer certains jeux comme favoris pour les retrouver plus facilement.

### 👤 **Système Utilisateur**
- **Inscription/Connexion** : Un système sécurisé permettant aux utilisateurs de s'inscrire et de se connecter à leur compte.
- **Gestion de profil** : Les utilisateurs peuvent personnaliser leur profil en modifiant leurs informations personnelles, avatar, etc.
- **Historique de jeu** : Chaque utilisateur peut consulter l'historique des jeux qu'il a joués avec des détails comme la durée et les notes attribuées.

### 🎮 **Base de Données des Jeux**
- **Détails des jeux** : Chaque jeu est enregistré avec des informations essentielles telles que le titre, la date de sortie, le genre, etc.
- **Scores et critiques** : Les utilisateurs peuvent laisser des critiques et des évaluations pour aider les autres joueurs.
- **Galerie de captures d'écran** : Les joueurs peuvent télécharger et consulter des captures d'écran des jeux.

### 💬 **Système de Chat**
- **Salons de discussion par jeu** : Un salon de chat est créé pour chaque jeu où les joueurs peuvent discuter de leur expérience et échanger des conseils.
- **Historique des conversations** : Les messages échangés dans chaque salon de chat sont sauvegardés pour être consultés ultérieurement.

### 🛠️ **Administration**
- **Gestion des jeux** : Les administrateurs peuvent ajouter, modifier ou supprimer des jeux de la base de données.
- **Gestion des utilisateurs** : Les administrateurs peuvent gérer les rôles des utilisateurs, attribuer des rôles (Admin ou Utilisateur) et modérer les contenus générés par les utilisateurs.
- **Système de bannissement** : Les administrateurs peuvent bannir des utilisateurs pour violation des règles de la communauté.
- **Modération du contenu** : Le contenu généré par les utilisateurs est modéré pour assurer un environnement respectueux et sécurisé.

---

## 🏗️ **Architecture**

| Composant            | Description |
|----------------------|-------------|
| **Frontend**         | Utilisation d'un framework comme Vue.js ou React.js pour l'interface utilisateur dynamique. |
| **Backend**          | PHP8 avec une architecture orientée objet (OOP) et PDO pour la gestion sécurisée des bases de données. |
| **Base de données**  | MySQL ou MariaDB pour stocker les données des utilisateurs, des jeux et des conversations. |
| **Sécurité**         | Mise en place de la sécurité avec des pratiques telles que l'authentification sécurisée, la gestion des sessions et la prévention des injections SQL. |

---

## 📥 **Installation**

### Prérequis
- PHP 8.0 ou supérieur
- Serveur Web (Apache ou Nginx)
- Base de données MySQL ou MariaDB
- Composer (pour la gestion des dépendances PHP)

Suivez ces étapes pour configurer le projet localement :

1. 🛠️ Installez PHP et [XAMPP](https://www.apachefriends.org/index.html).
2. 🔄 Clonez le dépôt dans le répertoire `htdocs` de XAMPP :
   ```bash
   git clone https://github.com/Sala7-dine/GameVault.git
   ```

3. 🔼 Accédez au répertoire du projet :
   ```bash
   cd C:\xampp\htdocs\GameVault
   ```

4. 🚀 Lancez XAMPP et démarrez le serveur Apache.

5. 🔍 Accédez à l'application via votre navigateur à l'adresse suivante :
   ```
   http://localhost/GameVault
   ```

---