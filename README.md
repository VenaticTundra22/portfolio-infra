# 🦆 Portfolio — srv-canard

Portfolio technique full-stack déployé sur un VPS Debian durci,
dans le cadre d'une candidature BUT Informatique.

## 🏗️ Architecture

| Service            | Technologie     |
|--------------------|-----------------|
| Reverse Proxy      | Nginx           | 
| CMS                | WordPress       |
| Base de données    | MariaDB         |
| Conteneurisation   | Docker Compose  |
| OS Serveur         | Debian          |

## 🔒 Sécurité

- Authentification SSH par clé Ed25519 et yubikey uniquement
- Accès root désactivé
- Pare-feu UFW (ports exposés : SSH custom, 80, 443)
- Fail2Ban actif
- HTTPS via Let's Encrypt (renouvellement automatique)
- Secrets externalisés dans `.env` (jamais dans Git)
- Réseau Docker isolé (BDD non exposée)

## 📦 Déploiement

### Prérequis
- VPS Debian 12
- Docker + Docker Compose v2
- Nom de domaine avec DNS configuré
