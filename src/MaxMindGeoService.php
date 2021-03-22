<?php


namespace Leit\Geo;


use  Leit\Geo\GeoIpInterface;
use MaxMind\Db\Reader;

class MaxMindGeoService implements GeoIpInterface
{

    protected $reader;
    protected $data;


        public function __construct()
    {
        try
        {$this->reader = new \GeoIp2\Database\Reader(storage_path() . '/GeoIp/GeoLite2-country.mmdb');}
        catch(\Exception $exception){
            echo "Error!!!";
            exit;
        }


    }

    public function parse($ip)
    {

        $this->data = $this->reader->country($ip);
    }


    public function continentCode()
    {
        return $this->data->continent->code;
    }

    public function countryCode()
    {
        return $this->data->country->isoCode;
    }


}
