# Nginx Web Server avec PHP

## Description

Ce dépôt contient les fichiers nécessaires pour exécuter un serveur web Nginx avec PHP-FPM. Le serveur Nginx écoutera sur le port `8092` et servira le contenu du dossier `ExerciceFormulaire` situé dans le répertoire racine du dépôt.

## Structure du dépôt

| Dossier/Fichier          | Description                                                             |
|--------------------------|-------------------------------------------------------------------------|
| ├── code/   | `Dossier contenant tout les exercices (TP/Cours)`        |
| ├── docker-compose.yml    | `Fichier docker-compose pour exécuter les conteneurs Nginx et PHP-FPM`  |
| ├── nginx.conf            | `Fichier de configuration personnalisé pour Nginx`                     |
| └── README.md             | `Le fichier README de votre projet`                                     |

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les logiciels suivants sur votre machine :
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Lancer le service web

Clonez ce dépôt et lancez les conteneurs avec Docker Compose.

### Étapes :

1. Clonez ce dépôt en utilisant la commande suivante :

   ```bash
   git clone https://github.com/votre-utilisateur/votre-repo.git
   cd votre-repo
   docker-compose up -d


## Travail demandé
- [Exercice de cours (serie 1)](https://drive.google.com/drive/folders/1Z1rfzunWnGNBq75whRLLoDzPM-z6OVgF?usp=sharing)
- [Exercices de cours (serie 2)](https://docs.google.com/presentation/d/1PG87x0raTYsk-iZmx32mN_CsQwRd094w0ocE8NHQmkE/edit?usp=sharing)
- [Salaire Median des Employés avec BDD mySQL](https://docs.google.com/presentation/d/1eMEw64LA3leFQgHyA_3WdMTsA3p8Xv7weeY8qaXls-o/edit?usp=sharing)
- [Salaire Median des Employés avec BDD mySQL avec Jointures](https://docs.google.com/presentation/d/13ExMTgjQdMjZPAwUS1Igpq48rKLUlJFjpdMPJBd6-1k/edit?usp=sharing)
