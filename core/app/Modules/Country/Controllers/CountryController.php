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
        private Country         $model = new Country()
    )
    {
    }

    public function index()
    {
        $data['pageTitle'] = __($this->moduleName . '.list_countries');
        $data['breadcrumb'] = [
            $this->moduleName => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
        $data['rows'] = $this->model->latest()->paginate(request('per_page') ?? env('DEFAULT_PER_PAGE'));
        return view($this->moduleParent . '.' . $this->moduleName . '.index', $data);
    }

    public function show()
    {
        dd('show country');
    }

    public function getCreate()
    {
        $data['pageTitle'] = __($this->moduleName . '.create_new_country');
        $data['breadcrumb'] = [
            $this->moduleName => route($this->moduleName . '.index'),
            __($this->moduleName . '.create_new_country') => null
        ];
        $data['moduleName'] = str($this->moduleName)->upper();
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
