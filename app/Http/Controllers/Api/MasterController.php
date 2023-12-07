<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreMasterRequest;
use App\Http\Requests\Api\UpdateMasterRequest;
use App\Services\MasterService;

class MasterController extends Controller
{
    /**
     * MasterController constructor.
     *
     * @param  MasterService  $masterService
     */
    protected $masterService;

    public function __construct(
        MasterService $masterService,
    ) {
        $this->masterService = $masterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = $this->masterService->findAll();

        return apiSuccess($masters);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = $this->masterService->find($id);

        return apiSuccess($master);
    }

    /**
     * Store a newly created resource in storage
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterRequest $request)
    {
        $this->masterService->store($request->validated());

        return apiSuccess('Create master success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateMasterRequest $request)
    {
        $this->masterService->update($id, $request->validated());

        return apiSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->masterService->delete($id);

        return apiSuccess();
    }
}
