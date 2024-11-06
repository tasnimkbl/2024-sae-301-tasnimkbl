<?php get_header(); ?>
<div class="container">
    <h1>Contact</h1>
    <form method="post" action="">
        <label for="name">Nom:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="message">Message:</label>
        <textarea name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>
<?php get_footer(); ?>
