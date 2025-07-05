<h3>This is the 'section-content.php' section file</h3>
    <main>
        <div class="page-wrap">
            <div class="container">

                <?php
                    if (have_posts()):
                        while (have_posts()):
                ?>

                <article>
                <?php
                            the_post();

                            if(has_post_thumbnail()):
                                the_post_thumbnail("medium");
                            else:
                                echo("No thumbnails");
                            endif;
                ?>

                            <a href="<?php the_permalink(); ?>"> <h2> <?php the_title(); ?> </h2> </a>
                <?php
                            the_content();

                        endwhile;
                ?>
                </article>

                <article>
                <?php
                    else:
                        echo ("No posts");
                    endif;
                ?>
                </article>
        
            </div>
        </div>
    </main>