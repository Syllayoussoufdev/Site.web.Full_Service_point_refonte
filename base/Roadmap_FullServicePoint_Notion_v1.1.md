# 🏗️ Roadmap — Full Service Point SARL v1.1

> **Stack :** Laravel 11 · Blade · Tailwind CSS · MySQL
> **Dev :** Docker local — PHP 8.3 · Nginx · MySQL 8 · Node 20 · phpMyAdmin
> **Prod :** Hébergement mutualisé PHP/Laravel — déploiement FTP pur (pas de SSH)
> **Équipe admin :** 2 à 5 personnes · Rôles : Admin / Éditeur

---

## ⚙️ Phase 0 — Environnement Docker local
> **Livrable :** Docker opérationnel, Laravel accessible sur localhost:8080

- [ ] Créer `docker-compose.yml` (services : app, nginx, db, node, phpmyadmin)
- [ ] Écrire `docker/php/Dockerfile` (PHP 8.3-fpm + extensions Laravel)
- [ ] Écrire `docker/nginx/default.conf` (vhost Laravel, DocumentRoot → /public)
- [ ] Lancer `docker-compose up -d`
- [ ] Installer Laravel 11 depuis le conteneur `app`
- [ ] Configurer `.env` local (DB_HOST=db, DB_DATABASE, DB_USER, DB_PASSWORD)
- [ ] Installer Tailwind CSS + Vite depuis le conteneur `node`
- [ ] Vérifier `http://localhost:8080` (Laravel) et `http://localhost:8081` (phpMyAdmin)

> ⚠️ Docker = local uniquement. La production tourne sur hébergement mutualisé sans Docker.

---

## 🔐 Phase 1 — Auth & Dashboard
> **Livrable :** Dashboard accessible et sécurisé

- [ ] Système d'authentification Laravel natif (login / logout)
- [ ] Middleware rôles : `Admin` (accès total) / `Éditeur` (articles + messages)
- [ ] Layout Blade dashboard (sidebar + topbar)
- [ ] Page d'accueil admin (compteurs : articles, messages non lus, services)
- [ ] Migration `users` avec colonne `role` (enum: admin/editeur)

---

## 🛠️ Phase 2 — CRUD Back-office
> **Livrable :** Back-office complet et fonctionnel

- [ ] CRUD Articles (titre, slug, contenu, image, catégorie, statut, date_publication)
- [ ] Upload image articles → `storage/app/public/articles/`
- [ ] CRUD Services (titre, slug, description, icône, ordre, statut)
- [ ] Gestion Messages contact (lecture, marquage lu/non-lu, suppression)
- [ ] Gestion Utilisateurs — Admin seulement (créer, modifier rôle, désactiver)
- [ ] Infos site — système clé/valeur (coordonnées, textes globaux, réseaux sociaux)

---

## 📦 Phase 3 — Collecte des contenus
> **Livrable :** Base de données peuplée · ⛔ Phase 4 bloquée tant que cette phase n'est pas terminée

- [ ] Rassembler textes définitifs avec le client (6 pôles de services)
- [ ] Collecter et valider les images (format web, droits, compression)
- [ ] Saisir les 6 services dans le dashboard
- [ ] Rédiger et publier 3 articles de lancement
- [ ] Valider la page À propos (textes histoire, mission, équipe)

---

## 🎨 Phase 4 — Frontend Blade
> **Livrable :** Site vitrine complet et responsive

- [ ] Layout public (`layouts/public.blade.php`) — header navigation + footer
- [ ] Page **Accueil** — hero, présentation, 6 pôles, 3 dernières actus, CTA
- [ ] Page **Services** — liste des pôles + page détail par pôle
- [ ] Page **À propos** — histoire, mission, vision, équipe
- [ ] Page **Blog** — liste paginée, filtres catégories, barre de recherche
- [ ] Page **Article** — vue individuelle article
- [ ] Page **Contact** — formulaire + stockage BDD + notification email
- [ ] Responsive mobile sur toutes les pages (Tailwind breakpoints)

---

## 🚀 Phase 5 — Déploiement FTP (Docker → Prod mutualisé)
> **Livrable :** Site en production

**Préparation dans Docker (local) :**
- [ ] `npm run build` dans le conteneur `node` → génère `public/build/`
- [ ] `composer install --optimize-autoloader --no-dev` dans le conteneur `app`
- [ ] Export BDD via phpMyAdmin Docker → fichier `.sql`
- [ ] Test final complet en local avant upload

**Déploiement FTP :**
- [ ] Uploader tous les fichiers Laravel (inclure `vendor/` et `public/build/`)
- [ ] Uploader `public/storage/` (images des articles et services)
- [ ] Configurer `.env` production (APP_ENV=production, DB hébergeur, MAIL)
- [ ] Importer le `.sql` via phpMyAdmin de l'hébergeur
- [ ] Vérifier que le `DocumentRoot` pointe bien sur le dossier `/public`
- [ ] Tester toutes les pages en ligne

---

## ✅ Phase 6 — Recette & Livraison
> **Livrable :** Projet livré et équipe autonome

- [ ] Tests formulaire contact (réception email)
- [ ] Vérification responsive (mobile, tablette, desktop)
- [ ] Corrections visuelles finales
- [ ] Optimisation des images (compression)
- [ ] Formation équipe sur le dashboard (Admin + Éditeur)
- [ ] Rédiger guide utilisateur simple (1 page PDF)
- [ ] **Livraison officielle ✅**

---

## ⚠️ Récapitulatif Docker → FTP

| Action | En local (Docker) | En prod (FTP mutualisé) |
|---|---|---|
| Migrations BDD | `php artisan migrate` dans conteneur `app` | Import `.sql` via phpMyAdmin hébergeur |
| Dépendances PHP | `composer install` dans conteneur `app` | Uploader `vendor/` via FTP (~30 MB) |
| Assets CSS/JS | `npm run build` dans conteneur `node` | Uploader `public/build/` via FTP |
| Images/Storage | `php artisan storage:link` (symlink) | Uploader `public/storage/` via FTP |
| Variables env | `.env` local (DB_HOST=db) | `.env` prod édité via FTP |

---

## 🚫 Hors périmètre V1

- Multilingue FR/EN
- Newsletter
- Espace client / extranet
- Paiement en ligne
- SEO avancé (prévu V2)
- Mode sombre
