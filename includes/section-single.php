    <main>
        <div class="page-wrap">
            <div class="container">

            <h3>Here is the section.single.php</h3>


                <article>
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();

                ?>


                        <h1> <?php the_title(); ?> </h1>



                        <section>
                        <?php
                            echo get_the_date('d/m/Y h:i:s');
                        ?>
                        </section>


                <article class="card-body d-flex align-item-center justify-content-center row">
                    <section class="col-12 col-md-6 col-lg-6">
                        <?php
                            if(has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="img-fluid m-1 img-thumbnail" />
                            <?php
                            else:
                                echo("No images for thos post !");                        
                            endif;
                        ?>
                    </section>

                        

                    <section  class="col-12 col-md-6 col-lg-6">
                <?php the_content(); ?>

                <?php
                    
                        $fname = get_the_author_meta('first_name');
                        $lname = get_the_author_meta('last_name');
                        echo '<p>Published by : '.$fname. ' ' .$lname.'</p>';
                        //the_author();
                ?>

                <?php
                        echo get_the_date('d/m/Y h:i:s');
                ?>
                    </section>
                </article>


                <article>
                <?php
                        $tags = get_the_tags();
                        if($tags):
                            foreach($tags as $tag):
                ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge badge-success">
                                    <?php echo $tag->name; ?>
                                </a>


                <?php
                            endforeach;
                        else:
                            echo('Pas de tags sur cet article');
                        endif;
                ?>
                </article>


                <article>
                <?php
                        $categories = get_the_category();
                        if($categories):
                            foreach($categories as $cat):
                ?>
                                <a href="<?php echo get_category_link($cat->term_id); ?>" class="bg-success badge badge-success p-2">
                                    <?php echo $cat->name; ?>
                                </a>
                <?php
                            endforeach;
                        else:
                            echo('This article is affiliated to no category');
                        endif;
                ?>
                </article>


                <?php
                    comments_template();
                ?>


                <?php
                    endwhile;
                ?>


                <article>
                <?php
                else:
                    echo("No posts available !");
                endif;
                ?>
                </article>


            </div>
        </div>
    </main>