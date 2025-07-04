<h3>This is the section-content.php file</h3>

<?php
    if(have_posts()):
        while(have_posts()):
            the_post();
?>

            <a href="<?php the_permalink(); ?>">
                <h2> <?php the_title(); ?> </h2>
            </a>
<?php        
            the_excerpt(); //  the_content();
?>

        <a class="a-read" href="<?php the_permalink(); ?>"> Ger artikl </a>


<?php
        endwhile;
    else:
        echo("No posts");
    endif;
?>