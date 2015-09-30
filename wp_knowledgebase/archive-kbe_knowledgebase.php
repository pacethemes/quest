<?php
    get_header();
    
    // Classes For main content div
    if(KBE_SIDEBAR_HOME == 0) {
        $kbe_content_class = 'class="kbe_content_full col-md-12"';
    } elseif(KBE_SIDEBAR_HOME == 1) {
        $kbe_content_class = 'class="kbe_content_right col-md-9"';
    } elseif(KBE_SIDEBAR_HOME == 2) {
        $kbe_content_class = 'class="kbe_content_left col-md-9"';
    }
    
    // Classes For sidebar div
    if(KBE_SIDEBAR_HOME == 0) {
        $kbe_sidebar_class = 'kbe_aside_none';
    } elseif(KBE_SIDEBAR_HOME == 1) {
        $kbe_sidebar_class = 'kbe_aside_left col-md-3';
    } elseif(KBE_SIDEBAR_HOME == 2) {
        $kbe_sidebar_class = 'kbe_aside_right col-md-3';
    }
?>

<section class="quest-row" id="pace-kbe-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="module-text">
                    <h1 style="text-align: center; color: #fff;">How Can We Help You ?</h1>
                    <!--search field-->
                    <?php
                        if(KBE_SEARCH_SETTING == 1){
                            kbe_search_form();
                        }
                    ?>
                    <!--/search field-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

<div id="kbe_container" class="quest-row">

    <div class="container">
    <div class="row">
    <div class="col-md-12">
   
    <!-- <h3 class="page-title"><?php echo get_the_title(KBE_PAGE_TITLE) ?></h3> -->

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

    </div>
    <!--content-->
    <div id="kbe_content" <?php echo $kbe_content_class; ?>>

        <!--leftcol-->
        <div class="kbe_leftcol">
            <div class="kbe_categories">
            <?php
               $kbe_cat_args = array(
                                    'orderby'       => 'terms_order', 
                                    'order'         => 'ASC',
                                    'hide_empty'    => true,
                                    'parent'        => 0
                                );

                $kbe_terms = get_terms(KBE_POST_TAXONOMY, $kbe_cat_args);

                foreach($kbe_terms as $kbe_taxonomy){
                    $kbe_term_id = $kbe_taxonomy->term_id;
                    $kbe_term_slug = $kbe_taxonomy->slug;
                    $kbe_term_name = $kbe_taxonomy->name;
            ?>
                    <div class="kbe_category">
                        <h2>
                            <a href="<?php echo get_term_link($kbe_term_slug, 'kbe_taxonomy') ?>">
                                <?php echo $kbe_term_name; ?>
                            </a>
                            <span class="kbe_count">
                                <?php
                                    echo $kbe_taxonomy->count;
                                    _e(' Articles','kbe');
                                ?>
                            </span>
                        </h2>
                        
                        <?php
                            $kbe_child_cat_args = array(
                                                    'orderby'       => 'terms_order', 
                                                    'order'         => 'ASC',
                                                    'parent'        => $kbe_term_id,
                                                    'hide_empty'    => true, 
                                                );

                            $kbe_child_terms = get_terms(KBE_POST_TAXONOMY, $kbe_child_cat_args);
                            
                            if($kbe_child_terms) {
                        ?>
                            <div class="kbe_child_category" style="display: none;">
                            <?php
                                foreach($kbe_child_terms as $kbe_child_term){
                                    $kbe_child_term_id = $kbe_child_term->term_id;
                                    $kbe_child_term_slug = $kbe_child_term->slug;
                                    $kbe_child_term_name = $kbe_child_term->name;
                            ?>
                                    <h3>
                                        <a href="<?php echo get_term_link($kbe_child_term_slug, 'kbe_taxonomy') ?>">
                                            <?php echo $kbe_child_term_name; ?>
                                        </a>
                                        <span class="kbe_count">
                                            <?php
                                                echo $kbe_child_term->count;
                                                _e(' Articles','kbe');
                                            ?>
                                        </span>
                                    </h3>
                                    <ul class="kbe_child_article_list">
                                <?php
                                    $kbe_child_post_args = array(
                                                                'post_type' => KBE_POST_TYPE,
                                                                'posts_per_page' => -1,
                                                                'orderby' => 'menu_order',
                                                                'order' => 'ASC',
                                                                'tax_query' => array(
                                                                        array(
                                                                                'taxonomy' => KBE_POST_TAXONOMY,
                                                                                'field' => 'term_id',
                                                                                'terms' => $kbe_child_term_id
                                                                        )
                                                                )
                                                        );
                                    $kbe_child_post_qry = new WP_Query($kbe_child_post_args);
                                    if($kbe_child_post_qry->have_posts()) :
                                        while($kbe_child_post_qry->have_posts()) :
                                            $kbe_child_post_qry->the_post();
                                ?>
                                            <li>
                                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </li>
                                <?php
                                        endwhile;
                                    else :
                                        echo "No posts";
                                    endif;
                                ?>
                                </ul>
                            <?php
                                }
                            ?>
                            </div>
                        <?php
                            }
                        ?>

                        <ul class="kbe_article_list">
                        <?php
                            $kbe_tax_post_args = array(
                                                        'post_type' => KBE_POST_TYPE,
                                                        'posts_per_page' => -1,
                                                        'orderby' => 'menu_order',
                                                        'order' => 'ASC',
                                                        'tax_query' => array(
                                                                array(
                                                                        'taxonomy' => KBE_POST_TAXONOMY,
                                                                        'field' => 'term_id',
                                                                        'terms' => $kbe_term_id
                                                                )
                                                        )
                                                );
                            $kbe_tax_post_qry = new WP_Query($kbe_tax_post_args);
                            if($kbe_tax_post_qry->have_posts()) :
                                while($kbe_tax_post_qry->have_posts()) :
                                    $kbe_tax_post_qry->the_post();
                        ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                        <?php pace_kb_is_plus(); ?>
                                    </li>
                        <?php
                                endwhile;
                            else :
                                echo "No posts";
                            endif;
                        ?>
                        </ul>
                    </div>
            <?php
                }
             ?>
            </div>
        </div>
        <!--/leftcol-->

    </div>
    <!--content-->
    
    <!--aside-->
    <div class="kbe_aside <?php echo $kbe_sidebar_class; ?>">
    <?php
        if((KBE_SIDEBAR_HOME == 2) || (KBE_SIDEBAR_HOME == 1)){
            dynamic_sidebar('kbe_cat_widget');
        }
    ?>
    </div>
    <!--/aside-->
    
</div>
</div>
</div>
<?php get_footer(); ?>