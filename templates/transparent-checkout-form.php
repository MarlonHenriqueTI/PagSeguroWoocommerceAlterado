<?php
/**
 * Transparent checkout form.
 *
 * @author  Claudio_Sanches
 * @package WooCommerce_PagSeguro/Templates
 * @version 2.12.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<fieldset id="pagseguro-payment-form" class="<?php echo 'storefront' === basename( get_template_directory() ) ? 'woocommerce-pagseguro-form-storefront' : ''; ?>" data-cart_total="<?php echo esc_attr( number_format( $cart_total, 2, '.', '' ) ); ?>">

	<ul id="pagseguro-payment-methods">
		<?php if ( 'yes' == $tc_credit ) : ?>
		<li><label><input id="pagseguro-payment-method-credit-card" type="radio" name="pagseguro_payment_method" value="credit-card" <?php checked( true, ( 'yes' == $tc_credit ), true ); ?> /> <?php _e( 'Credit Card', 'woocommerce-pagseguro' ); ?></label></li>
		<?php endif; ?>

		<?php if ( 'yes' == $tc_transfer ) : ?>
		<li><label><input id="pagseguro-payment-method-bank-transfer" type="radio" name="pagseguro_payment_method" value="bank-transfer" <?php checked( true, ( 'no' == $tc_credit && 'yes' == $tc_transfer ), true ); ?> /> <?php _e( 'Bank Transfer', 'woocommerce-pagseguro' ); ?></label></li>
		<?php endif; ?>

			

		<?php if ( 'yes' == $tc_ticket ) : ?>
		<li id="liboleto"><label><input id="pagseguro-payment-method-banking-ticket" type="radio" name="pagseguro_payment_method" value="banking-ticket" <?php checked( true, ( 'no' == $tc_credit && 'no' == $tc_transfer && 'yes' == $tc_ticket ), true ); ?> /> <?php _e( 'Banking Ticket', 'woocommerce-pagseguro' ); ?></label></li>
		
		<?php endif; ?>
		
	</ul>
	<div class="clear"></div>

	<?php if ( 'yes' == $tc_credit ) : ?>
		<div id="pagseguro-credit-card-form" class="pagseguro-method-form">
			<p id="pagseguro-card-holder-name-field" class="form-row form-row-first">
				<label for="pagseguro-card-holder-name"><?php _e( 'Card Holder Name', 'woocommerce-pagseguro' ); ?> <small>(<?php _e( 'as recorded on the card', 'woocommerce-pagseguro' ); ?>)</small> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-name" name="pagseguro_card_holder_name" class="input-text" type="text" autocomplete="off" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<p id="pagseguro-card-number-field" class="form-row form-row-last">
				<label for="pagseguro-card-number"><?php _e( 'Card Number', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-number" class="input-text wc-credit-card-form-card-number" type="tel" maxlength="20" autocomplete="off" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-expiry-field" class="form-row form-row-first">
				<label for="pagseguro-card-expiry"><?php _e( 'Expiry (MM/YYYY)', 'woocommerce-pagseguro' ); ?> Exemplo: <span class="required">01/2023 *</span></label>
				<select id="ExpiryDate_month" class="form-control" name="ExpiryDate_month" style=" float: left;width: 64px;" onclick="exp_data()">
                    <option value="01">01 - Janeiro</option>
                    <option value="02">02 - Fevereiro</option>
                    <option value="03">03 - Março</option>
                    <option value="04">04 - Abril</option>
                    <option value="05">05 - Maio</option>
                    <option value="06">06 - Junho</option>
                    <option value="07">07 - Julho</option>
                    <option value="08">08 - Agosto</option>
                    <option value="09">09 - Setembro</option>
                    <option value="10">10 - Outubro</option>
                    <option value="11">11 - Novembro</option>
                    <option value="12">12 - Dezembro</option>
                </select>
                <select id="ExpiryDate_year" class="form-control" name="ExpiryDate_year" style="float: left;width: 112px;" onclick="exp_data()">  
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                </select>
				<input id="pagseguro-card-expiry" class="input-text wc-credit-card-form-card-expiry" type="tel" autocomplete="off" placeholder="<?php _e( 'MM / YYYY', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px; opacity: 0;" />
				<script language="javascript">
					function exp_data(){
						var mes = document.getElementById('ExpiryDate_month').value;
						var ano = document.getElementById('ExpiryDate_year').value;
						document.getElementById('pagseguro-card-expiry').value = mes+' / '+ano;
					}
				</script>
			</p>
			<p id="pagseguro-card-cvc-field" class="form-row form-row-last">
				<label for="pagseguro-card-cvc"><?php _e( 'Security Code', 'woocommerce-pagseguro' ); ?> <small>(fica no verso do cartão)</small> <span class="required">*</span></label>
				<input id="pagseguro-card-cvc" class="input-text wc-credit-card-form-card-cvc" type="tel" autocomplete="off" placeholder="<?php _e( 'CVC', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" /> 
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-installments-field" class="form-row form-row-first">
				<label for="pagseguro-card-installments"><?php _e( 'Installments', 'woocommerce-pagseguro' ); ?> <small>(<?php _e( 'the minimum value of the installment is R$ 5,00', 'woocommerce-pagseguro' ); ?>)</small> <span class="required">*</span></label>
				<select id="pagseguro-card-installments" name="pagseguro_card_installments" style="font-size: 1.5em; padding: 4px; width: 100%;" disabled="disabled">
					<option value="0">--</option>
				</select>
			</p>
			<p id="pagseguro-card-holder-cpf-field" class="form-row form-row-last">
				<label for="pagseguro-card-holder-cpf"><?php _e( 'Card Holder CPF', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-cpf" name="pagseguro_card_holder_cpf" class="input-text wecfb-cpf-field" type="tel" autocomplete="off" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-holder-birth-date-field" class="form-row form-row-first">
				<label for="pagseguro-card-holder-birth-date"><?php _e( 'Card Holder Birth Date', 'woocommerce-pagseguro' ); ?>. <br>Exemplo: <span class="required">04/05/<strong>1960</strong> *</span></label>
				<select id="pagseguro-dia" class="form-control" name="pagseguro-card-holder-birth-date" style="float: left;width: 30%;" onclick="data_cartao()">  
                <?php for ($i=1; $i <= 9; $i++) { 
					echo '<option value="0'.$i.'">0'.$i.'</option>';
				} 
				for ($i=10; $i <= 31; $i++) { 
					echo '<option value="'.$i.'">'.$i.'</option>';
				}?> 
                </select>
						 <select id="pagseguro-mes" class="form-control" name="pagseguro-card-holder-birth-date" style="float: left;width: 30%;" onclick="data_cartao()">  
                <?php for ($i=1; $i <= 9; $i++) { 
					echo '<option value="0'.$i.'">0'.$i.'</option>';
				} 
				for ($i=10; $i <= 12; $i++) { 
					echo '<option value="'.$i.'">'.$i.'</option>';
				}?> 
                </select>
						 <select id="pagseguro-ano" class="form-control" name="pagseguro-card-holder-birth-date" style="float: left;width: 40%;" onclick="data_cartao()">  
                    <?php for ($i=1900; $i <= 2018; $i++) { 
					echo '<option value="'.$i.'">'.$i.'</option>';
				}?>
                </select>               
				<input id="pagseguro-card-holder-birth-date" name="pagseguro_card_holder_birth_date" class="input-text" type="tel" autocomplete="off" placeholder="<?php _e( 'DD / MM / YYYY', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px; opacity: 0;" />
				<script language="javascript">
					function data_cartao(){
						var dia = document.getElementById('pagseguro-dia').value;
						var mes = document.getElementById('pagseguro-mes').value;
						var ano = document.getElementById('pagseguro-ano').value;
						document.getElementById('pagseguro-card-holder-birth-date').value = dia+' / '+mes+' / '+ano;
						console.log(dia+mes+ano);
					}
				</script>
			</p>
			<p id="pagseguro-card-holder-phone-field" class="form-row form-row-last">
				<label for="pagseguro-card-holder-phone"><?php _e( 'Card Holder Phone', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-phone" name="pagseguro_card_holder_phone" class="input-text" type="tel" autocomplete="off" placeholder="<?php _e( '(xx) xxxx-xxxx', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' == $tc_transfer ) : ?>
		<div id="pagseguro-bank-transfer-form" class="pagseguro-method-form">
			<p><?php _e( 'Select your bank:', 'woocommerce-pagseguro' ); ?></p>
			<ul>
				<li><label><input type="radio" name="pagseguro_bank_transfer" value="bancodobrasil" /><i id="pagseguro-icon-bancodobrasil"></i><span><?php _e( 'Banco do Brasil', 'woocommerce-pagseguro' ); ?></span></label></li>
				<li><label><input type="radio" name="pagseguro_bank_transfer" value="bradesco" /><i id="pagseguro-icon-bradesco"></i><span><?php _e( 'Banco Bradesco', 'woocommerce-pagseguro' ); ?></span></label></li>
			</ul>
			<p><?php _e( '* After clicking "Proceed to payment" you will have access to the link that will take you to your bank\'s website, so you can make the payment in total security.', 'woocommerce-pagseguro' ); ?></p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' == $tc_ticket ) : ?>
		<div id="pagseguro-banking-ticket-form" class="pagseguro-method-form">
			<p>
				<i id="pagseguro-icon-ticket"></i>
				<?php _e( 'The order will be confirmed only after the payment approval.', 'woocommerce-pagseguro' ); ?>
				<?php if ( 'yes' === $tc_ticket_message ) : ?>
					<br />
					<strong><?php _e( 'Tax', 'woocommerce-pagseguro' ); ?>:</strong> <?php _e( 'R$ 1,00 (rate applied to cover management risk costs of the payment method).', 'woocommerce-pagseguro' ); ?>
				<?php endif; ?>
			</p>
			<p><?php _e( '* After clicking "Proceed to payment" you will have access to banking ticket which you can print and pay in your internet banking or in a lottery retailer.', 'woocommerce-pagseguro' ); ?></p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<p><?php esc_html_e( 'This purchase is being made in Brazil', 'woocommerce-pagseguro' ); ?> <img src="<?php echo esc_url( $flag ); ?>" alt="<?php esc_attr_e( 'Brazilian flag', 'woocommerce-pagseguro' ); ?>" style="display: inline; float: none; vertical-align: middle; border: none;" /></p>

</fieldset>
