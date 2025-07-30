<?php
$args = [
    'post_type' => 'tutlayt',
    'posts_per_page' => 5,
    'orderby' => 'ID',
    'order' => 'DESC', /*
    'meta_key' => 'Locuteurs',
    'value' => '7 imelyan',
    /*
    'tax_query' => array(
        array(
            'taxonomy' => 'timazighin',
            'field' => 'Reference',
        ),
    ), */
];

$query = new WP_Query($args);

if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
        echo('<div class="card">');
        echo ('<div class="card-body">');
?>
        <a href='<?php the_post_thumbnail_url(); ?>'>
            <img src='<?php the_post_thumbnail_url(); ?>'>
        </a>
<?php
        echo '<p>* ID : '; the_id();  echo"<br>* Title : ";  the_title(); echo'<br>';
        echo '* Date : '; the_date(); echo"<br>* Author : "; the_author(); echo'</p>';    /*
        echo '<p> The ID : ' . get_the_id() . " - Title : " . get_the_title() . '<br>';
        echo 'The Date : ' . get_the_date() . " - Author : " . get_the_author() . '</p>';     */
        echo('</div>');
        echo ('</div>');
    endwhile;
else:
    echo ('<div class="card">');
        echo ('<div class="card-body">');
            echo "<h3>There is no PostType called <span style='color:red'>" . $args['post_type']."</span></h3>";
        echo ('</div>');
    echo ('</div>');
endif;
?>