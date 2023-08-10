<?php

namespace App\Modules\Country\Repositories;

use App\Modules\Country\Country;

class CountryRepository
{
    public function __construct(private $model = null)
    {
        if ($model instanceof Country) {
            $this->model = $model;
        } else {
            $this->model = new Country();
        }
    }

    public function list($pagination = false)
    {
        $query = $this->model->latest();
        if ($pagination) {
            return $query->paginate(env('DEFAULT_PER_PAGE') ?? 10);
        }
        return $query->get();
    }

    public function create($data)
    {
        $this->model->create($data);
    }
}
