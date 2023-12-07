<?php

namespace App\Services;

use App\Models\Master;
use App\Repositories\MasterRepository;

class MasterService
{
    /**
     * @var MasterRepository
     */
    protected $masterRepository;

    /**
     * MasterService constructor.
     */
    public function __construct(
        MasterRepository $masterRepository,
    ) {
        $this->masterRepository = $masterRepository;
    }

    /**
     * Get all masters from DB
     *
     * @param  array  $request
     */
    public function findAll()
    {
        return $this->masterRepository->all();
    }

    /**
     * Get specified master from DB
     *
     * @param  number  $id
     */
    public function find($id)
    {
        return $this->masterRepository->find($id);
    }

    /**
     * Store master data to DB
     *
     * @param  array  $request
     */
    public function store($request)
    {
        return $this->masterRepository->create($request);
    }

    /**
     * Update specified master data to DB
     *
     * @param  int  $id
     * @param  array  $request
     */
    public function update($id, $request)
    {
        $result = $this->masterRepository->update($id, $request);
        if (! $result) {
            abort(404);
        }

        return true;
    }

    /**
     * Delete specified master from DB
     *
     * @param  int  $id
     */
    public function delete($id)
    {
        $result = $this->masterRepository->delete($id);
        if (! $result) {
            abort(404);
        }

        return true;
    }
}
