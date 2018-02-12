<?php
namespace comercia;
class Form
{

    var $data;

    function __construct(&$data)
    {
        $this->data =& $data;
    }

    function fillFromSession($first)
    {
        if (is_array($first)) {
            $keys = $first;
        } else {
            $keys = func_get_args();
        }
        $session = Util::session();
        foreach ($keys as $key=>$value) {
            if(is_numeric($key)){
                $key=$value;
            }

            $this->initializeKey($key);
            if (!$this->data[$key] && isset($session->$value)) {
                $this->data[$key] = $session->$value;
            }
        }

        return $this;
    }

    function initializeKey($key)
    {
        if (!isset($this->data[$key])) {
            $this->data[$key] = "";
        }
    }

    function fillFromSessionClear($first)
    {
        if (is_array($first)) {
            $keys = $first;
        } else {
            $keys = func_get_args();
        }
        $session = Util::session();
        foreach ($keys as $key=>$value) {
            if(is_numeric($key)){
                $key=$value;
            }

            $this->initializeKey($key);
            if (!$this->data[$key] && isset($session->$value)) {
                $this->data[$key] = $session->$value;
                $session->remove($key);
            }
        }
        return $this;
    }

    function fillFromPost($first)
    {
        if (is_array($first)) {
            $keys = $first;
        } else {
            $keys = func_get_args();
        }
        $post = Util::request()->post();
        foreach ($keys as $key=>$value) {
            if(is_numeric($key)){
                $key=$value;
            }
            $this->initializeKey($key);
            if (!$this->data[$key] && isset($post->$value)) {
                $this->data[$key] = $post->$value;
            }
        }
        return $this;
    }


    function fillFromGet($first)
    {
        if (is_array($first)) {
            $keys = $first;
        } else {
            $keys = func_get_args();
        }
        $get = Util::request()->get();
        foreach ($keys as $key=>$value) {
            if(is_numeric($key)){
                $key=$value;
            }
            $this->initializeKey($key);
            if (!$this->data[$key] && isset($get->$value)) {
                $this->data[$key] = $get->$value;
            }
        }
        return $this;
    }

    function fillFromConfig($first)
    {
        if (is_array($first)) {
            $keys = $first;
        } else {
            $keys = func_get_args();
        }
        foreach ($keys as $key=>$value) {
            if(is_numeric($key)){
                $key=$value;
            }
            $this->initializeKey($key);
            if (!$this->data[$key] && Util::config()->$value) {
                $this->data[$key] = Util::config()->$value;
            }
        }
        return $this;
    }


    function fillSelectboxOptions($name, $data)
    {
        $options = $this->selectboxOptions($name);
        foreach ($data as $key => $value) {
            $options->add($key, $value);
        }
        return $this;
    }

    function selectboxOptions($key)
    {
        require_once(__DIR__ . "/selectboxOptions.php");
        return new selectboxOptions($this->data, $key);
    }


    function finish($function)
    {
        if ((Util::request()->server()->REQUEST_METHOD == 'POST')) {
            $function($this->data);
        }
    }

}

?>