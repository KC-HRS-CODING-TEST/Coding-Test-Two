<?php


namespace App\Core;


/**
 * Interface RouterInterface
 * @package App\Interfaces
 */
interface RouterInterface
{
    /**
     * Declare RESTful resource.
     * @param string $name
     * @return void
     */
    public static function resource($name);

    /**
     * Returns the HTTP request response.
     * @return string
     */
    public function run();
}
