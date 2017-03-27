var bawmrpFindPosts;
(function($){
	bawmrpFindPosts = {
		open: function( af_name, af_val ) {
			var overlay = $( '.ui-find-overlay' );

			if ( overlay.length === 0 ) {
				$( 'body' ).append( '<div class="ui-find-overlay"></div>' );
				bawmrpFindPosts.overlay();
			}

			overlay.show();

			if ( af_name && af_val ) {
				$( '#affected' ).attr( 'name', af_name ).val( af_val );
			}

			$( '#find-posts' ).show();

			$('#find-posts-input').focus().keyup( function( event ){
				if ( event.which == 27 ) {
					bawmrpFindPosts.close();
				} // close on Escape
			});

			// Pull some results up by default
			bawmrpFindPosts.send();

			return false;
		},

		close : function() {
			$('#find-posts-response').html('');
			$('#find-posts').hide();
			$('.ui-find-overlay').hide();
			// $('#find-posts').draggable('destroy').hide();
		},

		overlay: function() {
			$( '.ui-find-overlay' ).on( 'click', function () {
				bawmrpFindPosts.close();
			});
		},

		send: function() {
			var $pt = '';
			$('input[name="find-posts-what[]"]:checked').each(function(){
				$pt += $( this ).val() + ',';
			});
			var post = {
					ps: $( '#find-posts-input' ).val(),
					action: 'bawmrp_ajax_find_posts',
					_ajax_nonce: $('#_ajax_nonce').val(),
					post_type: $pt
				},
				spinner = $( '.find-box-search .spinner' );
			spinner.show();
			$.ajax( ajaxurl, {
				type: 'POST',
				data: post,
				dataType: 'json'
			}).always( function() {
				spinner.hide();
			}).done( function( x ) {
				if ( ! x ) {
					$( '#find-posts-response' ).text( x.responseText );
				}
				$( '#find-posts-response' ).html( x.data );
			}).fail( function( x ) {
				$( '#find-posts-response' ).text( x.responseText );
			});
		}
	};

	$(document).ready(function() {
		
	});
})(jQuery);  

function bawmrp_open_find_posts_dialog( event )
{
	event.preventDefault();
	bawmrpFindPosts.open( 'from_post', bawmrp_js.ID ); 
}
			
jQuery( document ).ready( function() {

	jQuery('#find-posts-submit').click(function(e) {
		if ( '' == jQuery('#find-posts-response').html() )
			e.preventDefault();
	});
	jQuery( '#find-posts .find-box-search :input' ).keypress( function( event ) {
		if ( 13 == event.which ) {
			bawmrpFindPosts.send();
			return false;
		}
	} );
	jQuery( '#find-posts-search' ).click( bawmrpFindPosts.send );
	jQuery( '#find-posts-close' ).click( bawmrpFindPosts.close );
		
	jQuery( '#bawmrp_open_find_posts_button' ).on( 'click', bawmrp_open_find_posts_dialog );
	
	jQuery( '#bawmrp_delete_related_posts' ).click( function(){
		jQuery( '#ul_yyarpp' ).animate( {opacity: 0 }, 500, function() { 
																jQuery( this ).html( '' ) ;
																jQuery( '#bawmrp_post_ids' ) .val( '' );
																jQuery( this ).css( 'opacity', '1' ) ;
															}
										);
	} );
			
	jQuery( 'body:first' ).prepend( jQuery( '.find-box-search input#_ajax_nonce' ) );
	
	jQuery( "#ul_yyarpp" ).sortable({
		'update' : function(event, ui) {
			var ids = [];
			jQuery('#ul_yyarpp li').each(function(i, item){
				ids.push(jQuery(item).attr('data-id'));
			});
			jQuery('#bawmrp_post_ids').val(ids.join(','));
		},
		'revert': true,
		'placeholder': 'sortable-placeholder',
		'tolerance': 'pointer',
		'axis': 'y',
		'containment': 'parent',
		'cursor': 'move',
		'forcePlaceholderSize': true,
		'dropOnEmpty': false,
	});
	
	jQuery( '#find-posts-submit' ).click( function(e) {
		e.preventDefault();
		if( jQuery( 'input[name="found_post_id[]"]:checked' ).length == 0)
			return false;
		jQuery( 'input[name="found_post_id[]"]:checked' ).each( function(id){
			var selectedID = jQuery(this).val();
			var posts_ids = new Array();
			posts_ids = jQuery( '#bawmrp_post_ids' ).val()!='' ? jQuery( '#bawmrp_post_ids' ).val().split( ',' ) : [];
			if( jQuery.inArray( selectedID, posts_ids )=="-1" && selectedID!=bawmrp_js.ID){
				posts_ids.push( selectedID );
				jQuery( '#bawmrp_post_ids' ).val( posts_ids );
				jQuery( this ).parent().parent().css( 'background', '#FF0000' ).fadeOut( 500, function(){ jQuery( this ).remove() } );
				var label = jQuery( this ).parent().next().text();
				label = label.replace(/</g, "&lt;");
				label = label.replace(/>/g, "&gt;");
				var elem_li = '<li data-id="' + selectedID + '"><span style="float:none;"><a class="erase_yyarpp">X</a>&nbsp;&nbsp;' + label + '</span></li>';
				jQuery( '#ul_yyarpp' ).append( elem_li );
			}
		});
		return false;			
	});

	setInterval( function()
				{
					if( jQuery( '#find-posts-response input:checkbox' ).length>0 ){
						var $forbidden_ids = jQuery( '#bawmrp_post_ids' ).val().split( ',' );
						jQuery( '#find-posts-response input[value="'+bawmrp_js.ID+'"]' )
							.attr('disabled', 'disabled');
						jQuery( '#find-posts-response input' ).filter( function(i)
							{ 
								return jQuery.inArray(jQuery(this).val(),$forbidden_ids)>-1;
							} )
							.attr('disabled', 'disabled').attr('checked', 'checked');
					}
				}, 100 
	);
	
	jQuery( '.erase_yyarpp' ).live( 'click', function() {
		var id = jQuery( this ).parent().parent().attr( 'data-id' );
		jQuery( this ).parent().parent().fadeOut( 500, function(){ jQuery( this ).remove() } );
		var posts_ids = ',' + jQuery( '#bawmrp_post_ids' ).val() + ',';
		posts_ids = posts_ids.replace( ','+id+',', ',' );
		jQuery( '#bawmrp_post_ids' ).val( posts_ids.length>1 ? posts_ids.substring( 1, posts_ids.length-1 ) : '' );
	});
	
});