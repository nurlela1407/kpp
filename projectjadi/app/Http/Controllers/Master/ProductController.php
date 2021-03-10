<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Model\Master\Product;
use Illuminate\Support\Facades\Validator;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $products = DB::table('products')->get();
        return view('Product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        DB::table('products')->insert([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'elektronika_id' => $request->elektronika_id,
            'is_ready' => $request->is_ready,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'gambar' => $request->gambar,
            'stock_available' => $request->stock_available,
            'stock_total' => $request->stock_total,
        ]);
        
        
        /*if($validator->fails()){
            Toastr::warning('Product code or Product name cannot be repeated.', 'Warning');
            return Redict::back()->withErrors($validator)->withInput();
        }
        
        else{
            $data = new Product();
            $data->nama = $request->name;
            $data->harga = $request->harga;
            $data->stock_available = $request->stockAvailable;
            $data->stock_total = $request->stock_total;
            $data->elektronika_id = $request->elektronika_id;
            $data->jenis = $request->jenis;
            $data->berat = $request->berat;
            $data->gambar = $request->gambar;
            $data->user_modified = $request->user()->id;

            if($data->save()){
                Toastr::success('Product created Successfully', 'Success');
                return redirect()->route('product.index');
            }
            else{
                Toastr::error('Product created Successfully', 'Error');
                return redirect()->back();
            }
        }
        */
        
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Product::find($id);
        $data->is_ready = 2;
        $dta->user_modified= Auth::user()->id;
        if ($data->save()){
            Toastr::success('Product Deleted Succesfully', 'Succes');
            return new JsonResponse(["status"=>true]);

        }else{
            Toastr::error('Producr cannot be Deleted Succesfully', 'error');
            return new JsonResponse(["status"=>false]);

        }
    }

    public function datatable()
    {
        $data = Product::where('is_ready', '!=', 2);
        return Datatables::of($data)
            ->addColumn('action', function($data){
                $url_edit = url('master/product/'.$data->id.'/edit');
                $url = url('master/product/'.$data->id);
                $undoTrash = url('product/undoTrash/'.$data->id);
                $url_history = url('master/product/history/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>";
                $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
                $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>";
                $history = "<a class='btn btn-action btn-warning' href='".$url_history."' title='History'data-toggle='modal' data-target='#modal-default'>Purchase Detail</a>";

                return $view."".$edit."".$delete."".$history;
            })
            ->editColumn('purchase_price', function($data){
                return number_format($data->purchase_price, O, '.', '.');
            })
            ->editColumn('selling_price', function($data){
                return number_format($data->selling_price, O, '.', '.');
            })
            ->editColumn('information', function($data){
                $string_replace = str_ireplace("\r\n", '.', $data->information);
                return str::limit($string_replace, 30, '...');
            })
            ->rawColumns(['action'])
            ->editColumn('id', 'ID:{{$id}}')
            ->make(true);
    }

    public function undoTrash(Request $request, $id){
    $data = Product::find($id);

    $data->is_ready = 1;

    $data->user_modified= Auth::user()->id;
    if ($data->save()){
        Toastr::success('Product has been activated succesfully', 'Success');
        return new JsonResponse(["status"=>true]);

    }else{
        Toastr::error('Product cannot be activated succesfully', 'Error');
        return new JsonResponse(["status"=>false]);
    }
}


    public function datatable_product(){
        $data = Product::select('products.*')->where('products.is_ready', '!=', 2);

        return Datatables::of($data)->make(true);
    }

    public function history($id){
        $datas = PurchaseD::with(['purchase'])->where('id_product', $id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('Product.history', ['data'=>$data]);
    }
}