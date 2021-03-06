<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Model\Master\Vendor;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = DB::table('vendors')->get();
        return view('Vendor.index', ['vendors' => $vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('vendors')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'cp' => $request->contactPerson,
            'phone' => $request->phone,
            'active'=>$request->status,
            'user_modified' => Auth::user()->id

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vendor::with(['user_modify'])->where('id', $id)->get();
        if($data->count() > O){
            return view('vendor.view', compact('data'));
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
        $data = Vendor::where('id', $id)->where('active', '!=', 2)->get();
        if($data->count() > O){
            return view('vendor.update', compact('data'));
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
        
        


        if($data->save())
        {
            Toastr::success('Vendor Update Successfully', 'Success');
            return redirect()->route('Vendor.index'); 
        }
        else
        {
            Toastr::error('Vendor cannot be Update Successfully', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vendor::find($id);
        $data->active = 2;
        $data->user_modified= Auth::user()->id;
        if ($data->save())
        {
            Toastr::success('Vendor Deleted Successfully', 'Success');
            return new JsonResponse(["status"=>true]);
        }
        else
        {
            Toastr::error('Vendor cannot be Deleted Successfully', 'Error');
            return new JsonResponse(["status"=>false]);
        }
    }

    public function datatable()
    {
        $data = Vendor::where('active', '!=', 2);
        return Datatables::of($data)
            ->addColumn('action', function($data){
                $url_edit = url('master/vendor/'.$data->id.'/edit');
                $url = url('master/vendor/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>";
                $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
                $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>";

                return $view."".$edit."".$delete;
            })
            ->editColumn('address', function($data){
                return str_ireplace("\r\n", ',', $data->address);
            })
            ->editColumn('phone', function($data){
                return str_ireplace("\r\n", ',', $data->phone);
            })
            ->rawColumns(['action'])
            ->editColumn('id', 'ID:{{$id}}')
            ->make(true);
    }

public function datatable_vendor(){
    $data = Vendor::select('vendors.*')->where('vendors.active', '!=', '2');

    return Datatables::of($data)
        ->editColumn('address', function($data){
            return str_ireplace("\r\n", ',', $data->address);
        })
        ->make(true);
    }
}
   

