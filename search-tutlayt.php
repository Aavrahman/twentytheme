<?php
/*
 Template Name: Search Tutlayt
 */


$some_search = count($_GET);

$b = true;
$c = $_GET;
foreach ($c as $k => $v):
    if (empty($v)):
        $b = false;
    endif;
endforeach;


$brands = get_terms(array(
    'taxonomy' => 'timazighin',
    'hide_empty' => false, //can be 1, '1' too
    // ... etc
));
?>


<?php
get_header();
?>


<main>
    <section class="page-wrap">
        <div class="container">



            <div class="card">
                <div class="card-body">
                    <form action="<?php echo home_url('/huf-tutlayt') ?>">

                        <div class="form-group">
                            <label for="keyword"> Keyword </label>
                            <input type="text" id="keyword" name="keyword" placeholder="somekey woordd" class="form-control"
                                value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="brand">Fren tutlayt</label>
                            <select id="brand" name="brand" class="form-control">
                                <option vlaue=""></option>
                                <?php foreach ($brands as $brand): ?>
                                    <option <?php echo isset($_GET['brand']) && ($_GET['brand']  == $brand->slug) ? "selected" : ""; ?>
                                        value="<?php echo ($brand->slug) ?>">
                                        <?php echo $brand->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Seg Sekulo:</label>
                                <select name="from_century" class="form-control">
                                    <option vlaue=""></option>
                                    <?php for ($i = 0; $i <= 19; $i += 1): ?>
                                        <option <?php if (isset($_GET['from_century']) && ($_GET['from_century'] == $i)): ?>
                                            selected
                                            <?php endif; ?>
                                            value="<?php echo number_format($i); ?>">
                                            <?php echo  "Seg " . $i; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Ar sekulo:</label>
                                <select name="to_century" class="form-control">
                                    <option vlaue=""></option>
                                    <?php for ($i = 1; $i <= 20; $i += 1): ?>
                                        <option <?php if (isset($_GET['to_century']) && ($_GET['to_century'] == $i)): ?>
                                            selected
                                            <?php endif; ?>
                                            value="<?php echo number_format($i); ?>">
                                            <?php echo "Ar " . $i; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="author"> Amaray </label>
                            <input type="text" id="author" name="author" placeholder="Amaray" class="form-control"
                                value="<?php echo isset($_GET['author']) ? $_GET['author'] : ''; ?>">
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Huf</button>

                    </form>
                </div>
            </div>

            <?php   // Query the Data Base

            $amaray = null;
            if (isset($_GET['author'])) {
                if (!empty($_GET['author'])) {
                    $amaray = number_format($_GET['author']);
                }
            }

            // Paginate the results
            $paged = (get_query_var('page')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'tutlayt',
                'posts_per_page' => 10,
                'orderby' => 'ID',
                'order' => 'DESC',
                'author' => $amaray,
                'tax_query' => [],
                'meta_query' => [
                    'relation' => 'AND',
                ],
                'paged' => $paged,
            );

            if (isset($_GET['keyword'])) {
                if (!empty($_GET['keyword'])) {
                    $args['s'] = sanitize_text_field($_GET['keyword']);
                    //    $args['s'] = 'Amacahu';
                }
            }

            if (isset($brand)) {
                if (!empty($_GET['brand'])) {
                    $args['tax_query'][] = [
                        'taxonomy' => 'timazighin',
                        'field' => 'slug',
                        'terms' => array(sanitize_text_field($_GET['brand'])),
                    ];
                }
            }

            if (isset($_GET['from_century'])):
                if (!empty($_GET['from_century'])):
                    $args['meta_query'][] = array(
                        'key' => 'age',
                        'value' => sanitize_text_field($_GET['from_century']),
                        'type' => 'numeric',
                        'compare' => '>=',
                    );
                endif;
            endif;

            if (isset($_GET['to_century'])):
                if (!empty($_GET['to_century'])):
                    $args['meta_query'][] = array(
                        'key' => 'age',
                        'value' => sanitize_text_field($_GET['to_century']),
                        //    'type' => 'numeric',
                        'compare' => '<=',
                    );
                endif;
            endif;



            if ($b):            // SUBMIT query IF ONLY THE TWO FILEDS ARE NOT EMPTY
                $query = new WP_Query($args);
            else:
                echo '<h2 class="text-center bg-danger rounded text-light"> Pas de Recherche !</h2>';
            endif;



            if ($b):
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
            ?>

                        <a href="<?php the_permalink() ?>">
                            <h2> <?php echo get_the_id() . " : " . get_the_title(); ?></h2>
                        </a>

                        <div class="card">
                            <div class="card-body">
                                <a href='<?php the_post_thumbnail_url(); ?>'>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php //the_title(); 
                                                                                        ?>" class="img-fluid m-1 img-thumbnail" />
                                </a>
                                <p> The ID : <?php echo get_the_id() . "<br> Title : " . get_the_title() . "."  ?> </p>
                                <p> The Date : <?php echo get_the_date() . "<br>Author : " . get_the_author(); ?> </p>
                            </div>
                        </div>

            <?php
                    endwhile;

                    wp_reset_postdata();

                else:
                    echo '<h2 class="text-center bg-danger rounded text-light"> Pas de posts !</h2>';
                endif;
            else:
                echo '<h2 class="text-center bg-danger rounded text-light"> Il faut remplir les deux champs !</h2>';
            endif;
            ?>



            <pre><?php // print_r($query); ?></pre>


            <div class="pagination">
                <?php
                if ($b):
                    echo paginate_links(array(
                        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total'        => $query->max_num_pages,
                        'current'      => max(1, get_query_var('paged')),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf('<i></i> %1$s', __('Prev', 'text-domain')),
                        'next_text'    => sprintf('%1$s <i></i>', __('Next', 'text-domain')),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ));
                endif;
                ?>
            </div>



            <?php previous_post_link(); ?>
            <?php next_post_link(); ?>


        </div>
    </section>
</main>

<?php
get_footer();
?>