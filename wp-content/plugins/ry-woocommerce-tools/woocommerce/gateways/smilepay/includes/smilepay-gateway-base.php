<?php
class RY_SmilePay_Gateway_Base extends RY_Abstract_Payment_Gateway
{
    public static $log_enabled = false;
    public static $log = false;

    public $get_code_mode = false;

    public function __construct()
    {
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);

        if ($this->enabled) {
            add_action('woocommerce_receipt_' . $this->id, [$this, 'receipt_page']);
        }

        if ($this->min_amount < $this->check_min_amount) {
            $this->min_amount = $this->check_min_amount;
        }
    }

    public function get_icon()
    {
        $icon_html = '<img src="' . esc_attr(RY_WT_PLUGIN_URL . 'icon/smilepay_logo.png') . '" alt="' . esc_attr__('SmilePay', 'ry-woocommerce-tools') . '">';

        return apply_filters('woocommerce_gateway_icon', $icon_html, $this->id);
    }

    public function process_admin_options()
    {
        parent::process_admin_options();
    }

    public function receipt_page($order_id)
    {
        if ($order = wc_get_order($order_id)) {
            RY_SmilePay_Gateway_Api::checkout_form($order);
            WC()->cart->empty_cart();
        }
    }
}
