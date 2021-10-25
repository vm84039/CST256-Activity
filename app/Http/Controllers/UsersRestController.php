<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\DTO;
use App\Services\Business\SecurityService;
use App\Models\UserModel;
use function GuzzleHttp\json_encode;


class UsersRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SS = new SecurityService();
        
        $dto = new DTO();
        $dto->setData($SS->getAllUsers());
        $rest = $dto->jsonSerialize();
        return $rest;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SS = new SecurityService();
        $dto = new DTO();
        $dto->setData($SS->getUser($id));
        $rest = $dto.json_encode($dto->getData());
        return $rest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
