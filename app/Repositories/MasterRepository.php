<?php

namespace App\Repositories;

use App\Models\Master;
use App\Repositories\Interfaces\MasterRepositoryInterface;

class MasterRepository extends BaseRepository implements MasterRepositoryInterface
{
    /**
     * Initialize the repository model
     *
     * @return string
     */
    public function model()
    {
        return Master::class;
    }
}
