<?php get_header(); ?>
<div class="container">
    <h1>Inscription</h1>
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="inscription">
        <!-- Champs d'inscription -->
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">S'inscrire</button>
    </form>
</div>
<?php get_footer(); ?>
