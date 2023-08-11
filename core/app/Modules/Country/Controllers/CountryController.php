<?php

namespace App\Modules\Country\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Country\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(
        private readonly string $moduleParent = 'admin',
        private readonly string $moduleName = BaseAppEnums::COUNTRY_MODULE_PREFIX,
        private Country $model = new Country()
    )
    {
    }

    public function index()
    {
        $data['pageTitle'] = trans(BaseAppEnums::COUNTRY_MODULE_PREFIX . '.list_countries');
        $data['rows'] = $this->model->latest()->paginate(request('per_page') ?? env('DEFAULT_PER_PAGE'));
        return view($this->moduleParent . '.' . $this->moduleName . '.index', $data);
    }

    public function show()
    {
        dd('show country');
    }

    public function getCreate()
    {
        $data['pageTitle'] = trans(BaseAppEnums::COUNTRY_MODULE_PREFIX . '.create_new_country');
        $data['row'] = $this->model;
        return view($this->moduleParent . '.' . $this->moduleName . '.create', $data);

    }

    public function postCreate(Request $request)
    {
        $data['toastr'] = [
            'type' => BaseAppEnums::SUCCESS,
            'message' => 'message',
            'title' => 'title'
        ];
        dd($request->all());
    }

    public function getEdit()
    {

    }

    public function postUpdate()
    {

    }

    public function delete()
    {

    }
}
