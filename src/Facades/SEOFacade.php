<?php 

namespace MeestorHok\Blue\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MeestorHok\Blue\SEOGenerator
 */
class SEOFacade extends Facade 
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SEO';
    }
}