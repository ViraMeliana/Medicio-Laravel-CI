<?php

namespace App\Http\Controllers\Api;

use App\AccountRest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountApiController extends Controller
{

    public function index()
    {
        return new AccountResource(AccountRest::all());
    }

    public function store(Request $request)
    {
        $Account = AccountRest::create($request->all());

        return (new AccountResource($Account))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountRest $Account)
    {
        return new AccountResource($Account);
    }

    public function update(Request $request, AccountRest $Account)
    {
        $Account->update($request->all());

        return (new AccountResource($Account))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountRest $Account)
    {
        $Account->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
