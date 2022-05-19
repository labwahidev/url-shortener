<?php
namespace App\Services\Url;

use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use App\Services\ResService;

class UrlService{
    public function __construct(ResService $ress){
        $this->ress = $ress;
    }

    public function list(){
        try {
            $data = Url::where('userid', Auth::id())->get();
            return  $this->ress->successRess('success', 'Succes Get Data', $data);
        }
        catch (Exception $error){
            return  $this->ress->errorRess('error', 'Failed To Get Data');
        }
    }

    public function store($request){
        try {
            $userId      = Auth::id();
            $name        = $request->name;
            $shortUrl    = $request->shorturl;
            $originalUrl = $request->originalurl;
            $expiredAt   = $request->expiredat;

            $data = new Url;
            $data->userid       = $userId;
            $data->name         = $name;
            $data->short_url    = $shortUrl;
            $data->original_url = $originalUrl;
            $data->deleted_at   = 0;
            $data->expired_at   = $expiredAt;
            $data->save();
            return  $this->ress->successRess('success', 'Succes To Store Data', $data);
        }
        catch (Exception $error){
            return  $this->ress->errorRess('error', 'Failed To Store Data');
        }
    }
}
