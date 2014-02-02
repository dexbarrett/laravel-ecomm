<?php
class Product extends Eloquent
{
    protected $fillable = array(
                           'category_id', 'title', 'description', 'price',
                           'availability', 'image' 
                          );

    public static $rules = array(
        'category_id'  => 'required|integer',
        'title'        => 'required|min:2',
        'description'  => 'required|min:20',
        'price'        => 'required|numeric',
        'availability' => 'integer',
        'image'        => 'required|image'
    );

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function getInStock()
    {
        return ($this->availability == 1)? 'In Stock': 'Out of Stock';
    }

    public function getInStockClass()
    {
        return strtolower(str_replace(' ', '', $this->getInStock()));
    }
}