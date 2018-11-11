jQuery(document).ready(function($) {
	function start_selects(){
		$('.sm-taxonomy-ajax').each(function(){
			var $this = $(this);
			if( $this.prev().hasClass('select2-container') ){
				$this.select2("destroy");
			}
			$this.select2({
				//allowClear: true, 
				//autofocusInputOnOpen: false,
				ajax: {
					url: ajaxurl,
					dataType: 'json',
					delay: 250,
					data: function (term, page) {
					  	return {
						    q: term,
					    	action: 'sm_taxonomy_ajax_ac',
					    	taxonomy: $this.data('taxonomy')
					  	};
					},
					results: function (data, params) {
					  	return { results: data };
					},
					cache: true
				},
				initSelection: function(element, callback) {
					var $element = $(element);
					var selected = $element.data('selected');
					if( selected.length > 0 ){
						if( $element.data('multiple') == true ){
					    	callback( selected );
					    }
					    else{
					    	callback( selected[0] );
					    }
					}
				},
				multiple: $this.data('multiple'),
				minimumInputLength: 3,
			});

			if( $this.data('sortable') == true ){
				$this.select2("container").find("ul.select2-choices").sortable({
				    containment: 'parent',
				    start: function() { $this.select2("onSortStart"); },
				    update: function() { $this.select2("onSortEnd"); }
				});
			}
		});
	}
	start_selects();

	$(document).on( 'click', '.button.repeat-field', function(){
		setTimeout(function(){start_selects();}, 200);
	});
});
