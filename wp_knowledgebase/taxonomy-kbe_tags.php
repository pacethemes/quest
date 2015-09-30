<?php
    get_header();
    
    // Classes For main content div
    if(KBE_SIDEBAR_INNER == 0) {
        $kbe_content_class = 'class="kbe_content_full col-md-12"';
    } elseif(KBE_SIDEBAR_INNER == 1) {
        $kbe_content_class = 'class="kbe_content_right col-md-9"';
    } elseif(KBE_SIDEBAR_INNER == 2) {
        $kbe_content_class = 'class="kbe_content_left col-md-9"';
    }
    
    // Classes For sidebar div
    if(KBE_SIDEBAR_INNER == 0) {
        $kbe_sidebar_class = 'kbe_aside_none';
    } elseif(KBE_SIDEBAR_INNER == 1) {
        $kbe_sidebar_class = 'kbe_aside_left col-md-3';
    } elseif(KBE_SIDEBAR_INNER == 2) {
        $kbe_sidebar_class = 'kbe_aside_right col-md-3';
    }
    
    // Query for tags
    $kbe_tag_slug = get_queried_object()->slug;
    $kbe_tag_name = get_queried_object()->name;
    
    $kbe_tag_post_args = array(
        'post_type' => KBE_POST_TYPE,
        'posts_per_page' => 999,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => KBE_POST_TAGS,
                'field' => 'slug',
                'terms' => $kbe_tag_slug
            )
        )
    );
    $kbe_tag_post_qry = new WP_Query($kbe_tag_post_args);
?>

<section class="quest-row" id="pace-kbe-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pace-kb-head">

                    <h1 class="page-title"><?php echo get_the_title(KBE_PAGE_TITLE) ?></h1>

                    <p><?php echo term_description( $kbe_tag_slug ) ?></p>

                    <!--Breadcrum-->
                    <?php
                        if(KBE_BREADCRUMBS_SETTING == 1){
                    ?>
                        <div class="kbe_breadcrum">
                            <?php echo kbe_breadcrumbs(); ?>
                        </div>
                    <?php
                        }
                    ?>
                    <!--/Breadcrum-->

                    <!--search field-->
                    <?php
                        if(KBE_SEARCH_SETTING == 1){
                            kbe_search_form();
                        }
                    ?>
                    <!--/search field-->
                </div>
            </div>
        </div>
    </div>
</section>

<div id="kbe_container" class="quest-row">
    <div class="container">
    <div class="row">
    
    <!--content-->
    <div id="kbe_content" <?php echo $kbe_content_class; ?>>
        <!--leftcol-->
        <div class="kbe_leftcol">
            <!--<articles>-->
            <div class="kbe_articles">
                <h2><strong>Tag: </strong><?php echo $kbe_tag_name; ?></h2>

                <ul>
            <?php
                if($kbe_tag_post_qry->have_posts()) :
                    while($kbe_tag_post_qry->have_posts()) :
                        $kbe_tag_post_qry->the_post();
            ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                            <?php pace_kb_is_plus(); ?>
                        </li>
            <?php
                    endwhile;
                endif;
            ?>
                </ul>

            </div>
        </div>
        <!--/leftcol-->

    </div>
	
    <!--aside-->
    <div class="kbe_aside <?php echo $kbe_sidebar_class; ?>">
    <?php
        if((KBE_SIDEBAR_INNER == 2) || (KBE_SIDEBAR_INNER == 1)){
            dynamic_sidebar('kbe_cat_widget');
        }
    ?>
    </div>
    <!--/aside-->
    
</div>
</div>
</div>
<?php
    get_footer();
?>