<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Interfaces\ItemRepositoryInterface;
use Illuminate\Http\Response;

class ItemController extends ApiController
{

    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       return $this->itemRepository->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       return $this->itemRepository->get($id);
    }

}
