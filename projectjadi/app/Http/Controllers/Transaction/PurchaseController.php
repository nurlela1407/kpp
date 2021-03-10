<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Model\Purchase\PurchaseD;
use App\Models\Model\Purchase\PurchaseH;
use Illuminate\Http\Request;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Auth;
use App\Modo;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = "0";
        $startDate = "01". "-".date('m-Y');
        $endDate = date('d-m-Y');
        $mode = 'all';

        if( ( isset($_GET["startDate"])) && (($_GET["startDate"]) !== '') ){
            $startDate = $_GET["startDate"];
        }

        if( ( isset($_GET["endDate"])) && (($_GET["endDate"]) !== '') ){
            $endDate = $_GET["endDate"];
        }

        if( ( isset($_GET["status"])) && (($_GET["status"]) !== '') ){
            $status = $_GET["status"];
        }

        if (!isset($_GET["mode"])){
            $mode = "limited";
        }
        return view('Transaction.Purchase.index', compact('startDate','endDate', 'status', 'mode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail_count = 0;
        return view('Transaction.Purchase.create', compact('detail_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PurchaseH();
        $data->date = date('Y-m-d', strtotime($request->date));
        $data->no_invoice = $request->invoice_no;
        $data->id_ven = $request->id_ven;
        $data->information = $request->information;
        $data->status = 'order'; 
        $data->active = 1;
        $data->user_modified = Auth::user()->id;
        $total = 0;
        if($data->save())
        {
            $id_purchase = $data->id;
            if(isset($_POST['id_raw_product']))
            {
                foreach ($_POST['id_raw_product'] as $key=>$id_raw_product):
                    $detail = new PurchaseD();
                    $detail->id_purchase = $data->id;
                    $detail->id_product = $id_raw_product;
                    $detail->total = $_POST['total'][$key];
                    $detail->price = $_POST['price'][$key];
                    $total = $total + ($detail->total * $detail->price);
                    $detail->save();
            
                endforeach;
            }

            $data = PurchaseH::find($id_purchase);
            $data->total = $total;
            $data->save();

           //Toastr::succes('Data saved Succesfully.', 'Success');
            return redirect()->route('purchase-order.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PurchaseH::with(['user_modify', 'vendor'])->where('id', $id)->get();
        if ($data->count()>0){
            $detail = PurchaseD::with('product')->where('id_purchase', '=', $data[0]->id)->orderBy('id', 'ASC');
            return view('Transaction.Purchase.view', compact('data', 'detail'));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail_count = 0;
        $data = PurchaseH::with('vendor')->where('id', $id)->where('active', '!=',  2)->get();
        
        //$data = PurchaseH::with(relations: 'vendor')->where(column: 'id', $id)->where(column: 'active', operator: '!=', value: 2)->get();
        if($data->count() > 0){
        $detail = PurchaseD::with('product')->where('id_purchase', '=', $data[0]->id)->orderBy('id', direction: 'ASC')->get();
          
        //$detail = PurchaseD::with(relations: 'products')->where(column: 'id_purchase', operation: '=', $data[0]->id)->orderBy(column: 'id', direction: 'ASC')->get();
        
        return view('Transaction.Purchase.update', compact('data', 'detail', 'detail_count'));
        }
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
        $data = PurchaseH::find($id);
        $data->date = date('Y-m-d', strtotime($request->date));
        $data->no_invoice = $request->invoice_no;
        $data->id_ven = $request->id_ven;
        $data->information = $request->information; 
        $data->user_modified = Auth::user()->id;
        $total = 0;
        if($data->save())
        {
            $delete=PurchaseD::where('id_product', '=', $id)->delete();
            if(isset($_POST['id_raw_product']))
            {
                foreach ($_POST['id_raw_product'] as $key=>$id_raw_product) :;
                    $detail = new PurchaseD();
                    $detail->id_purchase = $id;
                    $detail->id_product = $id_raw_product;
                    $detail->total = $_POST['total'][$key];
                    $detail->price = $_POST['price'][$key];
                    $total = $total + ($detail->total * $detail->price);
                    $detail->save();
            
                endforeach;
            }

            $data = PurchaseH::find($id);
            $data->total = $total;
            $data->save();

            Toastr::succes('Data saved Succesfully.', 'Success');
            return redirect()->route('purchase-order.index');
        }
            Toastr::error('Data Cannot be updated Succesfully.', 'Error');
            return redirect()->route('purchase-order.index');
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
        $data = PurchaseH::find($id);
        $data->active = 2;
        $dta->user_modified= Auth::user()->id;
        if ($data->save()){
            Toastr::success('Product Deleted Succesfully', 'Succes');
            return new JsonResponse(["status"=>true]);

        }else{
            Toastr::error('Producr cannot be Deleted Succesfully', 'error');
            return new JsonResponse(["status"=>false]);

        }
    }

    public function popup_media_vendor(){
        return view('Transaction.Purchase.view_vendor');
    }
    public function popup_media_product($id_count = null){
        return view('Transaction.Purchase.view_product')->with('id_count', $id_count);
    }

    public function datatable(){
        if (isset($_GET['status']) && $_GET['status']!=''){
            $status = $_GET['status'];

        }else{
            $status = 0;
        }

        $startDate = "01"."-".date('m-Y');
        $endDate = date('d-m-Y');
        $mode = "all";

        if (isset($_GET['startDate']) && ($_GET['startDate'] !="")){
            $startDate = $_GET['startDate'];
        }

        if (isset($_GET['endDate']) && ($_GET['endDate'] !="")){
            $endDate = $_GET['endDate'];
        }

        if (isset($_GET['mode'])){
            $mode = $_GET["mode"];

        }

        $startDateQuery = date('Y-m-d', strtotime($startDate));
        $endDateQuery = date('Y-m-d', strtotime($endDate));

        if($status == "0"){
            if ($mode == "all"){
                $data = PurchaseH::select('purchase_h.*', 'vendors.name')->leftJoin('vendors', 'purchase_h.id_ven', '=', 'vendors.id')->where('purchase_h.active', '!=','2');
            }
            if ($mode == "limited"){
                $data = PurchaseH::select('purchase_h.*', 'vendors.name')->leftJoin('vendors', 'purchase_h.id_ven', '=', 'vendors.id')->where('purchase_h.active', '!=','2')->whereBetween('purchase_h.date', [$startDateQuery,$endDAteQuery]);

        }

        }else{
            if ($mode == "all"){
                $data = PurchaseH::select('purchase_h.*', 'vendors.name')->leftJoin('vendors', 'purchase_h.id_ven', '=', 'vendors.id')->where('purchase_h.active', '!=','2')->where('purchase_h.status', '=', $status);
            }
            if ($mode == "limited"){
                $data = PurchaseH::select('purchase_h.*', 'vendors.name')->leftJoin('vendors', 'purchase_h.id_ven', '=', 'vendors.id')->where('purchase_h.active', '!=','2')->where('purchase_h.status', '=', $status)->whereBetween('purchase_h.date', [$startDateQuery,$endDAteQuery]);
            }
        }
        
    return Datatables::of($data)
        ->addColumn('action', function($data){
            $url_edit = url(path: 'transaction/purchase-order/'.$data->id.'/edit');
            $url = url(path: 'transaction/purchase-order/'.$data->id);
            $url_receive = url(path: 'transaction/purchase-order/receive/'.$data->id);
            $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>";
            $edit = "";
            $receive ="";
            $delete = "";

        if ($data->status =="order"){
            $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
            $receive = "<button data-url='".$url_receive."' onclick='received(this)' class='btn btn-action btn-outline-warning' title='Receive'>Receive</button>";
            $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>";
        
            return $view."".$edit.""."".$delete."".$receive;
        }else{
            return $view;
        }
        })

        ->editColumn('date', function($data){
            return date('d-m-Y', strtotime($data->date));

        })
        ->editColumn('total', function($data){
            return number_format($data->total, 0,  '.', ',');
        })
        ->make(true);
    }
    public function received(Request $request, $id){
        $dataH = PurchaseH::find($id);
        $data = PurchaseD::where('id_purchase', '=', $id)->orderBy('id', 'ASC')->get();

        foreach($data as $data){
            $detail = new Stock();
            $detail->id_product = $data->id_product;
            $detail->total = $data->total;
            $detail->information = $dataH->invoice_no;
            $detaik->type = 'buy';
            $detail->save();

            $detail = Product::find($data->id_product);
            $detail->harga = $data->harga;
            $detail->stock_total = $detail->stock_total + $data->total;

            $detail->save();

        }

        $data = PurchaseH::find($id);
        $data->status = 'received';
        $data->user_modified;

        if ($data->save()){
            Toastr::success('Data received Succesfully', 'Succes');
            return new JsonResponse(["status"=>true]);

        }else{
            Toastr::error('Data cannot be received Succesfully', 'error');
            return new JsonResponse(["status"=>false]);
    }
}

}