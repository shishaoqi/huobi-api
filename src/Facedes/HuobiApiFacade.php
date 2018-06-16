<?php
namespace shishao\huobiApi\Facades;

use Illuminate\Support\Facades\Facade;
class HuobiApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HuobiApi';
    }
}