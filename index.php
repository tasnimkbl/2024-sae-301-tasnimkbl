<?php
get_header();
if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        the_content();
    endwhile;
else : ?>
    <div class="homepage-message">
        <h2>Bienvenue sur le site de sélection des projets collectifs !</h2>
        <p>Ce site sert à sélectionner vos projets collectifs :</p>
        <ol>
            <li>1 – Consultez la liste des projets, interrogez les porteurs ou moi</li>
            <li>2 – Constituez des équipes de 4 étudiants avec au moins 1 dans chaque parcours</li>
            <li>3 – Créez-vous un compte</li>
            <li>4 – Un d’entre vous créé une équipe et enrole les membres</li>
            <li>5 – Faites la liste de vos 4 projets préférés</li>
            <li>6 – Faites valider votre équipe</li>
            <li>7 – Attendez la réponse de l’équipe pédagogique</li>
        </ol>
        <p>Bon projet !</p>
    </div>
<?php endif;
get_footer();

