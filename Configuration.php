<?php
include_once("controller/LoginController.php");
include_once ("controller/InicioController.php");

include_once ("model/InicioModel.php");
include_once ("model/LoginModel.php");


include_once ("helper/Database.php");
include_once ("helper/Router.php");

include_once ("helper/Presenter.php");
include_once ("helper/MustachePresenter.php");

include_once('vendor/mustache/src/Mustache/Autoloader.php');

class Configuration
{

    // CONTROLLERS
    public static function getInicioController()
    {
        return new InicioController(self::getInicioModel(),self::getPresenter());
    }

    public static function getLoginController(){
        return new LoginController(self::getLoginModel(),self::getPresenter());
    }

    // MODELS
    private static function getInicioModel()
    {
        return new InicioModel(self::getDatabase());
    }
    private  static function getLoginModel()
    {
        return new LoginModel(self::getDatabase());
    }

    // HELPERS
    public static function getDatabase()
    {
        $config = self::getConfig();
        return new Database($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    }

    private static function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }


    public static function getRouter()
    {
        return new Router("getLoginController", "get");
    }

    private static function getPresenter()
    {
        return new MustachePresenter("view/template");
    }
}