<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ItemRepositoryInterface;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the pizzas.
     *
     * @return Response
     */
    public function index()
    {
        $pizzas = $this->itemRepository->all();
        return view('guest', [
            'pizzas' => $pizzas['data']
        ]);
    }

}
