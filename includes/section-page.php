        <div>

            <h3>This is the 'section-content.php' section file</h3>

            <h1> <?php the_title(); ?> </h1>

            <?php
            if (have_posts()):
                while (have_posts()):
            ?>

            <article class="mb-3 p-2 border border-3 border-top-0 border-end-0 border-start-0 d-flex align-items-center justify-content-center row">
                <div class="col-12 col-md-6 col-lg-6 mb-1 d-flex align-items-center justify-content-center">

                <?php
                the_post();

                if (has_post_thumbnail()):
                    the_post_thumbnail("blog-medium");
                else:
                    echo ("No thumbnails");
                endif;
                ?>
                </div>


                <div class="col-12 col-md-6 col-lg-6 d-flex align-item-center justify-content-center">
                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <h2> <?php the_title(); ?> </h2>
                        </a>

                        <section>
                        <?php
                            echo get_the_date('d/m/Y h:i:s');
                        ?>
                        </section>

                        <?php
                           /* the_excerpt(); */ the_content();
                        ?>
                    </div>
                </div>
            </article>


            <?php
                endwhile;
            ?>


            <article>
            <?php
            else:
                echo ("No posts");
            endif;
            ?>
            </article>

        </div>