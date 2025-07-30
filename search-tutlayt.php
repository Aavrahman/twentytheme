<?php
/*
 Template Name: Search Tutlayt
 */

$some_search = count($_GET);

$brands = get_terms(array(
    'taxonomy' => 'timazighin',
    'hide_empty' => false, //can be 1, '1' too
    // ... etc
));

$b = true;
$c = $_GET;
foreach ($c as $k => $v) {
    if (empty($v)) {
        $b = false;
    }
}
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

                        <button type="submit" class="btn btn-success btn-lg btn-block">Huf</button>

                    </form>
                </div>
            </div>

            <?php   // Query the Data Base
            $args = array(
                'post_type' => 'tutlayt',
                'posts_per_page' => 10,
                'tax_query' => [],
                'meta_query' => [
                    'relation' => 'AND',
                ],
            );

            if (isset($_GET['keyword'])) {
                if (!empty($_GET['keyword'])) {
                    $args['s'] = sanitize_text_field( $_GET['keyword'] );
                }
            }

            if(isset($brand)) {
                if(!empty($_GET['brand'])) {
                    $args['tax_query'][] = [
                        'taxonomy' => 'timazighin',
                        'field' => 'slug',
                        'terms' => array( sanitize_text_field( $_GET['brand']) ),
                    ];
                }
            }


            // MAKING THE query IF 
            if ($b):
                $query = new WP_Query($args);
            else:
                echo '<h2 class="text-center bg-danger rounded text-light"> Pas de Recherche !</h2>';
            endif;

            if ($b):
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
            ?>
                        <h2> <?php the_title(); ?> </h2>

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
                else:
                    echo '<h2 class="text-center bg-danger rounded text-light"> Pas de posts !</h2>';
                endif;
            else:
                echo '<h2 class="text-center bg-danger rounded text-light"> Pas de résultats !</h2>';
            endif;
            ?>



            <pre><?php // print_r($query); 
                    ?></pre>


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