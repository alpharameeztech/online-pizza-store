<?php

namespace App\Repositories\Interfaces;

interface ItemRepositoryInterface
{
    // get specific resource
    public function get($id);

    // get all the resources
    public function all();
}
