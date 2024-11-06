<?php get_header(); ?>
<div class="container">
    <h1>Connexion</h1>
    <form method="post" action="<?php echo esc_url(wp_login_url()); ?>">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="log" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="pwd" required>

        <button type="submit">Se connecter</button>
    </form>
</div>
<?php get_footer(); ?>
