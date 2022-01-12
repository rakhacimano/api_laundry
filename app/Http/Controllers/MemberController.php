<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;

class MemberController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'message' => $validator->errors(),
            ]);
        }

        $member = new Member();

        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->telp = $request->telp;
        $member->save();

        $data = Member::where('id_member', '=', $member->id_member)->first();

        return response()->json([
            'success' => 'true',
            'message' => 'Data Member Berhasil Ditambahkan!',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'message' => $validator->errors(),
            ]);
        }

        $data = Member::where('id_member', $id)->first();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->telp = $request->telp;
        $data->save();

        return response()->json([
            'success' => 'true',
            'message' => 'Data Member Berhasil Disunting',
        ]);
    }

    public function delete($id)
    {
        $delete = Member::where('id_member', $id)->delete();

        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data Member Berhasil Dihapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Outlet Gagal Dihapus'
            ]);
        }
    }

    public function getAll($limit = NULL, $offset = NULL)
    {
        $data['count'] = Member::count();

        if ($limit == NULL && $offset == NULL) {
            $data['member'] = Member::get();
        } else {
            $data['member'] = Member::take($limit)->skip($offset)->get();
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getById($id)
    {
        $data['member'] = Member::where('id_member', $id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
