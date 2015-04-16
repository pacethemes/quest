<?php

if ( !function_exists( 'quest_get_all_fonts' ) ):
	/**
	 * Returns an Array of all the Available Font Options
	 *
	 */
	function quest_get_all_fonts( $show_header = true ) {

		if ( $show_header ) {
			return array_merge(
				array( '-------Standard Fonts-------' => array ( 'disabled' => true, 'variants' => array() ) ),
				quest_get_standard_fonts(),
				array( '-------Google Fonts-------' => array ( 'disabled' => true, 'variants' => array() ) ),
				quest_get_google_fonts()
			);
		}

		return array_merge(
			quest_get_standard_fonts() ,
			quest_get_google_fonts()
		) ;

	}
endif;

if ( !function_exists( 'quest_get_standard_fonts' ) ):
	/**
	 * Returns an Array of al the Available Standard Fonts
	 *
	 */
	function quest_get_standard_fonts() {
		return array(
			'Serif' => array ( 'variants' => array( 'regular' ) ),
			'Sans Serif' => array ( 'variants' => array( 'regular' ) ),
			'Monospaced' => array ( 'variants' => array( 'regular' ) ),
		);
	}
endif;

if ( !function_exists( 'quest_get_google_fonts' ) ):
	/**
	 * Returns an Array of al the Available Google Fonts
	 *
	 */
	function quest_get_google_fonts() {

		return array(
			'ABeeZee' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Abel' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Abril Fatface' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Aclonica' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Acme' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Actor' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Adamina' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Advent Pro' => array(
				'variants' => array(
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'greek'
				)

			),

			'Aguafina Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Akronim' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Aladin' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Aldrich' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Alef' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Alegreya' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Alegreya SC' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Alegreya Sans' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Alegreya Sans SC' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Alex Brush' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Alfa Slab One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Alice' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Alike' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Alike Angular' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Allan' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Allerta' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Allerta Stencil' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Allura' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Almendra' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Almendra Display' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Almendra SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Amarante' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Amaranth' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Amatic SC' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Amethysta' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Amiri' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin',
					'arabic'
				)

			),

			'Anaheim' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Andada' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Andika' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Angkor' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Annie Use Your Telescope' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Anonymous Pro' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'monospace',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek'
				)

			),

			'Antic' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Antic Didone' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Antic Slab' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Anton' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Arapey' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Arbutus' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Arbutus Slab' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Architects Daughter' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Archivo Black' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Archivo Narrow' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Arimo' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Arizonia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Armata' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Artifika' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Arvo' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Asap' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Asset' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Astloch' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Asul' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Atomic Age' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Aubrey' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Audiowide' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Autour One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Average' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Average Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Averia Gruesa Libre' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Averia Libre' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Averia Sans Libre' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Averia Serif Libre' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bad Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'cyrillic',
					'latin'
				)

			),

			'Balthazar' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Bangers' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Basic' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Battambang' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Baumans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bayon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Belgrano' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Belleza' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'BenchNine' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bentham' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Berkshire Swash' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bevan' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bigelow Rules' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bigshot One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bilbo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bilbo Swash Caps' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bitter' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Black Ops One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bokor' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Bonbon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Boogaloo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bowlby One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Bowlby One SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Brawler' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Bree Serif' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bubblegum Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Bubbler One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Buda' => array(
				'variants' => array(
					'300'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Buenard' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Butcherman' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Butterfly Kids' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Cabin' => array(
				'variants' => array(
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cabin Condensed' => array(
				'variants' => array(
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cabin Sketch' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Caesar Dressing' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Cagliostro' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Calligraffitti' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Cambay' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Cambo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Candal' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cantarell' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cantata One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Cantora One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Capriola' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Cardo' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'greek-ext',
					'latin-ext',
					'latin',
					'greek'
				)

			),

			'Carme' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Carrois Gothic' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Carrois Gothic SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Carter One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Caudex' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'greek-ext',
					'latin-ext',
					'latin',
					'greek'
				)

			),

			'Cedarville Cursive' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Ceviche One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Changa One' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Chango' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chau Philomene One' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chela One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chelsea Market' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chenla' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Cherry Cream Soda' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Cherry Swash' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chewy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Chicle' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Chivo' => array(
				'variants' => array(
					'regular',
					'italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cinzel' => array(
				'variants' => array(
					'regular',
					'700',
					'900'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cinzel Decorative' => array(
				'variants' => array(
					'regular',
					'700',
					'900'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Clicker Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Coda' => array(
				'variants' => array(
					'regular',
					'800'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Coda Caption' => array(
				'variants' => array(
					'800'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Codystar' => array(
				'variants' => array(
					'300',
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Combo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Comfortaa' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Coming Soon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Concert One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Condiment' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Content' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Contrail One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Convergence' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Cookie' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Copse' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Corben' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Courgette' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Cousine' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'monospace',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Coustard' => array(
				'variants' => array(
					'regular',
					'900'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Covered By Your Grace' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Crafty Girls' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Creepster' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Crete Round' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Crimson Text' => array(
				'variants' => array(
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Croissant One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Crushed' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Cuprum' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Cutive' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Cutive Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Damion' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Dancing Script' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Dangrek' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Dawning of a New Day' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Days One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Dekko' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Delius' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Delius Swash Caps' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Delius Unicase' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Della Respira' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Denk One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Devonshire' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Dhurjati' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Didact Gothic' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Diplomata' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Diplomata SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Domine' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Donegal One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Doppio One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Dorsa' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Dosis' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Dr Sugiyama' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Droid Sans' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Droid Sans Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin'
				)

			),

			'Droid Serif' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Duru Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Dynalight' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'EB Garamond' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Eagle Lake' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Eater' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Economica' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ek Mukta' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Electrolize' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Elsie' => array(
				'variants' => array(
					'regular',
					'900'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Elsie Swash Caps' => array(
				'variants' => array(
					'regular',
					'900'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Emblema One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Emilys Candy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Engagement' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Englebert' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Enriqueta' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Erica One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Esteban' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Euphoria Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ewert' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Exo' => array(
				'variants' => array(
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Exo 2' => array(
				'variants' => array(
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Expletus Sans' => array(
				'variants' => array(
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fanwood Text' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Fascinate' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fascinate Inline' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Faster One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fasthand' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'khmer'
				)

			),

			'Fauna One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Federant' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Federo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Felipa' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Fenix' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Finger Paint' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fira Mono' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'monospace',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Fira Sans' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Fjalla One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Fjord One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Flamenco' => array(
				'variants' => array(
					'300',
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Flavors' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fondamento' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Fontdiner Swanky' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Forum' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Francois One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Freckle Face' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Fredericka the Great' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fredoka One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Freehand' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Fresca' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Frijole' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Fruktur' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Fugaz One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'GFS Didot' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'greek'
				)

			),

			'GFS Neohellenic' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'greek'
				)

			),

			'Gabriela' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gafata' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Galdeano' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Galindo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gentium Basic' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gentium Book Basic' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Geo' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Geostar' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Geostar Fill' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Germania One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Gidugu' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Gilda Display' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Give You Glory' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Glass Antiqua' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Glegoo' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Gloria Hallelujah' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Goblin One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Gochi Hand' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Gorditas' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Goudy Bookletter 1911' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Graduate' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Grand Hotel' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gravitas One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Great Vibes' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Griffy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gruppo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gudea' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Gurajada' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Habibi' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Halant' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Hammersmith One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Hanalei' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Hanalei Fill' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Handlee' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Hanuman' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'khmer'
				)

			),

			'Happy Monkey' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Headland One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Henny Penny' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Herr Von Muellerhoff' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Hind' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Holtwood One SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Homemade Apple' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Homenaje' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'IM Fell DW Pica' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell DW Pica SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell Double Pica' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell Double Pica SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell English' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell English SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell French Canon' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell French Canon SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell Great Primer' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'IM Fell Great Primer SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Iceberg' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Iceland' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Imprima' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Inconsolata' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Inder' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Indie Flower' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Inika' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Irish Grover' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Istok Web' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Italiana' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Italianno' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Jacques Francois' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Jacques Francois Shadow' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Jim Nightshade' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Jockey One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Jolly Lodger' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Josefin Sans' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Josefin Slab' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Joti One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Judson' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Julee' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Julius Sans One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Junge' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Jura' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Just Another Hand' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Just Me Again Down Here' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Kalam' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Kameron' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Kantumruy' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'khmer'
				)

			),

			'Karla' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Karma' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Kaushan Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Kavoon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Kdam Thmor' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Keania One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Kelly Slab' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Kenia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Khand' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Khmer' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Khula' => array(
				'variants' => array(
					'300',
					'regular',
					'600',
					'700',
					'800'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Kite One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Knewave' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Kotta One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Koulen' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Kranky' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Kreon' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Kristi' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Krona One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'La Belle Aurore' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Laila' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Lakki Reddy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Lancelot' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Lateef' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin',
					'arabic'
				)

			),

			'Lato' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'League Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Leckerli One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Ledger' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Lekton' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Lemon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Libre Baskerville' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Life Savers' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Lilita One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Lily Script One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Limelight' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Linden Hill' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Lobster' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Lobster Two' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Londrina Outline' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Londrina Shadow' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Londrina Sketch' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Londrina Solid' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Lora' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Love Ya Like A Sister' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Loved by the King' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Lovers Quarrel' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Luckiest Guy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Lusitana' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Lustria' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Macondo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Macondo Swash Caps' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Magra' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Maiden Orange' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Mako' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Mallanna' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Mandali' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Marcellus' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Marcellus SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Marck Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Margarine' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Marko One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Marmelad' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Martel Sans' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'600',
					'700',
					'800',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Marvel' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Mate' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Mate SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Maven Pro' => array(
				'variants' => array(
					'regular',
					'500',
					'700',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'McLaren' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Meddon' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'MedievalSharp' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Medula One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Megrim' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Meie Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Merienda' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Merienda One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Merriweather' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Merriweather Sans' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'800',
					'800italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Metal' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Metal Mania' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Metamorphous' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Metrophobic' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Michroma' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Milonga' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Miltonian' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Miltonian Tattoo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Miniver' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Miss Fajardose' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Modak' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Modern Antiqua' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Molengo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Molle' => array(
				'variants' => array(
					'italic'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Monda' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Monofett' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Monoton' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Monsieur La Doulaise' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Montaga' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Montez' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Montserrat' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Montserrat Alternates' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Montserrat Subrayada' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Moul' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Moulpali' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Mountains of Christmas' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Mouse Memoirs' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Mr Bedfort' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Mr Dafoe' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Mr De Haviland' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Mrs Saint Delafield' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Mrs Sheppards' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Muli' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Mystery Quest' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'NTR' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Neucha' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'cyrillic',
					'latin'
				)

			),

			'Neuton' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'italic',
					'700',
					'800'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'New Rocker' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'News Cycle' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Niconne' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Nixie One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nobile' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Nokora' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'khmer'
				)

			),

			'Norican' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Nosifer' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Nothing You Could Do' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Noticia Text' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Noto Sans' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext',
					'devanagari'
				)

			),

			'Noto Serif' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Nova Cut' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Flat' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin',
					'greek'
				)

			),

			'Nova Oval' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Round' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Slim' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Nova Square' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Numans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Nunito' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Odor Mean Chey' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Offside' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Old Standard TT' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Oldenburg' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Oleo Script' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Oleo Script Swash Caps' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Open Sans' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext',
					'devanagari'
				)

			),

			'Open Sans Condensed' => array(
				'variants' => array(
					'300',
					'300italic',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Oranienbaum' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Orbitron' => array(
				'variants' => array(
					'regular',
					'500',
					'700',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Oregano' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Orienta' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Original Surfer' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Oswald' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Over the Rainbow' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Overlock' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Overlock SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ovo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Oxygen' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Oxygen Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'PT Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'PT Sans' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'PT Sans Caption' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'PT Sans Narrow' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'PT Serif' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'PT Serif Caption' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'cyrillic-ext'
				)

			),

			'Pacifico' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Paprika' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Parisienne' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Passero One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Passion One' => array(
				'variants' => array(
					'regular',
					'700',
					'900'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Pathway Gothic One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Patrick Hand' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Patrick Hand SC' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Patua One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Paytone One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Peddana' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Peralta' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Permanent Marker' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Petit Formal Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Petrona' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Philosopher' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin'
				)

			),

			'Piedra' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Pinyon Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Pirata One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Plaster' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Play' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Playball' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Playfair Display' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Playfair Display SC' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Podkova' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Poiret One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Poller One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Poly' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Pompiere' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Pontano Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Port Lligat Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Port Lligat Slab' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Prata' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Preahvihear' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Press Start 2P' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin',
					'greek'
				)

			),

			'Princess Sofia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Prociono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Prosto One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Puritan' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Purple Purse' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Quando' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Quantico' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Quattrocento' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Quattrocento Sans' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Questrial' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Quicksand' => array(
				'variants' => array(
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Quintessential' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Qwigley' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Racing Sans One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Radley' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rajdhani' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Raleway' => array(
				'variants' => array(
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Raleway Dots' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ramabhadra' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Ramaraja' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Rambla' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rammetto One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ranchers' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rancho' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Ranga' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Rationale' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Ravi Prakash' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Redressed' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Reenie Beanie' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Revalia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ribeye' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ribeye Marrow' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Righteous' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Risque' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Roboto' => array(
				'variants' => array(
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Roboto Condensed' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Roboto Slab' => array(
				'variants' => array(
					'100',
					'300',
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Rochester' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Rock Salt' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Rokkitt' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Romanesco' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ropa Sans' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rosario' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Rosarivo' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rouge Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Rozha One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Rubik Mono One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rubik One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ruda' => array(
				'variants' => array(
					'regular',
					'700',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rufina' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ruge Boogie' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ruluko' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rum Raisin' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Ruslan Display' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Russo One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Ruthie' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Rye' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sacramento' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sail' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Salsa' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Sanchez' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sancreek' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sansita One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Sarina' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sarpanch' => array(
				'variants' => array(
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Satisfy' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Scada' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Scheherazade' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin',
					'arabic'
				)

			),

			'Schoolbell' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Seaweed Script' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sevillana' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Seymour One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Shadows Into Light' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Shadows Into Light Two' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Shanti' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Share' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Share Tech' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Share Tech Mono' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin'
				)

			),

			'Shojumaru' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Short Stack' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Siemreap' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Sigmar One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Signika' => array(
				'variants' => array(
					'300',
					'regular',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Signika Negative' => array(
				'variants' => array(
					'300',
					'regular',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Simonetta' => array(
				'variants' => array(
					'regular',
					'italic',
					'900',
					'900italic'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sintony' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sirin Stencil' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Six Caps' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Skranji' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Slabo 13px' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Slabo 27px' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Slackey' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Smokum' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Smythe' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Sniglet' => array(
				'variants' => array(
					'regular',
					'800'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Snippet' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Snowburst One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sofadi One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Sofia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Sonsie One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Sorts Mill Goudy' => array(
				'variants' => array(
					'regular',
					'italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Source Code Pro' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'900'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Source Sans Pro' => array(
				'variants' => array(
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'900',
					'900italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'vietnamese',
					'latin-ext',
					'latin'
				)

			),

			'Source Serif Pro' => array(
				'variants' => array(
					'regular',
					'600',
					'700'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Special Elite' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Spicy Rice' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Spinnaker' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Spirax' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Squada One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Sree Krushnadevaraya' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Stalemate' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Stalinist One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Stardos Stencil' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Stint Ultra Condensed' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Stint Ultra Expanded' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Stoke' => array(
				'variants' => array(
					'300',
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Strait' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Sue Ellen Francisco' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Sunshiney' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Supermercado One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Suranna' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Suravaram' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Suwannaphum' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Swanky and Moo Moo' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Syncopate' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Tangerine' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Taprom' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'khmer'
				)

			),

			'Tauri' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Teko' => array(
				'variants' => array(
					'300',
					'regular',
					'500',
					'600',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Telex' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Tenali Ramakrishna' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Tenor Sans' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Text Me One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'The Girl Next Door' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Tienne' => array(
				'variants' => array(
					'regular',
					'700',
					'900'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Timmana' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'telugu',
					'latin'
				)

			),

			'Tinos' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'cyrillic',
					'vietnamese',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Titan One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Titillium Web' => array(
				'variants' => array(
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'900'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Trade Winds' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Trocchi' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Trochut' => array(
				'variants' => array(
					'regular',
					'italic',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Trykker' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Tulpen One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Ubuntu' => array(
				'variants' => array(
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Ubuntu Condensed' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'cyrillic',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Ubuntu Mono' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'monospace',
				'subsets' => array(
					'cyrillic',
					'greek-ext',
					'latin-ext',
					'latin',
					'greek',
					'cyrillic-ext'
				)

			),

			'Ultra' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Uncial Antiqua' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Underdog' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Unica One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'UnifrakturCook' => array(
				'variants' => array(
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'UnifrakturMaguntia' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Unkempt' => array(
				'variants' => array(
					'regular',
					'700'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Unlock' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Unna' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'VT323' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'monospace',
				'subsets' => array(
					'latin'
				)

			),

			'Vampiro One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Varela' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Varela Round' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Vast Shadow' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Vesper Libre' => array(
				'variants' => array(
					'regular',
					'500',
					'700',
					'900'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin-ext',
					'latin',
					'devanagari'
				)

			),

			'Vibur' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Vidaloka' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Viga' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Voces' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Volkhov' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Vollkorn' => array(
				'variants' => array(
					'regular',
					'italic',
					'700',
					'700italic'
				),

				'category' => 'serif',
				'subsets' => array(
					'latin'
				)

			),

			'Voltaire' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Waiting for the Sunrise' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Wallpoet' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin'
				)

			),

			'Walter Turncoat' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Warnes' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Wellfleet' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Wendy One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Wire One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin'
				)

			),

			'Yanone Kaffeesatz' => array(
				'variants' => array(
					'200',
					'300',
					'regular',
					'700'
				),

				'category' => 'sans-serif',
				'subsets' => array(
					'latin-ext',
					'latin'
				)

			),

			'Yellowtail' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Yeseva One' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'display',
				'subsets' => array(
					'cyrillic',
					'latin-ext',
					'latin'
				)

			),

			'Yesteryear' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			),

			'Zeyada' => array(
				'variants' => array(
					'regular'
				),

				'category' => 'handwriting',
				'subsets' => array(
					'latin'
				)

			)

		);

	}
endif;
?>
