<?php
/*
Plugin Name: TheCartPress Spanish Setup
Plugin URI: http://thecartpress.com
Description: TheCartPress Spanish Setup
Version: 1.2.6
Author: TheCartPress team
Author URI: http://thecartpress.com
License: GPL
Parent: thecartpress
*/

/**
 * This file is part of TheCartPress-SpanishSetup.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define( 'TCP_SPANISH_FOLDER', dirname( __FILE__ ) . '/languages/' );

class TCPSpanishSetup {

	function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'admin_menu', array( &$this, 'admin_menu' ), 99 );
		add_filter( 'load_textdomain_mofile', array( &$this, 'load_textdomain_mofile' ), 10, 2 );
		//add_filter( 'mu_dropdown_languages', array( &$this, 'mu_dropdown_languages' ) , 10, 3 );
	}

	function init() {
		add_filter( 'locale', array( &$this, 'locale' ) );
		add_action( 'tcp_states_loading', array( &$this, 'tcp_states_loading' ) );
	}

	function locale( $locale ) {
		return 'es_ES';
	}

	/*function mu_dropdown_languages( $output, $lang_files, $current ) {
		$out = '<option value="es_ES"' . selected( $current, 'es_ES', false ) . '>Español</option>';
		return $out . $output;
	}*/

	function admin_menu() {
		global $thecartpress;
		if ( $thecartpress ) {
			$base = $thecartpress->get_base_tools();
			add_submenu_page( $base, 'Español', 'Español', 'tcp_edit_settings', dirname( __FILE__ ) . '/admin/spanish-configuration.php' );
		}
	}

	function load_textdomain_mofile( $moFile, $domain ) {
		if ( 'tcp' == substr( $domain, 0, 3 ) ) {
//if ( $domain == 'tcp_max') echo '<br>', $moFile;
//if ( $domain == 'tcp') echo '<br>', $moFile;
//if ( $domain == 'tcp-discount') echo '<br>', $moFile;
			$wplang = get_option( 'WPLANG', get_locale() );
			if ( strlen( $wplang ) == 0 ) $wplang = get_locale();
			$is_spanish = 'es_' == substr( $wplang, 0, 3 );
			if ( ! $is_spanish && function_exists( 'tcp_get_current_language_iso' ) ) $is_spanish = 'es' == tcp_get_current_language_iso();
			if ( $is_spanish ) {
				$new_mofile = TCP_SPANISH_FOLDER . $domain . '-' . $wplang . '.mo';
				if ( is_readable( $new_mofile ) ) return $new_mofile;
			}
		}
		return $moFile;
	}


	function tcp_states_loading() { ?>

, 'ES' : { //Spain
	'C' : 'La Coruña', 'VI' : 'Álava', 'AB' : 'Albacete', 'A' : 'Alicante', 'AL' : 'Almería', 'O' : 'Asturias',
	'AV' : 'Ávila', 'BA' : 'Badajoz', 'PM' : 'Islas Baleares', 'B' : 'Barcelona', 'BU' : 'Burgos', 'CC' : 'Cáceres',
	'CA' : 'Cádiz', 'S' : 'Cantabria', 'CS' : 'Castellón', 'CE' : 'Ceuta', 'CR' : 'Ciudad Real', 'CO' : 'Córdoba',
	'CU' : 'Cuenca', 'GI' : 'Gerona', 'GR' : 'Granada', 'GU' : 'Guadalajara', 'SS' : 'Guipúzcoa', 'H' : 'Huelva',
	'HU' : 'Huesca', 'J' : 'Jaén', 'LO' : 'La Rioja', 'GC' : 'Las Palmas', 'LE' : 'León', 'L' : 'Lérida', 'LU' : 'Lugo',
	'M' : 'Madrid', 'MA' : 'Málaga', 'ML' : 'Melilla', 'MU' : 'Murcia', 'NA' : 'Navarra', 'OR' : 'Orense', 'P' : 'Palencia',
	'PO' : 'Pontevedra', 'SA' : 'Salamanca', 'TF' : 'Santa Cruz de Tenerife', 'SG' : 'Segovia', 'SE' : 'Sevilla', 'SO' : 'Soria',
	'T' : 'Tarragona', 'TE' : 'Teruel', 'TO' : 'Toledo', 'V' : 'Valencia', 'VA' : 'Valladolid', 'BI' : 'Vizcaya', 'ZA' : 'Zamora', 'Z' : 'Zaragoza'
}

<?php }
}

new TCPSpanishSetup();
?>
