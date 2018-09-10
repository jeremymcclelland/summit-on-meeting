<?php
/*
 * Output of checkbox, select... for Live filter
 * @since 5.0
 * @author ptguy
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	die;
}

class CVP_LIVE_FILTER_OUTPUT {

	public $data_type;
	public $input_type;
	public $items;
	public $item		 = null;
	public $name;
	public $original_name;
	public $posts_count	 = 0;
	public $class;
	public $id;
	public $others;

	/**
	 *
	 * @param type $data_type
	 * @param type $input_type
	 * @param type $name
	 * @param type $items
	 * @param type $others
	 * @param type $class
	 * @param type $id
	 */
	public function __construct( $data_type, $input_type, $name, $items, $others, $class = '', $id = '' ) {
		$this->data_type	 = $data_type;
		$this->input_type	 = $input_type;
		$this->items		 = $items;
		$this->name			 = CVP_LIVE_FILTER::filter_name_prefix( $name, $this->data_type, 'add' );
		$this->original_name = $name;
		$this->class		 = 'cvp-live-filter ' . $class;
		$this->id			 = $id ? $id : '';
		$this->others		 = $others;
	}

	public function html() {
		if ( method_exists( $this, $this->input_type ) ) {
			$GLOBALS[ 'cvp_lf_html_arr' ] = array();

			$method	 = $this->input_type;
			$output	 = $this->$method();

			if ( PT_CV_Functions::get_global_variable( 'lf_reposition' ) ) {
				CVP_LIVE_FILTER::default_list( $this->name, $output );
			} else {
				return $output;
			}
		}
		return null;
	}

	function _no_label() {
		return $this->input_type === 'date_range';
	}

	function _label() {
		return $this->_no_label() ? '' : sprintf( '<label class="cvp-label">%s</label>', cvp_stripallslashes( trim( $this->others[ 'label' ] ) ) );
	}

	function _item( $key, $text ) {
		$this->item				 = new stdClass();
		$this->item->text		 = $this->_text( $key, $text );
		$this->item->selected	 = $this->_is_selected( $key );
	}

	function _text( $key, $text ) {
		return esc_html( $text ) . $this->_count( $key );
	}

	function _is_selected( $key ) {
		global $cvp_lf_params;
		if ( !$cvp_lf_params ) {
			return null;
		}

		$name = $this->original_name;
		if ( $this->data_type === CVP_LF_PREFIX_TAX ) {
			if ( isset( $cvp_lf_params[ 'tax_query' ][ $name ][ 'terms' ] ) ) {
				return in_array( $key, $cvp_lf_params[ 'tax_query' ][ $name ][ 'terms' ] ) ? $this->_checked_selected() : null;
			}
		} elseif ( $this->data_type === CVP_LF_PREFIX_CTF ) {
			if ( isset( $cvp_lf_params[ 'meta_query' ][ $name ][ 'value' ] ) ) {
				return in_array( $key, $cvp_lf_params[ 'meta_query' ][ $name ][ 'value' ] ) ? $this->_checked_selected() : null;
			}
		} elseif ( $this->data_type === CVP_LF_SORT ) {
			if ( isset( $cvp_lf_params[ CVP_LF_SORT ] ) ) {
				$selected_value = implode( CVP_LF_SEPARATOR, (array) $cvp_lf_params[ CVP_LF_SORT ] );
				return ($key === $selected_value) ? $this->_checked_selected() : null;
			}
		}
	}

	function _selected_values( &$from, &$to ) {
		global $cvp_lf_params;
		$name = $this->original_name;
		if ( isset( $cvp_lf_params[ 'meta_query' ][ $name ][ 'value' ] ) ) {
			$func	 = ($this->input_type === 'range_slider') ? 'floatval' : 'cv_esc_sql';
			$values	 = array_map( $func, $cvp_lf_params[ 'meta_query' ][ $name ][ 'value' ] );

			if ( !empty( $values[ 0 ] ) ) {
				$from = $values[ 0 ];
			}

			if ( !empty( $values[ 1 ] ) ) {
				$to = $values[ 1 ];
			}
		}
	}

	function _checked_selected() {
		if ( $this->input_type === 'dropdown' ) {
			return 'selected';
		}
		if ( $this->input_type === 'checkbox' || $this->input_type === 'radio' || $this->input_type === 'button' ) {
			return 'checked';
		}
	}

	function _output( $class, $html ) {
		global $pt_cv_id;

		$label = $this->_label();
		return sprintf( '<div class="%s" id="%s" data-name="%s" data-sid="%s">%s</div>', esc_attr( $this->class . $class ), esc_attr( $this->id ), esc_attr( $this->name ), esc_attr( $pt_cv_id ), $label . $html );
	}

	function _count( $key ) {
		if ( ($this->input_type === 'radio' || $this->input_type === 'button') && $key === '' ) {
			return null;
		}

		global $cvp_lf_data;

		$count = 0;
		if ( isset( $cvp_lf_data[ $this->data_type ][ $this->original_name ][ $key ][ 'count' ] ) ) {
			$count = $cvp_lf_data[ $this->data_type ][ $this->original_name ][ $key ][ 'count' ];
		}

		$this->posts_count = $count;

		return ($this->others[ 'show_count' ] === 'yes') ? sprintf( '<span class="cvp-count"> (%s)</span>', $count ) : null;
	}

	function _add_to_sorting( $text, $key, $item_html ) {
		$GLOBALS[ 'cvp_lf_html_arr' ][] = array( 'displaytext' => $text, 'rawvalue' => $key, 'pcount' => $this->posts_count, 'html' => $item_html );
	}

	function _sort( $prepend = null ) {
		$sort_by = isset( $this->others[ 'order_options_by' ] ) ? explode( '_', $this->others[ 'order_options_by' ] ) : '';
		$lf_arr	 = $GLOBALS[ 'cvp_lf_html_arr' ];

		# Sort options, if needed
		if ( isset( $sort_by[ 0 ], $sort_by[ 1 ] ) ) {
			$new_arr = array();
			foreach ( $lf_arr as $key => $row ) {
				if ( !isset( $row[ $sort_by[ 0 ] ] ) ) {
					continue;
				}

				$new_arr[ $key ] = $row[ $sort_by[ 0 ] ];
			}

			$sort_order	 = ($sort_by[ 1 ] === 'asc') ? SORT_ASC : SORT_DESC;
			$sort_flag	 = ($sort_by[ 0 ] === 'pcount') ? SORT_NUMERIC : SORT_REGULAR;
			array_multisort( $new_arr, $sort_order, $sort_flag, $lf_arr );
		}

		# Get the HTML array of options
		$output = array();
		foreach ( $lf_arr as $row ) {
			$output[] = $row[ 'html' ];
		}

		if ( $prepend ) {
			array_unshift( $output, $prepend );
		}

		return $output;
	}

	function _ignore() {
		return $this->others[ 'hide_empty' ] === 'yes' && apply_filters( PT_CV_PREFIX_ . 'hide_live_filter', $this->posts_count === 0, $this );
	}

	function _input( $input_type ) {
		$default_option = null;

		foreach ( $this->items as $key => $text ) {
			$this->_item( $key, $text );
			if ( $key && $this->_ignore() ) {
				continue;
			}

			$item_html = sprintf( '<div class="%1$s"><label><input type="%1$s" name="%2$s" value="%3$s" %4$s/>%5$s</label></div>', esc_attr( $input_type ), esc_attr( $this->name ), esc_attr( $key ), $this->item->selected, ($this->input_type === 'button') ? "<div>{$this->item->text}</div>" : $this->item->text  );
			if ( $key ) {
				$this->_add_to_sorting( $text, $key, $item_html );
			} else {
				$default_option = $item_html; /* Move the default option of Radio type to top */
			}
		}
		return $this->_output( "cvp-$input_type ", implode( '', $this->_sort( $default_option ) ) );
	}

	function checkbox() {
		return $this->_input( 'checkbox' );
	}

	function radio() {
		$this->items = array( '' => !empty( $this->others[ 'default_text' ] ) ? $this->others[ 'default_text' ] : __( 'All', 'content-views-pro' ) ) + $this->items;

		$html = $this->_input( 'radio' );

		// Check the All option
		if ( strpos( $html, 'checked/>' ) === false ) {
			$html = str_replace( 'value="" />', 'value="" checked/>', $html );
		}

		return $html;
	}

	function dropdown() {
		$default		 = !empty( $this->others[ 'default_text' ] ) ? $this->others[ 'default_text' ] : (($this->data_type === CVP_LF_SORT) ? __( 'Default', 'content-views-pro' ) : __( 'All', 'content-views-pro' ));
		$default_option	 = sprintf( '<option value="%s">%s</option>', '', isset( $this->others[ 'default' ] ) ? $this->others[ 'default' ] : $default  );

		foreach ( $this->items as $key => $text ) {
			$this->_item( $key, $text );
			if ( $key && $this->_ignore() ) {
				continue;
			}

			$item_html = sprintf( '<option value="%s" %s>%s</option>', esc_attr( $key ), $this->item->selected, $this->item->text );
			$this->_add_to_sorting( $text, $key, $item_html );
		}
		$html = sprintf( '<select name="%s">%s</select>', esc_attr( $this->name ), implode( '', $this->_sort( $default_option ) ) );

		return $this->_output( 'cvp-dropdown ', $html );
	}

	function button() {
		$html = $this->radio();

		$html	 = str_replace( 'cvp-radio', 'cvp-button', $html );
		$html	 = str_replace( 'class="radio"', 'class="btn"', $html );

		return $html;
	}

	function range_slider() {
		if ( empty( $this->items ) ) {
			return null;
		}

		$min = min( $this->items );
		$max = max( $this->items );

		$from	 = isset( $this->others[ 'from' ] ) ? $this->others[ 'from' ] : $min;
		$to		 = $max;

		$this->_selected_values( $from, $to );

		$html = sprintf( '<input type="text" name="%s" class="cvp-range-input" data-type="double" data-grid="true" data-min="%s" data-max="%s" data-from="%s" data-to="%s" data-step="%s" data-prefix="%s" data-postfix="%s"/>', esc_attr( $this->name ), esc_attr( $min ), esc_attr( $max ), esc_attr( $from ), esc_attr( $to ), esc_attr( $this->others[ 'step' ] ), esc_attr( $this->others[ 'prefix' ] ), esc_attr( $this->others[ 'postfix' ] ) );

		return $this->_output( 'cvp-range ', $html );
	}

	function date_range() {
		$date_operator = $this->others[ 'date_operator' ];

		$html = sprintf( '<input type="hidden" name="%s">', esc_attr( $this->name ) );

		// Value
		$from_val	 = $to_val		 = '';
		$this->_selected_values( $from_val, $to_val );

		// Html
		if ( $date_operator !== 'date-fromto' ) {
			$html .= $this->_single_date( $from_val, $this->others[ 'date_operator' ] );
		} else {
			$html .= $this->_single_date( $from_val, 'date-from' ) . $this->_single_date( $to_val, 'date-to' );
		}

		return $this->_output( 'cvp-daterange ', $html );
	}

	function _single_date( $value, $type ) {
		$label = esc_html( $this->others[ 'label' ] );
		if ( empty( $label ) || $label === CVP_LIVE_FILTER::default_label( $this->original_name ) ) {
			switch ( $type ) {
				case 'date-from':
					$label = __( 'From', 'content-views-pro' );
					break;

				case 'date-to':
					$label = __( 'To', 'content-views-pro' );
					break;
			}
		}

		return sprintf( '<label>%s <input type="text" value="%s" data-nosubmit="true" class="cvp-date-field"></label>', $label, $value );
	}

	function search_field() {
		$html = sprintf( '<input type="text" name="%s" value="%s" data-nosubmit="true" placeholder="%s"/>', CVP_LF_SEARCH, esc_attr( CVP_LIVE_FILTER_SEARCH::get_searched_value() ), esc_attr( $this->others[ 'placeholder' ] ) );

		if ( CVP_LIVE_FILTER::is_search_page() ) {
			$html .= sprintf( '<input type="hidden" name="%s" value="%s" data-nosubmit="true" data-lfpage="search"/>', CVP_LF_WHICH_PAGE, 's' );
		}

		return $this->_output( 'cvp-search-box ', $html );
	}

}
