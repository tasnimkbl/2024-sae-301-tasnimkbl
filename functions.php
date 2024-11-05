<?php
// Ajout de support pour les miniatures
add_theme_support('post-thumbnails');

// Fonction pour charger les styles de Google Fonts
function charger_styles_personnalises() {
    wp_enqueue_style('polices-google', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'charger_styles_personnalises');


// Enregistrement des menus
function configurer_menus_theme() {
    register_nav_menus(array(
        'menu-principal' => __('Navigation Principale'),
        'menu-secondaire' => __('Navigation Secondaire'),
    ));
}

function ajouter_styles_theme() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ajouter_styles_theme');

// Initialisation des menus après la configuration du thème
add_action('after_setup_theme', 'configurer_menus_theme');



// Ajout d'une zone de menu personnalisée
function enregistrer_menu_personnalise() {
    register_nav_menu('header-nav', __('Navigation Entête'));
}
add_action('init', 'enregistrer_menu_personnalise');

// Affichage d'un formulaire d'inscription
function afficher_formulaire_inscription_utilisateur() {
    if (is_user_logged_in()) {
        return 'Vous êtes déjà connecté.';
    }

    $output = '
    <form id="form-inscription" action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">
        <div>
            <label for="identifiant">Identifiant</label>
            <input type="text" name="identifiant" id="identifiant" required>
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div>
        <div>
            <label for="confirme_mdp">Confirmer le mot de passe</label>
            <input type="password" name="confirme_mdp" id="confirme_mdp" required>
        </div>
        ' . wp_nonce_field('inscription_nonce', '_wpnonce', true, false) . '
        <input type="submit" value="S\'inscrire">
    </form>';

    return $output;
}

// Connexion personnalisée des utilisateurs
function connexion_utilisateur() {
    if (isset($_POST['login'])) {
        $identifiant = sanitize_user($_POST['username']);
        $mdp = $_POST['password'];

        $creds = array(
            'user_login' => $identifiant,
            'user_password' => $mdp,
            'remember' => true
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            echo 'Erreur de connexion : ' . $user->get_error_message();
        } else {
            wp_redirect(home_url());
            exit;
        }
    }
}

// Personnalisation des éléments du menu en fonction de l'état de connexion
function personnaliser_elements_menu($items, $args) {
    if (is_user_logged_in()) {
        $items = preg_replace('/<li><a href=".*?wp-login.php.*?">Connexion<\/a><\/li>/', '', $items);
        $items = preg_replace('/<li><a href=".*?\/inscription.*?">Inscription<\/a><\/li>/', '', $items);
        $items .= '<li class="menu-item deconnexion-item"><a href="' . wp_logout_url(home_url()) . '">Déconnexion</a></li>';
    } else {
        $items .= '<li class="menu-item"><a href="' . wp_login_url() . '">Connexion</a></li>';
        $items .= '<li class="menu-item"><a href="' . site_url('/inscription') . '">Inscription</a></li>';
    }
    
    return $items;
}
add_filter('wp_nav_menu_items', 'personnaliser_elements_menu', 10, 2);

?>


