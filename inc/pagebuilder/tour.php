<div class='intro-tour-overlay'></div>

<div id="tour-pb-not-empty" style="display:none">
	<p>
		<?php _e( 'Looks like this Page is not empty and it has some existing Page Builder sections. The tour only works on a blank Page Builder page. Please go to Pages > Add New and then start the tour', 'quest' ) ?>
	</p>
</div>

<ol class='tourbus-legs' id='pt-pb-tour' style="display:none">

	<li data-scroll-to='0' data-highlight='true' data-width='500' data-orientation='centered' data-top='150'>
		<div class='content'>
			<h3><?php _e( 'Welcome to the Page Builder Tour', 'quest' ) ?></h3>

			<p>
				<?php _e( 'We will take you through the important aspects of the Page Builder. Once you complete this tour you will have a good understanding of the Page Builder terms and usage.', 'quest' ) ?>
			</p>

			<p><?php _e( 'Let\'s get started', 'quest' ) ?></p>
		</div>

		<div class='buttons'>
			<a href='javascript:void(0);'
			   class='button remove-bottom tourbus-stop'><span>&times;</span> <?php _e( 'Not interested...', 'quest' ) ?>
			</a>
			<a href='http://pacethemes.com/knowledgebase/' class='button remove-bottom'
			   target='_blank'><?php _e( 'Got any docs?', 'quest' ) ?></a>
			<a href='javascript:void(0);' style='float: right;'
			   class='button button-primary remove-bottom tourbus-next'><?php _e( 'Continue', 'quest' ) ?>
				<span>&raquo;</span></a>
			<a href='javascript:void(0);'
			   class='button remove-bottom tourbus-stop endtour'
			   style='display:none'><?php _e( 'End Tour', 'quest' ) ?></a>
		</div>
	</li>

	<li id='pt-pb-tour-page-template' data-el='#page_template' data-highlight='true' data-width='220'
	    data-orientation='bottom' data-align='center'>

		<p>
			<?php _e( 'Change the Template to Page Builder to start using the Page Builder. Change it now to continue', 'quest' ) ?>
		</p>

		<?php
		pt_pb_tour_end();
		?>
	</li>


	<li data-el='#pt-pb-layout' data-highlight='true' data-width='600' data-orientation='top'
	    data-align='center'>
		<p>
			<?php _e( 'This is the Page Builder "Stage" area where all the content is built, you can see all items you are building. The preview here doesn\'t mirror 100% of the frontend due to space issues, it is recommended that you save the page and view the front end anytime you want to preview the page you are building', 'quest' ) ?>
		</p>
		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>
	</li>

	<li data-scroll-to='0' data-highlight='true' data-width='1000' data-orientation='centered' data-top='100'>

		<h2><?php _e( 'Page Builder Overview', 'quest' ) ?></h2>

		<p><?php _e( 'There are few Page Builder Concepts you need to understand to use the Page Builder effectively', 'quest' ) ?></p>

		<h3><?php _e( 'Section', 'quest' ) ?></h3>

		<p><?php _e( 'A section is the base building block, think of a section like a group of elements in a page. A section will have 1 or more rows.', 'quest' ) ?></p>

		<h3><?php _e( 'Row', 'quest' ) ?></h3>

		<p><?php _e( 'As the name suggests a row will hold exactly one row of elements, a row can contain columns, gallery or an image slider', 'quest' ) ?></p>

		<h3><?php _e( 'Columns', 'quest' ) ?></h3>

		<p><?php _e( 'A column always contains a module, the column width depends on the column layout selected', 'quest' ) ?></p>

		<h3><?php _e( 'Module', 'quest' ) ?></h3>

		<p><?php _e( 'A module is what represents your content. A Text Module will let you insert Text, while an image module lets you insert an image and so on', 'quest' ) ?></p>

		<p>
			<?php _e( 'Below is an overview of the different elements of the Page Builder, we will be going through each of these elements individually in this tour', 'quest' ) ?>
		</p>

		<div>
			<img style='max-width:100%;width:100%;'
			     src="<?php echo self::$PT_PB_URI ?>/assets/img/overview.jpg"/>
		</div>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-insert-section' data-highlight='true' data-width='400' data-orientation='top'
	    data-align='center'>

		<p><?php _e( 'Let\'s create a section now by clicking the "Add New Section" button', 'quest' ) ?></p>

		<p><?php _e( 'Click the "Add New Section" button to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>


	</li>

	<li data-el='.pt-pb-section:first-child' data-highlight='true' data-width='800' data-orientation='top'
	    data-align='center'>

		<p> <?php _e( 'This is the section you just created, it is an empty section and we have to start adding content to it', 'quest' ) ?> </p>

		<p> <?php _e( 'A Section can hold one or more rows, while a row can only hold Columns, Image Slider or Gallery', 'quest' ) ?> </p>

		<p><?php _e( 'We add Rows to this section by clicking on one of the below three buttons "Columns", "Image Slider" or "Gallery".', 'quest' ) ?></p>

		<p><?php _e( 'Columns - Add a column layout row to the section, Quest has 4 default column layouts, Quest Plus provides an additional 14 column layouts.', 'quest' ) ?></p>

		<p><?php _e( 'Image Slider - Add an Image Slider row to the section. Create slides with heading and text to attract users', 'quest' ) ?></p>

		<p><?php _e( 'Gallery - Add a Gallery Row to the Section, choose between 3 to 6 columns, spacing and rounded or square thumbnails for the gallery.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-settings-section' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the section settings icon, clicking on this icon will open the section settings modal box', 'quest' ) ?></p>

		<p><?php _e( 'Click the Settings Icon to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>


	<li data-el='.reveal-modal' data-highlight='true' data-width='600' data-orientation='left'
	    data-align='center'>

		<p><?php _e( 'This is the section settings modal box, here you can change different settings of a section like Background Color/Image, Padding, Border etc. Take a look at all the options available, Quest Plus provides more Section Options like Backgorund Videos, Section Seperators etc.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-close-reveal' );
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-clone-section' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'Clicking this clone icon will clone this section with all the Rows and Modules inside this Section.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-remove' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'Clicking this delete icon will remove the Section, Do not click the icon now, we need this section to continue the tour.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-insert-column' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'Let\'s create a Columns row, click the "Columns" button.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>


	<li data-el='.reveal-modal' data-highlight='true' data-width='600' data-orientation='left'
	    data-align='center'>

		<p><?php _e( 'This is the column layouts modal box, here you can select the column layout you want to insert into the row.', 'quest' ) ?></p>

		<p><?php _e( '	Click Next and we will auto select the column layout', 'quest' ) ?></p>


		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-select-layout', false );
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child' data-highlight='true' data-width='600'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Columns Row we just created, you can see the 3 column layout we selected, each of these columns will hold a Module.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-close-reveal' );
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-settings-columns'
	    data-highlight='true' data-width='600' data-orientation='top' data-align='center'>

		<p><?php _e( 'The Column Layouts Icon let\'s you change the column layout for this row, once you click this icon it re-opens the Column Layout modal box and you can select a different layout. If you select a layout which has less columns the extra columns (Along with the modules inside these columns) will be deleted.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-close-reveal' );
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-settings-row' data-highlight='true'
	    data-width='600' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Row settings icon, clicking on this icon will open the row settings modal box. You can set the Row padding and Vertical Alignment options', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>


		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-close-reveal' );
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-clone-row' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'Clicking this clone icon will clone this row with all the Content/Columns and Modules inside this Row.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-remove-row' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'Clicking this delete icon will remove the Row, Do not click the icon now, we need this row to continue the tour.', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is a Column, we can insert a Module into this Column. Click the "Insert Module" link to continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>

	<li data-el='.reveal-modal' data-highlight='true' data-width='600' data-orientation='left'
	    data-align='center'>

		<p><?php _e( 'This is the Insert Module modal box, here you can select the module you want to insert into the column. Quest Plus provides 18 additional modules', 'quest' ) ?></p>

		<p><?php _e( 'Click Next and we will auto select the Image Module', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-select-module', false );
		?>

	</li>

	<li data-el='.pt-pb-image-edit' data-highlight='true' data-width='600' data-orientation='left'
	    data-align='center'>

		<p><?php _e( 'After you select a module, the Module Settings Modal box will open and you can edit/update the settings as per your needs', 'quest' ) ?></p>

		<p><?php _e( 'Click Next to Continue', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next( 'tour-close-module', false );
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Image Module we just inserted', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child .admin-label'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Module Admin label, it helps you name and manage your modules better, this name can be changed from Module Settings/Options', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child .edit'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Module Settings Icon, click this to open the Module Settings Modal box. Module Settings vary based on the module type', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child .remove'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Remove Module Icon, Click this to remove the module, once the module is removed you can insert a different module into this column', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:first-child .pt-pb-column:first-child .content-preview'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Module Content, this does not reflect 100% of the actual frontend preview, this only points the important settings/items for this module', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-el='.pt-pb-insert-slider' data-highlight='true' data-width='400' data-orientation='top'
	    data-align='center'>

		<p><?php _e( 'Now let\'s create an Image Slider Row, click the "Image Slider" button to create an Image Slider Row and continue the Tour', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2)' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Image Slider Row we just added', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-settings-slider'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Image Slider Settings Icon, click this to Open the Image Slider Settings Modal Box to change the slider settings like autoplay, transition, height etc.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-insert-slide' data-highlight='true' data-width='400' data-orientation='top'
	    data-align='center'>

		<p><?php _e( 'Now let\'s add a new slide to the Image Slider by clicking the "New Slide" button.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-column' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Slide we just added', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-column .admin-label'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Slide Title, you can change this from Slide Settings.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-column .edit' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is Slide Settings Icon, click this to edit the Slide Settings like Image, color, Title etc.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-column .remove' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is Slide Delete Icon, click this to Delete the Slide.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(2) .pt-pb-column .slide-content-preview'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Slide Preview, You can see the Slide Image and Text here', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-insert-gallery' data-highlight='true' data-width='400' data-orientation='top'
	    data-align='center'>

		<p><?php _e( 'Now let\'s create a Gallery Row, click the "Gallery" button to create a Gallery Row', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>


	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3)' data-highlight='true' data-width='400'
	    data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Gallery Row we just added, by default four blank images are added to a new gallery, you can edit or delete these images', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-settings-gallery'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Gallery Settings Icon, click this to Open the Gallery Settings Modal Box to change the Gallery settings like columns, thumbnails etc.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-column:first-child'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is a Gallery Image', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-column:first-child .edit'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is Gallery Image Settings Icon, click this to edit the Slide Settings like Image, link, Title etc.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-column:first-child .remove'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is Gallery Image Delete Icon, click this to Delete the Image.', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-column:first-child .gimage-content-preview'
	    data-highlight='true' data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'This is the Image Preview, You can see the Gallery Image here', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>

	<li data-el='.pt-pb-section:first-child .pt-pb-row:nth-child(3) .pt-pb-insert-gimage' data-highlight='true'
	    data-width='400' data-orientation='top' data-align='center'>

		<p><?php _e( 'To add a New Image to the Gallery, click the "New Image" button', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		pt_pb_tour_next();
		?>

	</li>


	<li data-scroll-to='0' data-highlight='true' data-width='1000' data-orientation='centered' data-top='100'>

		<h2><?php _e( 'End of Tour', 'quest' ) ?></h2>

		<p><?php _e( 'You have reached the end of the Page Builder Tour', 'quest' ) ?></p>

		<p><?php _e( 'The Page Builder offers great control on your page layouts, let your creative juices flow and start building awesome layouts with the Page Builder', 'quest' ) ?></p>

		<p><?php _e( 'Quest Plus provides more Column Layouts, Modules, Section Options and more, do checkout Quest Plus', 'quest' ) ?></p>

		<p><?php _e( 'If you are seeing issues with the Page Builder or need any other help, create a new topic on the support forum', 'quest' ) ?></p>

		<?php
		pt_pb_tour_end();
		?>

	</li>

</ol>

<?php

function pt_pb_tour_end( $cls = '' ) {
	echo sprintf( "<a class='button remove-bottom tourbus-end $cls' style='margin-top: 2px;' href='javascript:void(0);'> %s </a>", __( 'End Tour', 'quest' ) );
}

function pt_pb_tour_next( $cls = '', $defaultCls = true ) {
	$cls .= $defaultCls ? ' tourbus-next' : '';
	echo sprintf( "<a class='button button-primary remove-bottom $cls' style='margin-top: 2px;' href='javascript:void(0);'> %s <span>&raquo;</span></a>", __( 'Next', 'quest' ) );
}