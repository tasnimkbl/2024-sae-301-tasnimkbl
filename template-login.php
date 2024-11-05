<?php
/* Template Name: Connexion */

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['login'])) {
    $creds = array();
    $creds['user_login'] = sanitize_text_field($_POST['username']);
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = true;

    // Essayer de connecter l'utilisateur
    $user = wp_signon($creds, false);

    // Vérifier si la connexion a réussi
    if (is_wp_error($user)) {
        echo '<div class="error-message">' . esc_html($user->get_error_message()) . '</div>';
    } else {
        // Redirige vers la page d'accueil après la connexion
        wp_redirect(home_url());
        exit;
    }
}
?>

<div class="login-container">
    <h2 class="login-title">Connexion à votre compte</h2>
    
    <!-- Formulaire de connexion -->
    <form method="post" class="login-form">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" required class="form-input">
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required class="form-input">
        </div>
        
        <input type="submit" name="login" value="Connexion" class="form-submit">
    </form>
</div>
