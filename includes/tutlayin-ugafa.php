<?php

$attribs = get_query_var('attributes');

$a = shortcode_atts(
    array(
        'src' => '',
        'id' => '',
        'date' => '',
        'title' => '',
        'author' => '',
        'reference' => '',
        'tama' => '',
    ),
    $attribs,
);

$args = [
    'post_type' => 'tutlayt',
    'posts_per_page' => 5,
    'orderby' => 'ID',
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'AND',
    ),
    'meta_query' => ['relation' => 'AND'],
];

if($a['src'] == "") :
    $args['meta_query'][] = array(
        'key' => 'reference',
        'value' => $attribs['reference'], // N'affiche que les PostType dont le 'Custom Field' Reference correspond à $attribs['reference']
    );
    $args['tax_query'][] = array(
            'taxonomy' => 'timazighin',
            'field' => 'slug',
            'terms' => $attribs['tama'],  // N'affiche que la taxonomie dont la valeur de 'slug' correspond à $attribs['tama']
    );
endif;


$query = new WP_Query($args);


if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
        echo ('<div class="card">');
        echo ('<div class="card-body">');

        if (has_post_thumbnail()):
            $a['src'] = get_the_post_thumbnail_url();
            $a['id'] = get_the_id();
            $a['title'] = get_the_title();
            $a['date'] = get_the_date();
            $a['author'] = get_the_author();
?>
            <h2> <?= $a['title']; ?> </h2>
            <!-- <a href='<?php // the_post_thumbnail_url(); ?>'> <img src='<?php // the_post_thumbnail_url); ?>'> </a> -->
            <a href='<?php echo ($a['src']); ?>'> <img src='<?php echo ($a['src']); ?>'> </a> <br>
            * Id : <?php echo ($a['id']); ?> <br>
            * Date : <?php echo ($a['date']); ?> <br>
            * Author : <?php echo ($a['author']); ?> <br>
<?php
        else:
            echo("<p> No thumbnail, so no post ! </p>");
        endif;

        /*  echo '<p>* ID : '; the_id();  echo"<br>* Title : ";  the_title(); echo'<br>';
        echo '* Date : '; the_date(); echo"<br>* Author : "; the_author(); echo'</p>';
        echo '<p>ID: ' . get_the_id() . "<br>-Title: " . get_the_title() . '<br>';
        echo 'Date: ' . get_the_date() . "<br>-Author: " . get_the_author() . '</p>'; */
        echo ('</div>');
        echo ('</div>');
    endwhile;
else:
    echo ('<div class="card">');
    echo ('<div class="card-body">');
    echo "<h3>There is no PostType called <span class='bg-danger'>" . $args['post_type'] . "</span></h3>";
    echo ('</div>');
    echo ('</div>');
endif;
?>