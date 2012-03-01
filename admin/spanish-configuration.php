<?php
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

if ( isset( $_REQUEST['tcp-configurar-spanish'] ) ) :
	$settings = get_option( 'tcp_settings' ); ?>
<div id="message" class="updated">
	<?php if ( isset( $_REQUEST['tcp_formato_numerico'] ) ) : ?>
		<p>Formato numérico configurado a 9.999,9</p><?php
		$settings['decimal_currency']	= 2;
		$settings['decimal_point']		= ',';
		$settings['thousands_separator']	= '.';
	endif; ?>
	<?php if ( isset( $_REQUEST['tcp_moneda'] ) ) : ?>
		<p>Moneda configurada a Euro (EUR)</p><?php
		$settings['currency'] = 'EUR';
	endif; ?>
	<?php if ( isset( $_REQUEST['tcp_formato_moneda'] ) ) : ?>
		<p>Formato moneda configurada a 999 €</p><?php
		$settings['currency_layout'] = '%2$s %1$s';
	endif; ?>
	<?php if ( isset( $_REQUEST['tcp_unidad_peso'] ) ) : ?>
		<p>Unidad peso configurada a Kg.</p><?php
		$settings['unit_weight'] = 'Kg.';
	endif; ?>
	<?php if ( isset( $_REQUEST['tcp_pais_base'] ) ) : ?>
		<p>País base configurado a España (ES).</p><?php
		$settings['country'] = 'ES';
	endif; ?>
	<?php if ( isset( $_REQUEST['tcp_pais_impuestos'] ) ) : ?>
		<p>País base para impuestos configurado a España (ES).</p><?php
		$settings['default_tax_country'] = 'ES';
	endif; ?>
</div>
<?php 
update_option( 'tcp_settings', $settings );
global $thecartpress;
if ( $thecartpress ) $thecartpress->load_settings();
endif; ?>
<div class="wrap">
	<h2>Configuracion para España</h2>
	<ul class="subsubsub"></ul>
	<div class="clear"></div>
	<p>Esta pantalla permite configurar TheCartPress para el mercado Español.</p>
	<form method="post">
	<p>Realizar los siguientes cambios:</p>
	<ul>
		<li><label><input type="checkbox" name="tcp_formato_numerico" checked="true"/> Formato numérico: 9.999,9</label> Formato actual <?php tcp_number_format_example( 9999.9, false ); ?></li>
		<li><label><input type="checkbox" name="tcp_moneda" checked="true"/> La moneda: Euro. La moneda actual es <?php tcp_the_currency(); ?></li>
		<li><label><input type="checkbox" name="tcp_formato_moneda" checked="true"/> Formato moneda: 999 €. El formato actual es <?php echo tcp_format_the_price( 999 ); ?></li>
		<li><label><input type="checkbox" name="tcp_unidad_peso" checked="true"/> Unidad peso: Kg. El formato actual es <?php tcp_the_unit_weight(); ?></li>
		<li><label><input type="checkbox" name="tcp_pais_base" checked="true"/> País base: ES. El país actual es <?php global $thecartpress; if ( $thecartpress ) echo $thecartpress->settings['country']; ?></li>
		<li><label><input type="checkbox" name="tcp_pais_impuestos" checked="true"/> País base para impuestos: ES. El país actual es <?php echo tcp_get_default_tax_country(); ?></li>
	</ul>
	<input type="submit" value="Configurar" name="tcp-configurar-spanish" class="button-primary"/>
	</form>
</div>
