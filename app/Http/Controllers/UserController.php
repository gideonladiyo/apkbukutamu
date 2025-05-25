<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexAdmin()
    {
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }
        return view('admin.admin.index');
    }
    public function indexPetugas()
    {
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }
        return view('admin.petugas.index');
    }

    public function dataAdmin()
    {
        # code...
        $item = User::where("role", "ADMIN")->orderBy('id', 'desc')->get();

        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('aksi', function ($item) {
                return '
            <div class="btn-groub">
            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1 editIcon" id="' . $item->id . '" data-toggle="modal" data-target=".editRowModal"><i class="fa fa-pencil"></i></a>
            <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '"><i class="fa fa-trash"></i></a>
            </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function dataPetugas()
    {
        # code...
        $item = User::where("role", "PETUGAS")->orderBy('id', 'desc')->get();

        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('aksi', function ($item) {
                return '
            <div class="btn-groub">
            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1 editIcon" id="' . $item->id . '" data-toggle="modal" data-target=".editRowModal"><i class="fa fa-pencil"></i></a>
            <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '"><i class="fa fa-trash"></i></a>
            </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:tb_user'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = new User();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->role = $request->role;
            $data->password = Hash::make($request['password']);
            $data->save();

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => $th
            ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = User::find($id);

        return response()->json($emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $emp = User::find($request->emp_id);
        $empData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        User::destroy($id);
    }
}
