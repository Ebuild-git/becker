<?php

namespace App\Repositories;
use App\Models\produits;
use Illuminate\Http\Request;

class ProduitRepository
{
    
    public function search($n, $search)
{
    return $this->queryActiveOrderByDate()
                ->where(function ($q) use ($search) {
                    $q->where('description', 'like', "%$search%")
                      ->orWhere('nom', 'like', "%$search%")
                      ->orWhere('reference', 'like', "%$search%");
                })->paginate($n);
}
}
