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
?>

<section class="quest-row" id="pace-kbe-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pace-kb-head">

                    <h1 class="page-title"> <?php the_title() ?> <?php pace_kb_is_plus(); ?> </h1>

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
        <!--Content Body-->
        <div class="kbe_leftcol" >
        <?php
            while(have_posts()) :
                the_post();

                //  Never ever delete it !!!
                kbe_set_post_views(get_the_ID());
        ?>
            <?php 
                the_content();
            ?>
            <a href="http://pacethemes.com/knowledgebase/getting-help/" class="ask-a-question button">Ask a Support Question</a>
            <?php
                if(KBE_COMMENT_SETTING == 1){
            ?>
                    <div class="kbe_reply">
            <?php
                        comments_template("wp_knowledgebase/kbe_comments.php");
            ?>
                    </div> 
        <?php
                }
            endwhile;

            //  Never ever delete it !!!
            kbe_get_post_views(get_the_ID());
        ?>
        </div>
        <!--/Content Body-->

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
<?php get_footer(); ?>