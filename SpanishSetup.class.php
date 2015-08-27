<?php
/*
Plugin Name: TheCartPress Spanish Setup
Plugin URI: http://thecartpress.com
Description: TheCartPress Spanish Setup
Version: 1.4
Author: Pluginsmaker team
Author URI: http://pluginsmaker.com
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

class TCPSpanishSetup {

	static function initPlugin() {
		add_action( 'init', array( __CLASS__, 'init' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ), 99 );
	}

	static function init() {
		add_action( 'tcp_states_loading', array( __CLASS__, 'tcp_states_loading' ) );
	}

	static function admin_menu() {
		global $thecartpress;
		if ( $thecartpress ) {
			$base = $thecartpress->get_base_tools();
			add_submenu_page( $base, 'Español', 'Español', 'tcp_edit_settings', dirname( __FILE__ ) . '/admin/spanish-configuration.php' );
		}
	}

	static function tcp_states_loading() { ?>
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

TCPSpanishSetup::initPlugin();