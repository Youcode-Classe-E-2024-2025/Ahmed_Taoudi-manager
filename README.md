

# Ahmed_Taoudi-manager
## Système de Location de Voitures

### Description
Plateforme de gestion des réservations de voitures.

### Prérequis
Avant de pouvoir utiliser ce projet, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP
- MySQL
- Git
- Node.js (optionnel)

### Installation

#### 1. Cloner le dépôt
Pour commencer, clonez ce dépôt sur votre machine locale avec la commande suivante :

```bash
git clone https://github.com/Youcode-Classe-E-2024-2025/Ahmed_Taoudi-manager.git
cd Ahmed_Taoudi-manager
```

#### 2. Configuration de la Base de Données
1. La base de données sera créée automatiquement lors du premier démarrage du site (après avoir cliqué sur le bouton "Créer la base de données").
2. Vous pouvez configurer les paramètres de connexion dans le fichier `assets/database/config.php` (par exemple, le mot de passe MySQL).

#### 3. Installation des Dépendances
Le site fonctionnera sans modification, mais si vous souhaitez personnaliser l'interface, vous devez installer les dépendances nécessaires avec `npm` :

```bash
npm install
npm run dev
```

Cela est nécessaire car le site utilise Tailwind CSS pour le style.

#### 4. Démarrage du Serveur
Pour démarrer le serveur, vous pouvez utiliser XAMPP, WAMP, LAMP ou le serveur PHP intégré. Choisissez un port disponible (par exemple, 9000 ou 8888) :

```bash
php -S localhost:9000
```

### Connexion Initiale
- **Admin** : admin@rento.car
- **Mot de passe** : adminadmin

### Fonctionnalités
Voici les principales fonctionnalités du système :

- **Gestion des réservations** : Les utilisateurs peuvent réserver des voitures et voir l'historique de leurs réservations.
- **Gestion des utilisateurs** : Administrateurs peuvent gérer les utilisateurs et leurs informations.
- **Gestion des voitures** : Ajouter, modifier ou supprimer des voitures dans la flotte.
- **Système de rôles** : Gestion des rôles (par exemple, administrateur, utilisateur classique) avec des permissions appropriées.

### Sécurité
Le système comprend plusieurs mesures de sécurité, notamment :

- **Authentification sécurisée** : Utilisation de mécanismes de sécurité pour protéger les comptes utilisateurs.
- **Protection CSRF et XSS** : Le système utilise des protections contre les attaques CSRF et XSS.
- **Validation des entrées** : Les entrées des utilisateurs sont rigoureusement validées pour éviter les injections SQL et autres vulnérabilités.
- **Gestion des rôles** : Différents niveaux de permission pour les utilisateurs et administrateurs.

### Technologies Utilisées
- **Backend** : PHP, MySQL
- **Frontend** : HTML, CSS (Tailwind CSS), JavaScript
- **Base de données** : MySQL

### Auteur
**Ahmed Taoudi**


