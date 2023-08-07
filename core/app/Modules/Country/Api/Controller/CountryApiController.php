<?php

namespace App\Modules\Country\Api\Controllers;

use App\Modules\BaseApp\Api\BaseApiController;
use Illuminate\Http\Request;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class CountryApiController extends BaseApiController
{
    public function __construct(
        private ParserInterface $parserInterface
    )
    {
    }

    public function index()
    {
        dd('list countries api');
    }

    public function stor(Request $request)
    {
        dump('store country api');
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        dd($data->name);
    }
}
