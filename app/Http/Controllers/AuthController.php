<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, Response::HTTP_OK);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        // validation 1 
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|email',
        //     'password' => 'required|string|min:5',
        // ]);

        // validation 2 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $users = User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $users,
        ]);
    }

    public function upload($id, Request $request)
    {
        $user = User::find($id);
        $image_name = time() . '.' . $request->photo->extension();

        $path = public_path('images');
        if (!empty($user->photo) && file_exists($path . '/' . $user->photo)) {
            unlink($path . '/' . $user->photo);
        }

        $user->photo = $image_name;
        $user->save();

        $request->photo->move(public_path('images'), $image_name);
        return response()->json([
            'status' => true,
            'message' => ' gambar berhasil diupload',
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $users = User::find($request->id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diedit',
            'data' => $users,
        ]);
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'data berhasil dihapus',
                'data' => $user
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'data gagal dihapus'
            ]);
        }
    }
}
