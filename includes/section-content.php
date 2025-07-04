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
                        the_excerpt(); //  the_content();
                ?>

                            <a class="a-read" href="<?php the_permalink(); ?>"> Ger artikl </a>


                <?php
                    endwhile;
                ?>
                </article>

                <section>
                <?php
                            global $wp_query;
                            $big = 999999999;
                            echo paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $wp_query->max_num_pages
                            ));
                ?>
                </section>

                <?php
                    else:
                        echo ("No posts");
                    endif;
                ?>
        
            </div>
        </div>
    </main>