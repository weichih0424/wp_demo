<?php
abstract class RY_Abstract_Api_ECPay extends RY_Abstract_Api
{
    protected static $encrypt_method = 'aes-128-cbc';

    protected static function get_3rd_return_url($order = null)
    {
        $return_url = WC()->api_request_url('ry_ecpay_gateway_return');
        if ($order) {
            $return_url = add_query_arg('id', $order->get_id(), $return_url);
            $return_url = add_query_arg('key', $order->get_order_key(), $return_url);
        }

        return $return_url;
    }

    protected static function generate_trade_no($order_id, $order_prefix = '')
    {
        $trade_no = self::pre_generate_trade_no($order_id, $order_prefix);
        $trade_no = apply_filters('ry_ecpay_trade_no', $trade_no, $order_id);
        return substr($trade_no, 0, 20);
    }

    protected static function add_check_value($args, $HashKey, $HashIV, $hash_algo, $skip_args = [])
    {
        $args['CheckMacValue'] = self::generate_check_value($args, $HashKey, $HashIV, $hash_algo, $skip_args);
        return $args;
    }

    protected static function build_args($data, $MerchantID)
    {
        $args = [
            'MerchantID' => $MerchantID,
            'RqHeader' => [
                'Timestamp' => new DateTime('', new DateTimeZone('Asia/Taipei')),
                'Revision' => '1.0.0'
            ],
            'Data' => wp_json_encode($data)
        ];
        $args['RqHeader']['Timestamp'] = $args['RqHeader']['Timestamp']->format('U');

        return $args;
    }

    protected static function urlencode($string)
    {
        $string = str_replace(
            ['%2D', '%2d', '%5F', '%5f', '%2E', '%2e', '%2A', '%2a', '%21', '%28', '%29'],
            [  '-',   '-',   '_',   '_',    '.',  '.',   '*',   '*',   '!',   '(',   ')'],
            urlencode($string)
        );
        return $string;
    }

    protected static function generate_check_value($args, $HashKey, $HashIV, $hash_algo, $skip_args = [])
    {
        $skip_args[] = 'CheckMacValue';
        foreach ($skip_args as $key) {
            unset($args[$key]);
        }

        ksort($args, SORT_STRING | SORT_FLAG_CASE);

        $args_string = [];
        $args_string[] = 'HashKey=' . $HashKey;
        foreach ($args as $key => $value) {
            $args_string[] = $key . '=' . $value;
        }
        $args_string[] = 'HashIV=' . $HashIV;

        $args_string = implode('&', $args_string);
        $args_string = self::urlencode($args_string);
        $args_string = strtolower($args_string);
        $check_value = hash($hash_algo, $args_string);
        $check_value = strtoupper($check_value);

        return $check_value;
    }

    protected static function encrypt_data($args, $HashKey, $HashIV)
    {
        $args['Data'] = self::urlencode($args['Data']);
        $args['Data'] = openssl_encrypt($args['Data'], self::$encrypt_method, $HashKey, 0, $HashIV);

        return $args;
    }

    protected static function link_server($post_url, $args)
    {
        wc_set_time_limit(40);

        $send_body = [];
        foreach ($args as $key => $value) {
            $send_body[] = $key . '=' . $value;
        }

        return wp_remote_post($post_url, [
            'timeout' => 20,
            'body' => implode('&', $send_body)
        ]);
    }

    protected static function link_v2_server($post_url, $args, $HashKey, $HashIV)
    {
        wc_set_time_limit(40);

        $args['Data'] = self::urlencode($args['Data']);
        $args['Data'] = openssl_encrypt($args['Data'], self::$encrypt_method, $HashKey, 0, $HashIV);

        return wp_remote_post($post_url, [
            'timeout' => 20,
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => wp_json_encode($args)
        ]);
    }

    protected static function get_check_value($ipn_info)
    {
        if (isset($ipn_info['CheckMacValue'])) {
            return $ipn_info['CheckMacValue'];
        }
        return false;
    }

    protected static function get_status($ipn_info)
    {
        if (isset($ipn_info['RtnCode'])) {
            return (int) $ipn_info['RtnCode'];
        }
        return false;
    }

    protected static function get_status_msg($ipn_info)
    {
        if (isset($ipn_info['RtnMsg'])) {
            return $ipn_info['RtnMsg'];
        }
        return false;
    }

    protected static function get_transaction_id($ipn_info)
    {
        if (isset($ipn_info['TradeNo'])) {
            return $ipn_info['TradeNo'];
        }
        return false;
    }

    protected static function get_order_id($ipn_info, $order_prefix = '')
    {
        if (isset($ipn_info['MerchantTradeNo'])) {
            $order_id = self::trade_no_to_order_no($ipn_info['MerchantTradeNo'], $order_prefix);
            $order_id = apply_filters('ry_ecpay_trade_no_to_order_id', $order_id, $ipn_info['MerchantTradeNo']);
            if ($order_id > 0) {
                return $order_id;
            }
        }
        return false;
    }
}
