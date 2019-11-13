<?php
namespace System\Core\Utils;

class ConfigLoader
{
    /**
     * @var string[]
     */
    private $appConfiguration;

    /**
     * @var \System\Core\Utils\ConfigLoader
     */
    private static $instance = null;

    protected function __construct()
    {
        $this->appConfiguration = require_once 'config/app.php';
    }
    
    /**
     * @return \System\Core\Utils\ConfigLoader
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ConfigLoader();
        }
        return self::$instance;
    }

    /**
     * @param string $key
     * @return string
     */
    public function getValue($key)
    {
        if (strpos($key, '.') !== false) {
            $dots = explode('.', $key);
            $currentValue = null;
            foreach ($dots as $dotKey) {
                if ($currentValue == null) {
                    $currentValue = $this->appConfiguration[$dotKey];
                } else {
                    $currentValue = $currentValue[$dotKey];
                }
            }
            return $currentValue;
        } else {
            return $this->appConfiguration[$key];
        }
    }
}
