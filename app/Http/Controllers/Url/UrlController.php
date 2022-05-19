<?php
namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Services\Url\UrlService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends controller
{
    private $service;

    public function __construct(UrlService $service)
    {
        $this->service = $service;
    }

    public function list(){
            return $this->service->list();
    }

    public function store(Request $request){
        return $this->service->store($request);
    }

    public function update(Request $request){
        return $this->service->update($request);
    }

    public function delete(Request $request){
        return $this->service->delete($request);
    }

}
