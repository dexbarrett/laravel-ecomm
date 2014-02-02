<?php
class ProductsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }
    
    public function getIndex()
    {
        $categories = Category::lists('name', 'id');

        return View::make('products.index')
               ->with('products', Product::all())
               ->with(compact('categories'));
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), Product::$rules);

        if ($validator->fails()) {

            return Redirect::to('admin/products/index')
            ->with('message', 'Couldn\'t create product')
            ->withErrors($validator)
            ->withInput();
        }


        $product = new Product;
        $product->category_id = Input::get('category_id');
        $product->title       = Input::get('title');
        $product->description = Input::get('description');
        $product->price       = Input::get('price');
        $image    = Input::file('image');
        $filename    = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path() . '/img/products';
        
     
        $product->image = 'img/products/' . $filename;
        Image::make($image->getRealPath())
               ->resize(468, 249)
               ->save($destination .'/'. $filename);

        $category = Category::find(Input::get('category_id'));
        $category->products()->save($product);

        return Redirect::to('admin/products/index')
            ->with('message', 'Product Created');

    }

    public function postDestroy()
    { 
        $product = Product::find(Input::get('id'));

        if ($product) {
            File::delete($product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                ->with('message', 'Product Deleted');
        }

        return Redirect::to('admin/products/index')
            ->with('message', 'There was an error while trying to delete the product');
    }

    public function postToggleAvailability()
    {
        $product = Product::find(Input::get('id'));

        if ($product) {
            $product->availability = Input::get('availability');
            $product->save();

            return Redirect::to('admin/products/index')
                ->with('message', 'Product Updated');
        }

        return Redirect::to('admin/products/index')
            ->with('message', 'Invalid product');
    }
}