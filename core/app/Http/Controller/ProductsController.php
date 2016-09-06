<?php namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Request;
use App\Invoicer\Repositories\Contracts\ProductInterface as Product;

class ProductsController extends Controller {

    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->product->all();
        return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

    /**
     * Store a newly created resource in storage.
     * @param ProductFormRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(ProductFormRequest $request)
	{
        $data = array(
                    'code'      => Request::get('code'),
                    'name'      => Request::get('name'),
                    'category'  => Request::get('category'),
                    'description'=> Request::get('description'),
                    'price'      => Request::get('price'),
        );

		if($this->product->create($data)){
            flash()->success('Product has been added');
            return response()->json(array('success'=>true, 'msg' => 'expense updated'), 201);
        }
        return response()->json(array('success'=>false, 'msg' => 'product not added'), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $product = $this->product->getById($id);
		return view('products.edit', compact('product'));
	}

    /**
     * Update the specified resource in storage.
     * @param ProductFormRequest $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(ProductFormRequest $request, $id)
	{
        $data = array(
            'code'      => Request::get('code'),
            'name'      => Request::get('name'),
            'category'  => Request::get('category'),
            'description'=> Request::get('description'),
            'price'      => Request::get('price'),
        );
		if($this->product->updateById($id,$data)){
            flash()->success('Product has been updated');
            return response()->json(array('success'=>true, 'msg' => 'product updated'), 201);
        }
        return response()->json(array('success'=>false, 'msg' => 'product not updated'), 422);
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->product->deleteById($id))
            flash()->success('Product deleted');
        else
            flash()->error('Product delete failed');

        return redirect('products');
	}

    /**
     * @return \Illuminate\View\View
     */

    public function products_modal(){
        $products = $this->product->all();
        return view('products.products_modal', compact('products'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function process_products_selections(){
        $selected = \Request::get('products_lookup_ids');
        $products = $this->product->whereIn('uuid', $selected)->get();
        return response()->json(array('success'=>true, 'products' => $products), 200);
    }

}
