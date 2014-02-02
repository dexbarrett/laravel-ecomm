<?php
class StoreController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getIndex()
    {
        return View::make('store.index')
            ->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
    }

    public function getView($id)
    {
        return View::make('store.view')
            ->with('product', Product::find($id));
    }

    public function getCategory($catID)
    {
        return View::make('store.category')
            ->with('products', Product::where('category_id', '=', $catID)->paginate(6))
            ->with('category', Category::find($catID));
    }

    public function getSearch()
    {
        $keyword = Input::get('keyword');

        return View::make('store.search')
            ->with('products', Product::where('title', 'LIKE', '%' . $keyword . '%')->get())
            ->with('keyword', $keyword);
    }
}