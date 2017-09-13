<?php
namespace Pimlie\DatatablesMongodb\Engines;

use Yajra\Datatables\Engines\BaseEngine As YajraBaseEngine;
use Pimlie\DatatablesMongodb\Processors\DataProcessor;


abstract class BaseEngine extends YajraBaseEngine
{
    /**
     * Get config is case insensitive status.
     *
     * @return bool
     */
    public function isCaseInsensitive()
    {
        return config('datatables-mongodb.search.case_insensitive', false);
    }
    
    /**
     * Set smart search config at runtime.
     *
     * @param bool $bool
     * @return $this
     */
    public function smart($bool = true)
    {
        config(['datatables-mongodb.search.smart' => $bool]);
        return $this;
    }    
    
    /**
     * Get config use wild card status.
     *
     * @return bool
     */
    public function isWildcard()
    {
        return config('datatables-mongodb.search.use_wildcards', false);
    }


    /**
     * Get columns definition.
     *
     * @return array
     */
    protected function getColumnsDefinition()
    {
        $config  = config('datatables-mongodb.columns');
        $allowed = ['excess', 'escape', 'raw', 'blacklist', 'whitelist'];

        return array_merge(array_only($config, $allowed), $this->columnDef);
    }
}
