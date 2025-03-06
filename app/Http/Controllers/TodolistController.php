<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodolistController extends Controller
{
    public function index(Request $request){
        $todolist = Todolist::when($request->category, function($query) use($request){
            $query->where('category_id', $request->category);
        })->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $todolist,
        ], 200);

    }
    public function edit($id){
        $todolist = Todolist::FindOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $todolist,
        ], 200);

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
                'category_id' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'level_kegiatan' => 'required',
                'tanggal_deadline' => 'required'
            ],[
                'category_id.required' => 'Kategori Wajib Dipilih',
                'judul.required' => 'Judul Kegiatan Wajib Diisi',
                'deskripsi.required' => 'Deskripsi Kegiatan Wajib Diisi',
                'level_kegiatan.required' => 'Level Kegiatan Wajib Dipilih',
                'tanggal_deadline.required' => 'Tanggal Deadline Wajib Dipilih',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

        $data = [
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'level_kegiatan' => $request->level_kegiatan,
            'tanggal_deadline' => $request->tanggal_deadline
        ];
        
        $todolist = Todolist::create($data);
        
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $todolist,
        ], 200);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'level_kegiatan' => 'required',
            'tanggal_deadline' => 'required'
        ],[
            'category_id.required' => 'Kategori Wajib Dipilih',
            'judul.required' => 'Judul Kegiatan Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Kegiatan Wajib Diisi',
            'level_kegiatan.required' => 'Level Kegiatan Wajib Dipilih',
            'tanggal_deadline.required' => 'Tanggal Deadline Wajib Dipilih',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $todolist = Todolist::where('id', $id)->first();
        $data = [
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'level_kegiatan' => $request->level_kegiatan,
            'tanggal_deadline' => $request->tanggal_deadline
        ];
        
        $todolist->update($data);

        return response()->json([
            'success' => 'true',
            'message' => 'Data berhasil diubah',
            'data' => $todolist,
        ], 200);
    }
    public function destroy(Request $request, $id){
        $todolist = Todolist::destroy($id);
        
        return response()->json([
            'success' => 'true',
            'message' => 'Data berhasil terhapus',
        ], 200);
    }
    public function set_status(Request $request, $id){
        $todolist = Todolist::findOrFail($id);

        $data = [
            'status' => $request->status
        ];

        $todolist->update($data);
        return response()->json([
            'success' => 'true',
            'message' => 'Status berhasil diubah',
            'data' => $todolist
        ]);
    }
}
