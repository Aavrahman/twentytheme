<h3>Here is the section.singletutlayt.php</h3>


    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
    ?>


            <article class="col-12 col-md-6 col-lg-12  d-flex align-items-center justify-content-center">
                <?php
                if (has_post_thumbnail()):
                ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid m-1 img-thumbnail" />
                <?php
                else:
                // echo ("No images for thos post !");
                endif;
                ?>
            </article>


            <section>
                <h1 class="d-flex justify-content-center"> <?php the_title(); ?> </h1>

                <?php
                echo get_the_date('d/m/Y h:i:s');
                ?>

                <?php
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                echo '<p>Inna-t-id : ' . $fname . ' ' . $lname . '</p>';
                //the_author();
                ?>
            </section>

            <!--
            <article class="card-body d-flex align-item-center justify-content-center col"> -->
            <article class="col-12 col-md-6 col-lg-12 d-flex align-items-center justify-content-center">

                <section class="col-12 col-md-6 col-lg-6">
                    <?php
                    the_content();
                    ?>
                </section>

                <section class="card ms-5 p-3">
                    <h2>Section latérale</h2>
                    <div class="card-body">
                        <ul>
                            <?php
                            if (get_post_meta($post->ID, 'Locuteurs', true)): ?>
                                <li>Locuteurs : <?php echo get_post_meta($post->ID, 'Locuteurs', true); ?> millions </li>
                            <?php
                            else:
                                echo ("<p>Pas de locuteurs.</p>");
                            endif; ?>
                            <?php
                            if (get_post_meta($post->ID, 'Age', true)): ?>
                                <li>Existe depuis : <?php echo get_post_meta($post->ID, 'Age', true); ?> siècles </li>
                            <?php
                            else:
                                echo ("<p>Ur ittwassen ara.</p>");
                            endif; ?>
                            <?php
                            if (get_post_meta($post->ID, 'Reference', true)): ?>
                                <li>Amusnaw : <?php echo get_post_meta($post->ID, 'Reference', true); ?> gar-asen </li>
                            <?php
                            else:
                                echo ("<p>Ulac Reference nessen.</p>");
                            endif; ?>
                        </ul>
                    </div>
                </section>
            </article>


            <article>
                <section>
                    <?php               // Des tags éventuellement
                    $tags = get_the_tags();
                    if ($tags):
                        foreach ($tags as $tag):
                    ?>

                            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge badge-success">
                                <?php
                                echo $tag->name;
                                ?>
                            </a>

                    <?php
                        endforeach;
                    else:                   // Sinon un message d'insiponibilité
                        echo ('Ulac tag di tqertilt.');
                    endif;
                    ?>
                </section>
                <section>
                    <?php                   // Des catégories éventuellement
                    $categories = get_the_category();
                    if ($categories):
                        foreach ($categories as $cat):
                    ?>

                            <a href="<?php echo get_category_link($cat->term_id); ?>" class="bg-success badge badge-success p-2">

                                <?php
                                echo $cat->name;
                                ?>
                            </a>

                    <?php
                        endforeach;
                    else:                   // Sinon message d'indisponibilité
                        echo ('This article is affiliated to no category');
                    endif;
                    ?>
                </section>
                <section>
                    <?php
                    comments_template();
                    ?>
                </section>
            </article>


        <?php
        endwhile;
        ?>


    <?php
    else:
        echo ("No posts available !");
    endif;
    ?>