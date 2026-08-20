# Portfolio — Serveur Debian

> Portfolio technique full-stack déployé sur un serveur Debian sécurisé,  
> réalisé dans le cadre d'une candidature BUT Informatique.

🌐 **[venatictundra22.com](https://venatictundra22.com)**

---

## 🏗️ Architecture

| Service | Technologie | Version |
|---|---|---|
| Reverse Proxy | Nginx | 1.27 |
| CMS | WordPress (PHP-FPM) | 6.7 |
| Base de données | MariaDB | 10.11 |
| Conteneurisation | Docker Compose | v2 |
| SSL/TLS | Let's Encrypt (Certbot) | v2.11 |
| OS Serveur | Debian 12 | — |

```
Internet
   │
   ▼ :80 / :443
┌──────────┐
│  Nginx   │  ← Reverse proxy, SSL termination, rate limiting
└────┬─────┘
     │ FastCGI (port 9000)
     ▼
┌──────────────┐     ┌──────────────┐
│  WordPress   │────▶│   MariaDB    │
│  (PHP-FPM)   │     │  (réseau     │
│              │     │   interne)   │
└──────────────┘     └──────────────┘
```

> La base de données n'est **jamais** exposée directement sur le réseau hôte.

---

## 🔒 Sécurité

La sécurité est pensée en couches successives : si une couche est compromise, les suivantes contiennent la menace.

### Couche 1 — Serveur Linux

| Mesure | Détail |
|---|---|
| **SSH par clé Ed25519** | Les mots de passe SSH sont désactivés (`PasswordAuthentication no`). Seule une clé privée Ed25519 permet la connexion. Ed25519 est préféré à RSA car plus court, plus rapide et réputé plus résistant. |
| **Root désactivé** | `PermitRootLogin no` dans `sshd_config`. Toute élévation se fait via `sudo` depuis un utilisateur dédié, créant une trace d'audit. |
| **Port SSH personnalisé** | Le port SSH par défaut (22) est changé pour réduire le bruit des bots automatisés. |
| **UFW (Firewall)** | Seuls 3 ports sont ouverts : SSH custom, 80 (HTTP→redirect) et 443 (HTTPS). Tout le reste est `DENY`. |
| **Fail2Ban** | Analyse les logs SSH et Nginx en temps réel. Après N échecs d'authentification, l'IP est bannie automatiquement via `iptables`. |

### Couche 2 — Réseau Docker

```
[Internet] → Nginx (frontend) → WordPress (frontend + backend) → MariaDB (backend seulement)
```

- Deux réseaux Docker distincts : `portfolio-frontend` et `portfolio-backend`
- **MariaDB n'est joignable que par WordPress** — aucun port exposé sur l'hôte (`ports:` absent du service `db`)
- Nginx n'a accès qu'au réseau `frontend` — il ne peut pas atteindre la base de données directement

### Couche 3 — Nginx & TLS

- **Headers HTTP de sécurité** configurés sur chaque réponse :
  - `Strict-Transport-Security` (HSTS) — force HTTPS, même si l'utilisateur tape HTTP
  - `X-Frame-Options: SAMEORIGIN` — empêche le clickjacking via `<iframe>`
  - `Referrer-Policy` — limite les infos envoyées aux sites tiers lors d'un clic
  - `Permissions-Policy` — désactive caméra, micro et géolocalisation
  - `Content-Security-Policy` — restreint les sources de scripts/styles/images autorisées
- **Rate limiting** sur `/wp-login.php` : 5 requêtes/min par IP — stoppe les attaques brute-force
- **Fichiers cachés bloqués** (`location ~ /\.`) — `.env`, `.git`, etc. retournent 403

### Couche 4 — Application WordPress & PHP

- **`DISALLOW_FILE_EDIT true`** dans `wp-config.php` — l'éditeur de code de l'admin WordPress est désactivé. Même si un attaquant accède à l'admin, il ne peut pas modifier les fichiers PHP.
- **`expose_php = Off`** — PHP ne révèle pas sa version dans les headers HTTP
- **`display_errors = Off`** — les erreurs PHP ne sont jamais affichées à l'utilisateur (journalisées uniquement)
- **`open_basedir`** — PHP ne peut accéder qu'aux dossiers nécessaires à WordPress, pas au reste du système
- **`disable_functions`** — les fonctions dangereuses (`exec`, `shell_exec`, `system`, `passthru`…) sont désactivées
- **Sessions PHP sécurisées** — cookies `HttpOnly`, `Secure`, `SameSite=Lax`, renommés (`WPSESSID`)
- **Versions figées dans Docker** — aucune mise à jour automatique non maîtrisée (`mariadb:10.11`, `nginx:1.27`, etc.)

### Gestion des secrets

Aucun secret (mot de passe, clé) n'apparaît dans le code ou dans Git.  
Tous les secrets sont dans un fichier `.env` local, listé dans `.gitignore`.  
Le fichier `.env.example` (versionné) contient uniquement des valeurs `CHANGE_ME` comme guide.


---

## 📁 Structure du projet

```
portfolio/
├── docker-compose.yml          # Orchestration des services
├── .env                        # Secrets (gitignorés)
├── .env.example                # Template de configuration
├── nginx/
│   └── default.conf            # Config Nginx (SSL, headers, PHP-FPM)
├── php-custom/
│   └── security.ini            # Directives PHP sécurisées
├── certbot/
│   ├── conf/                   # Certificats Let's Encrypt
│   └── www/                    # Challenge ACME
└── wp-content/
    ├── themes/
    │   └── twentytwentyfive-child/   # Thème enfant personnalisé
    └── plugins/
        └── portfolio-projets/        # Plugin maison (shortcode projets)
```

---

## 🚀 Déploiement

### Prérequis

- VPS Debian 12
- Docker + Docker Compose v2
- Nom de domaine avec enregistrements DNS configurés

### Installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/VenaticTundra22/portfolio-infra.git portfolio
cd portfolio

# 2. Créer le fichier de secrets
cp .env.example .env
nano .env   # Remplir toutes les valeurs CHANGE_ME

# 3. Lancer la stack
docker compose up -d

# 4. Vérifier que tout est healthy
docker compose ps
```

---

## 🗺️ Roadmap du projet

| Phase | Objectif | Statut |
|---|---|---|
| 1 | Hardening serveur (SSH, UFW, Fail2Ban) | ✅ Terminé |
| 2 | Architecture Docker (Compose, secrets, réseaux isolés) | ✅ Terminé |
| 3 | Workflow DevOps & Git hygiene | ✅ Terminé |
| 4 | DNS, Nginx & SSL Let's Encrypt | ✅ Terminé |
| 5 | Développement Full-Stack (thème enfant, plugin, blog) | ✅ Terminé |
| 6 | Finalisation production & documentation | ✅ Terminé |

---

## ✅ Checklist de validation

- [✅] Impossible de se connecter en root via SSH
- [✅] Impossible d'utiliser un mot de passe SSH
- [✅] `docker compose ps` — tous les services healthy/running
- [✅] Le site redémarre seul après un reboot serveur (`restart: unless-stopped`)
- [✅] Port MariaDB fermé à l'extérieur (pas de `ports:` sur le service `db`)
- [✅] Site en HTTPS avec certificat valide
- [✅] Aucun mot de passe dans le dépôt GitHub
- [✅] Aucune IP en dur dans le code
- [✅] Plugin maison fonctionnel (`portfolio-projets`)
- [✅] Journal de bord publié sur le site (Blog Technique)

---

## 🛠️ Stack de développement (poste local)

| Outil | Usage |
|---|---|
| VS Code + Remote SSH | Édition des fichiers directement sur le serveur |
| Git for Windows | Versionnage et push vers GitHub |
| Windows Terminal | SSH et commandes Docker |
| KeePassXC | Gestion des secrets générés |

---

## 📜 Règles d'or appliquées

- **Zéro mot de passe SSH** — clés Ed25519 uniquement (yubikey si possible)
- **Zéro secret sur Git** — `.env` systématiquement gitignore
- **Principe de moindre privilège** — root désactivé, utilisateur dédié
- **Versions figées** — pas de `:latest` dans Docker
- **Documentation continue** — JOURNAL.md → articles de blog

---

*Projet fil rouge — Candidature BUT Informatique*
