<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){

            $data = new User;
            $data = $data->latest();

            return DataTables::of($data)
            ->addColumn('no',function($data){
               return 'ini nomor';
           })
            ->addColumn('photo',function($data){
             return '<img src="' . asset('storage/photo-user/' . ($data->image ? $data->image : 'default-user.png')) . '" width="100">';

         })
            ->addColumn('nama',function($data){
             return $data->name;
         })
            ->addColumn('email',function($data){
             return $data->email;
         })
            ->addColumn('phone_number',function($data){
             return $data->phone_number;
         })
            ->addColumn('action',function($data){
             return '<a href="'.route('v2.employee.edit',['id' => $data->id]).'" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
             <a data-toggle="modal" data-target="#modal-hapus'.$data->id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
         })
            ->rawColumns(['photo','action'])
            ->make(true);
        }

        return view('datatable.serverside',compact('request'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'phone_number' => 'required',
            'name'  => 'required',
            'password' => 'required',
        ]);

        switch ($request->role) {
            case 'Root':
            $role = 'root';
            break;
            case 'Admin':
            $role = 'admin';
            break;
            case 'Employee':
            $role = 'employee';
            break;
            
            default:
            $role = 'guest';
            break;
        }


        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        $photo      = $request->file('photo');
        $filename   = date('Y-m-d') . $photo->getClientOriginalName();
        $path       = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));


        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['phone_number']       = $request->phone_number;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;

        $user = User::create($data);

        $user->assignRole($role);

        return redirect()->route('v2.employee');
    }
}
