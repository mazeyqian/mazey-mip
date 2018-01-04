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
        /* 文章页面才提交 */
        if(!is_single()):
            /* echo '123'; */
            return false;
        endif;
        /* 获取ID */
        $thisPostID = get_the_ID() != false ? get_the_ID() : -1;
        /* 如果 提交成功过返回false */
        if($this->isThisPostIDTodayPush($thisPostID)):
            return false;
        endif;
        //die('test');
        $returnPush = $this->pushBD($arr);
        $returnPushArr = json_decode($returnPush, true);
        /* 日志文本 */
        $log_contentArr = array();
        $log_contentArr[] = array('ret' => $returnPushArr);
        $log_contentArr[] = array('link' => $arr);
        $log_content = json_encode($log_contentArr);
        $log_type = 'unknow';
        if(array_key_exists('success_mip', $returnPushArr)):
            $log_type = 'success';
        else:
            $log_type = 'error';
        endif;
        $data = array(
            'log_user_id' => '1',
            'log_content' => $log_content,
            'log_type' => $log_type,
            'log_time' => date("Y-m-d H:i:s"),
            'log_post_id' => $thisPostID
        );
        $ret = $wpdb->insert($wpdb->prefix . 'log', $data);
        /* echo 'test-class';
        return $ret; */
    }

    private function isThisPostIDTodayPush($ID) {
        global $wpdb;
        $ret = $wpdb->get_row("select 1 from " . $wpdb->prefix . "log where log_post_id = {$ID} and timestampdiff(day,log_time,now())<=14;");
        //var_dump($ret);
        //var_dump("select log_post_id from " . $wpdb->prefix . "log where log_post_id = {$ID} ;");
        if($ret == NULL):
            return false;
        else:
            return true;
        endif;
    }
}