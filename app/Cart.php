<?php


namespace App;


class Cart
{
    public $items;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = [
            'quantity' => 0,
            'price' => $item->unit_price,
            'item' => $item,
            'image' => $item->images,
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->unit_price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->unit_price;
    }

    public function delete($id)
    {
        if ($this->items) {
            $productsIntoCart = $this->items;
            if (array_key_exists($id, $productsIntoCart)) {
                $priceProductRemove = $productsIntoCart[$id]['price'];
                $this->totalPrice -= $priceProductRemove;

                $this->totalQuantity -= $productsIntoCart[$id]['quantity'];
                unset($productsIntoCart[$id]);
                $this->items = $productsIntoCart;
//                dd($this->items);
            }
        } else {
            $this->totalQuantity = 0;
        }
    }

    public function reduceOne($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['quantity'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function increaseOne($id)
    {
        $this->items[$id]['quantity']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQuantity++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }

}
