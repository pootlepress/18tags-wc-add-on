/**
 * Public end styling
 * @author shramee <shramee.srivastav@gmail.com>
 * @package eighteen-tags pro
 */
jQuery( document ).ready( function ( $ ) {
	var $window = $( window ),
		windowWidth = $window.width(),
		$body = $( 'body' ),
		$layoutButts = $( '.layout-buttons' ),
		$products = $('.post-type-archive-product .products' ),
		gutter = parseInt( $products.children( '.product:first' ).css( 'margin-right' ) );

//Shop/Mobile-store masonry
	if ( 'masonry' == sfpSettings.shopLayout && $products.length ) {
		$products.children( '.product' ).css( 'margin-right', '0' );
		$products.masonry( {
			itemSelector : '.product',
			gutter : gutter
		} );

		$products.imagesLoaded( function () {
			$products.masonry();
		} );
		$window.resize( function () {
			$products.masonry();
		} );
	};

//Shop/Mobile-store masonry
	if ( sfpSettings.mobStore && windowWidth < 768 ) {
		$products.children( '.product' ).css( 'margin-right', '0' );
		if ( $products.length ) {
			$products.masonry( {
				itemSelector : '.product',
				gutter : gutter
			} );

			$products.imagesLoaded( function () {
				$products.masonry( {
					itemSelector : '.product',
					gutter : gutter
				} );
			} );
			$window.resize( function () {
				gutter = parseInt( $products.width() / 100 );
				$products.masonry( {
				itemSelector : '.product',
				gutter : gutter
			} );
			} );
		}
	}

//Infinite scroll
	if ( sfpSettings.infiniteScroll && windowWidth > 767 ) {
		$( 'div[class^="columns"] + .eighteen-tags-sorting' ).hide();

		$( '.site-main' ).jscroll({
			loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
			nextSelector: 'a.next',
			contentSelector: '.scroll-wrap',
			callback: function() {
				window.sfproProductImageFlip( $( '.jscroll-added' ).last() );
			}
		});
	}

//Mobile store
	$layoutButts.find('.layout-list' ).click( function () {
		$body.addClass( 'layout-list' );
		$window.resize();
	} );
	$layoutButts.find('.layout-masonry' ).click( function () {
		$body.removeClass( 'layout-list' );
		$window.resize();
	} );

} );