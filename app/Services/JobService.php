<?php

namespace App\Services;

use App\Models\Job;

/**
 * Class ShopDetailService
 * @package App\Services
 */
class JobService extends AbstractService
{
    public function __construct()
    {
        parent::__construct(Job::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getAllAsc()
    {
        return Job::query()
            ->orderBy('created_at', 'ASC')
            ->get();
    }
}
