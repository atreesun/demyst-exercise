<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use XeroAPI\XeroPHP;

class XeroController extends Controller
{
    public function BalanceSheet()
    {
        //TODO Implement caching, i.e. return Cache::remember('XeroBalanceSheet', 3600, function () {...});
        // Assume that the authentication with Xero is already done.
        $apiInstance = new XeroPHP\Api\AccountingApi(
            new \GuzzleHttp\Client(),
            XeroPHP\Configuration::getDefaultConfiguration()->setHostAccounting(env("XERO_API_URL"))
        );

        $result = $apiInstance->getReportBalanceSheet(env("XERO_TENANT_ID"));

        return response()->json(XeroPHP\AccountingObjectSerializer::sanitizeForSerialization($result));
    }
}
