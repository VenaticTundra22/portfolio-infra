<?php
/*
Template Name: HUNT
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HUNT UNIT - Bot Discord</title>
  <meta name="description" content="Découvrez HUNT UNIT, un bot Discord sur-mesure, performant et 100% gratuit. La réponse fiable pour votre serveur.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/Projets/HUNT.css?v=<?php echo filemtime(get_stylesheet_directory() . '/Projets/HUNT.css'); ?>">
</head>
<body <?php body_class(); ?>>

  <div class="node-field"></div>

  <header class="nav">
    <div class="nav-inner">
      <div class="brand">
        <div class="brand-mark"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord.png" alt="Logo H.U.N.T - UNIT"></div>
        <div class="brand-name">H.U.N.T <span>— UNIT</span></div>
      </div>
      <nav class="links">
        <a href="#profil">Profil</a>
        <a href="#histoire">Histoire</a>
        <a href="#code">Code</a>
        <a href="#fonctions">Fonctions</a>
      </nav>
      <a class="nav-cta" href="#histoire">Déployer</a>
    </div>
  </header>

  <main class="hero">
    <div class="wrap">
      <p class="eyebrow">UNITÉ D'AIDE // BOT DISCORD</p>
      <h1>H.U.N.T <span class="dot">—</span> UNIT</h1>
      <p class="hero-sub">
        Un bot Discord sur-mesure conçu pour être performant, qualitatif
        et 100% gratuit. Une réponse fiable pour correspondre exactement à
        vos besoins, sans fioritures.
      </p>
    </div>

    <div class="profile-block" id="profil">
      <div class="banner">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord-banner.png" alt="Bannière H.U.N.T - UNIT">
      </div>
      <div class="avatar-dock">
        <div class="avatar-ring">
          <span class="corner tl"></span><span class="corner tr"></span>
          <span class="corner bl"></span><span class="corner br"></span>
          <div class="avatar"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bot-discord.png" alt="Avatar H.U.N.T - UNIT"></div>
          <div class="status-dot"></div>
        </div>
        <div class="id-tag">
          H.U.N.T&nbsp;-&nbsp;UNIT#7184 <span class="app-badge">APP</span>
        </div>
      </div>
    </div>

    <div class="main-grid">
      <div class="desc-panel">
        <h2>Description</h2>
        <p>
          H.U.N.T (Helper Unit for Network Tasks) est un bot pensé pour la qualité et la performance.
          Fini les bots usines à gaz ou les fonctionnalités payantes bloquées derrière un abonnement.
          H.U.N.T se concentre sur l'essentiel : faire exactement ce dont vous avez besoin,
          de la meilleure façon possible. Chaque fonction est développée pour être parfaite et 100% gratuite.

          <br> <br>

          Ce projet est développé par un étudiant en informatique sur son temps libre
          et n'a aucune ambition de devenir le bot numéro 1 le plus utilisé sur Discord.
          Son seul objectif est d'être utile,
          stable et de répondre parfaitement aux attentes de ceux qui l'utilisent.
        </p>
        <div class="tag-row">
          <span class="tag-chip">100% GRATUIT</span>
          <span class="tag-chip">SUR-MESURE</span>
          <span class="tag-chip">ÉVOLUTIF</span>
          <span class="tag-chip">QUALITÉ & PERFORMANCE</span>
        </div>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a class="install-btn" id="install" href="#histoire">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 5v14M5 12l7 7 7-7" />
            </svg>
            Déployer sur mon serveur
          </a>
          <a class="btn-secondary" href="#histoire" target="_blank" rel="noopener noreferrer" style="cursor: not-allowed; opacity: 0.5;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path
                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
              </path>
            </svg>
            Serveur Support
          </a>
        </div>
      </div>

      <div class="logo-panel">
        <span class="frame-label">UNIT.LOGO</span>
        <span class="frame-label br">H.U.N.T // 7184</span>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/HUNTXDISCORD.png" alt="Logo H.U.N.T - UNIT en grand format">
      </div>
    </div>

    <section class="story-section" id="histoire">
      <div class="desc-panel">
        <h2>
          Histoire du projet <p style="font-size: 12px; color: var(--text-dim);"> au 15/03/2026</p>
        </h2>

        <p>
          L'idée de H.U.N.T a émergé d'un besoin simple : pouvoir avoir un bot Discord qui fait exactement ce que
          je veux et de la manière dont je le veux, sans avoir à passer par des bots tiers. Entre les bots payants
          qui ne proposent pas des fonctions à la hauteur de leurs prix, et les bots gratuits qui proposent trop de
          choses mais restent très limités, il fallait un bot qui soit parfait pour mes besoins.

          <br> <br>

          Le but avec H.U.N.T est de se placer comme le complément parfait aux bots déjà bien implémenté au sein de la
          communauté discord comme Draftbot ou MEE6, qui proposent déjà un large panel de commandes et de venir
          les compléter avec des commandes plus premium et personnalisable, tout en restant gratuit et open-source.

          <br> <br>

          Le bot ne propose a sa sortie que 2 fonctions : la création d'embeds personnalisés et l'envoi de plusieurs
          embeds personnalisés d'un coup (le builder), avec la possibilité de mettre un message texte avant l'envoi des
          embeds. <br>
          Se sont les 2 commandes dont j'avais le plus besoin a se moment la pour simplement faire des messages plus
          propres sur mon serveur.

          <br> <br>

          Je n'ai pour le moment <strong style="font-size: 18px">pas l'ambition de deployer ce bot publiquement</strong>, il est pour le moment réservé a mon
          serveur et a celui de mon cercle proche. 2 fonctionnalités seulement ne mérite pas un déploiement public,
          mais qui sait ce que l'avenir nous réserve. <br>
          Le projet est open-source, donc si vous souhaitez le deployer sur votre propre serveur, ou même reprendre le
          code pour l'améliorer ou y ajouter des fonctionnalités, n'hesitez pas.
        </p>

      </div>
    </section>

    <section class="story-section" id="code">
      <div class="desc-panel">
        <h2>Sous le capot</h2>
        <p>
          H.U.N.T est développé en utilisant les technologies modernes de l'écosystème Node.js pour garantir des
          performances optimales et une réactivité sans faille. L'architecture du bot est pensée pour être légère,
          modulaire et facilement maintenable, permettant d'ajouter de nouvelles fonctionnalités rapidement tout en
          gardant une base de code propre et optimisée pour l'API de Discord.
        </p>

        <p style="color: var(--text-dim); font-size: 14.5px; line-height: 1.75; margin-top: 10px;">
          • <strong>Hébergement Docker :</strong> Le bot est entièrement conteneurisé avec <strong>Docker</strong>, ce
          qui assure un environnement d'exécution isolé, stable et un déploiement simplifié et portable sur n'importe
          quelle machine ou service d'hébergement.
          <br><br>
          • <strong>Architecture Modulaire :</strong> Chaque commande slash possède son propre fichier dans le dossier
          <code>/commands</code>. Le bot charge, met à jour et enregistre automatiquement toutes les commandes auprès de
          l'API Discord au démarrage, évitant ainsi toute configuration manuelle fastidieuse.
        </p>

        <div class="tag-row" style="margin-top: 14px;">
          <span class="tag-chip">Node.js</span>
          <span class="tag-chip">Discord.js</span>
          <span class="tag-chip">Docker</span>
          <span class="tag-chip">Architecture Modulaire</span>
        </div>

        <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-top: 20px;">
          <a class="btn-secondary" href="https://github.com/VenaticTundra22/H.U.N.T---UNIT/blob/main/GUIDE_COMMANDES.md"
            target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
              <polyline points="14 2 14 8 20 8"></polyline>
              <line x1="16" y1="13" x2="8" y2="13"></line>
              <line x1="16" y1="17" x2="8" y2="17"></line>
              <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            Guide technique (readme.md)
          </a>
          <a class="btn-secondary" href="https://github.com/VenaticTundra22/H.U.N.T---UNIT" target="_blank"
            rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path
                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
              </path>
            </svg>
            Code source GitHub
          </a>
        </div>
      </div>
    </section>

    <section class="features" id="fonctions">
      <div class="features-head">
        <h3>Fonctions du bot</h3>
        <span>MODULE_LIST // 03</span>
      </div>
      <div class="feature-grid">
        <?php echo do_shortcode('[hunt_commandes]'); ?>
      </div>
    </section>

  </main>

  <footer>
    <div class="footer-inner">
      <p>H.U.N.T — UNIT // HELPER UNIT FOR NETWORK TASKS</p>
      <div class="footer-links">
        <a href="#profil">Profil</a>
        <a href="#histoire">Histoire</a>
        <a href="#code">Code</a>
        <a href="#fonctions">Fonctions</a>
      </div>
    </div>
  </footer>

</body>
</html>
