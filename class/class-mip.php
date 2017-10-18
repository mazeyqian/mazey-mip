<?php
/* mip类 */
class Class_MIP {
    /* 获取当前地址 */
    public function return_current_url() {
        $current_url = get_bloginfo('url');
        if(is_home()) {
            $current_url = get_bloginfo('url');
        } elseif(is_tax() || is_tag() || is_category()) {
            $query_object = get_queried_object();
            $current_url = get_term_link($query_object, $query_object->taxonomy);
        } elseif(is_page() || is_single) {
            $current_url = get_permalink();
        }
        return $current_url;
    }

    public function print_current_url() {
        echo $this->return_current_url();
    }

    /* 推送至百度 */
    private function pushBD($arr) {
        $urls = $arr;
        $api = 'http://data.zz.baidu.com/urls?site=www.zhibaifa.com&token=jtS7XW0ZjaEB8wLq&type=mip';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        return $result;
    }

    public function pushBDAndWriteLog($arr) {
        global $wpdb;
        $returnPush = $this->pushBD($arr);
        $returnPushArr = json_decode($returnPush, true);
        $log_type = 'unknow';
        if(array_key_exists('success_mip', $returnPushArr)):
            $log_type = 'success';
        else:
            $log_type = 'error';
        endif;
        $data = array(
            'log_user_id' => '1',
            'log_content' => $returnPush,
            'log_type' => $log_type,
            'log_time' => date("Y-m-d H:i:s")
        );
        $ret = $wpdb->insert($wpdb->prefix . 'log', $data);
        /* echo 'test-class';
        return $ret; */
    }
}