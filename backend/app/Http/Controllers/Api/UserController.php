<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function getMyInfo(Request $request)
    {
        $user = DB::table('users')->where('id', 1)->first();

        return response()->json(['data' => $user]);
    }

    public function getAllUsers(Request $request)
    {
        $users = DB::table('users')->where('state', '=',1)->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }

    public function createUser(Request $request)
    {
        $data = $request->all();

        $users = DB::table('users');

        //find account_id
        if(isset($request->account_id)){
            $user = $users->where('account_id', $request->account_id);
        }
        //find name
        if(isset($request->name)){
            $user = $users->where('name', $request->name);
        }
        //find id
        if(isset($request->id)){
            $user = $users->where('id', $request->id);
        }
        //find email
        if(isset($request->email)){
            $user = $users->where('email', $request->email);
        }

        $user = $user->get();

        try {
            $user = $user->create($data);

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'Tạo người dùng thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể tạo người dùng',
            ]);
        }
    }

    public function findUser(Request $request)
    {
        $users = DB::table('users');
        //find account_id
        if(isset($request->account_id)){
            $user = $users->where('account_id', $request->account_id);
        }
        //find name
        if(isset($request->name)){
            $user = $users->where('name', $request->name);
        }
        //find id
        if(isset($request->id)){
            $user = $users->where('id', $request->id);
        }
        //find email
        if(isset($request->email)){
            $user = $users->where('email', $request->email);
        }

        $user = $user->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Tìm người dùng thành công',
        ]);
    }

    public function updateUser(Request $request)
    {
        $data = $request->all();

        $users = DB::table('users');

        //find account_id
        if(isset($request->account_id)){
            $user = $users->where('account_id', $request->account_id);
        }
        //find name
        if(isset($request->name)){
            $user = $users->where('name', $request->name);
        }
        //find id
        if(isset($request->id)){
            $user = $users->where('id', $request->id);
        }
        //find email
        if(isset($request->email)){
            $user = $users->where('email', $request->email);
        }

        $user = $user->get();

        try {
            $user = $user->update($data);

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'Cập nhật người dùng thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể cập nhật người dùng',
            ]);
        }
    }

    public function deleteUser(Request $request)
    {
        $data = $request->all();

        $users = DB::table('users');

        //find account_id
        if(isset($request->account_id)){
            $user = $users->where('account_id', $request->account_id);
        }
        //find name
        if(isset($request->name)){
            $user = $users->where('name', $request->name);
        }
        //find id
        if(isset($request->id)){
            $user = $users->where('id', $request->id);
        }
        //find email
        if(isset($request->email)){
            $user = $users->where('email', $request->email);
        }

        $user = $user->get();

        try {
            $user = $user->update($data);

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'Xoá người dùng thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xoá người dùng',
            ]);
        }
    }
}
