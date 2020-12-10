<?php

namespace Fir\Libraries;

class Basket
{
	
	protected $db;
	
    protected $storage;

    protected $product;

    public function __construct($db = null)
    {
		$this->db =  $db;
        $this->storage = new SessionStorage();
    }

    public function add($product)
    {

        $this->update($product);
    }

    public function update($product)
    {

        $this->storage->set($product, [
            'product_id' => $product,
        ]);
    }

    public function remove($product)
    {
        $this->storage->unset($product);
    }

    public function has($product)
    {
        return $this->storage->exists($product);
    }

    public function get($product)
    {
        return $this->storage->get($product);
    }

    public function clear()
    {
        $this->storage->clear();
    }

    public function all()
    {
        $ids = [];
        $items = [];

        foreach ($this->storage->all() as $product) {
            $ids[] = $product['product_id'];
        }

        foreach ($ids as $id) {
            $query = $this->db->select("product", "*", ["productid" => $id]);
            foreach($query as $row){			
            $items[$row['productid']] = $row;
			}
        }

        return $items;

    }

    public function ids()
    {
        $ids = [];
        $items = [];

        foreach ($this->storage->all() as $product) {
            $ids[] = $product['product_id'];
        }

        return $ids;

    }

    public function itemCount()
    {
        return $this->storage->count();
    }

    public function subTotal()
    {
        $total = 0;

        foreach ($this->all() as $item) {

            $total = $total + $item['price'];
        }

        return $total;
    }

    public function refresh()
    {
        foreach ($this->all() as $item) {
            if (!$item->hasStock($item->quantity)) {
                $this->update($item, $item->stock);
            }
        }
    }
}