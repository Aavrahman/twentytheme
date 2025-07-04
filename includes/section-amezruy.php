    <main>
        <div class="page-wrap">
            <div class="container">

                <h3> Section-amezruy.php</h3>

                <?php
                if (have_posts()):
                    while (have_posts()):

                ?>

                <article>
                <?php
                        the_post();

                        if (has_post_thumbnail()):
                            the_post_thumbnail("medium");
                        else:
                        endif;
                ?>
                        <a href="<?php the_permalink(); ?>">
                            <h2> <?php the_title(); ?> </h2>
                        </a>

                <?php
                        the_excerpt();
                ?>

                        <a href="<?php the_permalink(); ?>"> Gher Artikl </a>

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
                endif;
                ?>

            </div>
        </div>
    </main>