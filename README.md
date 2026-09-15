# 🏛️ Application Gestion MOA Architects

Une plateforme web complète dédiée à la Maîtrise d'Ouvrage (MOA) et aux cabinets d'architectes. Cette application centralise la gestion des projets immobiliers, le suivi des terrains, la contractualisation et la relation client, le tout au travers d'une architecture moderne et découplée[cite: 8, 9].

## 🏗️ Architecture & Technologies

Le projet repose sur une séparation claire entre l'API et l'interface utilisateur :

### ⚙️ Backend (`/backend`)
* **Framework :** Laravel (PHP)[cite: 8, 9].
* **Base de données :** MySQL gérée via l'ORM Eloquent et le système de migrations[cite: 8, 9].
* **Sécurité & Auth :** Authentification robuste implémentée via JWT (`jwt.php`) pour sécuriser les endpoints de l'API[cite: 8, 9].
* **Modèles de données :** Structure relationnelle complexe gérant les Utilisateurs, Rôles, Projets, Terrains, Contrats, Demandes, Rendez-vous et Commentaires[cite: 8, 9].

### 💻 Frontend (`/frontend`)
* **Framework :** ReactJS propulsé par Vite pour un environnement de développement ultra-rapide[cite: 8, 9].
* **Styling :** Tailwind CSS (`tailwind.config.js`) pour un design moderne, responsive et facilement maintenable[cite: 8, 9].
* **Composants :** Interface modulaire (graphiques, tables filtrables, modales, calendriers) avec gestion centralisée de l'état (Redux/State slices)[cite: 8, 9].

---

## ✨ Fonctionnalités Principales

* **Gestion de Projets :** Création, suivi d'avancement (statut `termine`) et galerie d'images (`images_projets`) pour chaque chantier[cite: 8, 9].
* **Portefeuille de Terrains :** Référencement des parcelles avec documentation photographique (`images_terrains`) et caractéristiques techniques[cite: 8, 9].
* **Suivi Contractuel :** Génération et gestion des contrats avec suivi de lecture (`vu`) et de signature (`segne`)[cite: 8, 9].
* **Relation Client (CRM) :** 
  * Système de prise et de suivi de rendez-vous (`rendez_vouses`)[cite: 8, 9].
  * Centralisation des demandes clients avec possibilité de les associer directement à des projets (`ajoute_aux_projets`)[cite: 8, 9].
  * Espace de commentaires pour faciliter la communication[cite: 8, 9].

---

## 🚀 Instructions d'Installation

### Prérequis
* [Node.js](https://nodejs.org/) & npm
* [PHP](https://www.php.net/) & [Composer](https://getcomposer.org/)
* Un serveur de base de données local (MySQL, MariaDB, etc.)

### 1. Configuration du Backend (Laravel)
Ouvrez un terminal et naviguez dans le dossier backend :
```bash
cd backend

# Installer les dépendances PHP
composer install

# Créer le fichier de configuration de l'environnement
cp .env.example .env

```

**Base de données :**
Ouvrez le fichier `.env` nouvellement créé et configurez vos accès à la base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_moa
DB_USERNAME=root
DB_PASSWORD=

```

**Initialisation et lancement :**

```bash
# Générer la clé de l'application et la clé JWT (si applicable)
php artisan key:generate
php artisan jwt:secret

# Lancer les migrations pour créer les tables (projets, terrains, contrats, etc.)
php artisan migrate

# Démarrer le serveur local Laravel
php artisan serve

```

L'API Backend sera accessible à l'adresse `http://127.0.0.1:8000`.

### 2. Configuration du Frontend (ReactJS / Vite)

Ouvrez un **nouveau** terminal et naviguez dans le dossier frontend :

```bash
cd frontend

# Installer les dépendances Node
npm install

# Démarrer le serveur de développement Vite
npm run dev

```

L'interface utilisateur sera accessible depuis votre navigateur (généralement sur `http://localhost:5173`).

---

## 🔐 Sécurité & Bonnes Pratiques

> **Authentification JWT :** Les requêtes du frontend vers le backend doivent inclure le token JWT généré lors de la connexion dans les en-têtes HTTP (`Authorization: Bearer <token>`).
> **Fichiers Uploadés :** Les images des projets et des terrains sont stockées de manière sécurisée. Assurez-vous que le dossier `storage` dispose des bonnes permissions d'écriture et exécutez `php artisan storage:link` pour rendre les fichiers publiquement accessibles si nécessaire.
> 
> 

```

```
