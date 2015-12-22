<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * json编码
 * 不转义"中文"与"JavaScript转义符"
 * 替换双引号为空 
 */
if ( ! function_exists('json_encode_ex')){
    function json_encode_ex($var) {
        if ($var === null)
            return 'null';
        if ($var === true)
            return 'true';
        if ($var === false)
            return 'false';
        static $reps = array(
        	array('"', "\n", "\r") ,
        	array('', '\n', '\r')
        );
        if (is_scalar($var))
            return '"' . str_replace($reps[0], $reps[1], (string)$var) . '"';
        if (!is_array($var))
            throw new Exception('JSON encoder error!');
        $isMap = false;
        $i = 0;
        foreach (array_keys($var) as $k) {
            if (!is_int($k) || $i++ != $k) {
                $isMap = true;
                break;
            }
        }
        $s = array();
        if ($isMap) {
            foreach ($var as $k => $v)
                $s[] = '"' . $k . '":' . call_user_func(__FUNCTION__, $v);
            return '{' . implode(',', $s) . '}';
        } else {
            foreach ($var as $v)
                $s[] = call_user_func(__FUNCTION__, $v);
            return '[' . implode(',', $s) . ']';
        }
    }
}
