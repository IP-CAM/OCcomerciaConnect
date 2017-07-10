<?php
namespace comercia;
use Cache\File;

class Util
{

    static function url()
    {
        static $url = false;
        if (!$url) {
            require_once(__DIR__ . "/url.php");
            $url = new Url();
        }
        return $url;
    }

    static function version()
    {
        static $version = false;
        if (!$version) {
            require_once(__DIR__ . "/version.php");
            $version = new Version();
        }
        return $version;
    }


    static function load()
    {
        static $load = false;
        if (!$load) {
            require_once(__DIR__ . "/load.php");
            $load = new Load();
        }
        return $load;
    }

    static function image(){
        static $image = false;
        if (!$image) {
            require_once(__DIR__ . "/image.php");
            $image = new Image();
        }
        return $image;
    }

    static function filesystem(){
        static $fs = false;
        if (!$fs) {
            require_once(__DIR__ . "/filesystem.php");
            $fs = new Filesystem();
        }
        return $fs;
    }

    static function response()
    {
        static $response = false;
        if (!$response) {
            require_once(__DIR__ . "/response.php");
            $response = new Response();
        }
        return $response;
    }


    static function http()
    {
        static $http = false;
        if (!$http) {
            require_once(__DIR__ . "/http.php");
            $http = new Http();
        }
        return $http;
    }

    static function stringHelper()
    {
        static $stringHelper = false;
        if (!$stringHelper) {
            require_once(__DIR__ . "/stringHelper.php");
            $stringHelper = new StringHelper();
        }
        return $stringHelper;
    }

    static function arrayHelper()
    {
        static $arrayHelper = false;
        if (!$arrayHelper) {
            require_once(__DIR__ . "/arrayHelper.php");
            $arrayHelper = new ArrayHelper();
        }
        return $arrayHelper;
    }

    static function info()
    {
        static $info = false;
        if (!$info) {
            require_once(__DIR__ . "/info.php");
            $info = new Info();
        }
        return $info;
    }

    static function route()
    {
        static $route = false;
        if (!$route) {
            require_once(__DIR__ . "/route.php");
            $route = new Route();
        }
        return $route;
    }

    static function config()
    {
        static $config = false;
        if (!$config) {
            require_once(__DIR__ . "/config.php");
            $config = new Config();
        }
        return $config;
    }

    static function form(&$data)
    {
        require_once(__DIR__ . "/form.php");
        return new Form($data);
    }

    static function breadcrumb(&$data)
    {
        require_once(__DIR__ . "/breadcrumb.php");
        return new Breadcrumb($data);
    }

    static function request()
    {
        static $path = false;
        if (!$path) {
            require_once(__DIR__ . "/arrayObject.php");
            require_once(__DIR__ . "/request.php");
            $path = new Request();
        }
        return $path;
    }

    static function language()
    {
        static $language = false;
        if (!$language) {
            require_once(__DIR__ . "/language.php");
            $path = new Language();
        }
        return $path;
    }

    public static function session()
    {
        static $session = false;
        if (!$session) {
            require_once(__DIR__ . "/arrayObject.php");
            $session = new ArrayObject(Util::registry("load")->get("session")->data);
        }
        return $session;
    }

    public static function registry()
    {
        global $registry;
        return $registry;
    }

    public static function html()
    {
        static $html = false;
        if (!$html) {
            require_once(__DIR__ . "/html.php");
            $html = new Html();
        }
        return $html;
    }


    public static function controllerHelper()
    {
        static $helper = false;
        if (!$helper) {
            require_once(__DIR__ . "/controllerHelper.php");
            $helper = new ControllerHelper();
        }
        return $helper;
    }

    public static function document()
    {
        static $document = false;
        if (!$document) {
            require_once(__DIR__ . "/document.php");
            $document = new Document();
        }
        return $document;
    }

    public static function patch(){
        static $patch = false;
        if (!$patch) {
            require_once(__DIR__ . "/patch.php");
            $patch = new Patch();
        }
        return $patch;
    }

    public static function db()
    {
        static $db = false;
        if(!$db) {
            require_once __DIR__ . "/db.php";
            $db = new db();
        }
        return $db;
    }
}

?>