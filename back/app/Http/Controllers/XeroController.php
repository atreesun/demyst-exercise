<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use XeroAPI\XeroPHP;

class XeroController extends Controller
{
    public function BalanceSheet()
    {
        return Cache::remember('XeroBalanceSheet', env("XERO_API_CACHE_TTL"), function () {
            $apiInstance = new XeroPHP\Api\AccountingApi(
                new \GuzzleHttp\Client(),
                XeroPHP\Configuration::getDefaultConfiguration()->setHostAccounting(env("XERO_API_URL"))
            );

            $result = $apiInstance->getReportBalanceSheet(env("XERO_TENANT_ID"));

            return response()->json(XeroPHP\AccountingObjectSerializer::sanitizeForSerialization($result));
        });
    }
}
