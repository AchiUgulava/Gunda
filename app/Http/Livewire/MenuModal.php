<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Modal;
use App\Models\Product;

class MenuModal extends Modal
{
    public $productId = '';
    protected $listeners = [
        'show' => 'showProduct'
    ];

    public function showProduct($id)
    {
        $this->show = true;
        $this->productId = $id;
    }
    public function render()
    {
        return view('livewire.menu-modal',[
            "product"=>Product::find($this->productId)
        ]);
    }
}
