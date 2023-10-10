<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Ambil input judul dan isi
        $input = $request->only(['judul','isi']);
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ]);
        //Tambahkan kedalam database sesuai dengan input yang diambil
        Post::create($input);
        return redirect()->to('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $input = $request->only(['judul','isi']);
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ]);
        $post = Post::find($id);
        $post->judul = $input['judul'];
        $post->isi = $input['isi'];
        $post->update();
        /**
         * Cara yang lain
         * note: Cara dibawah sebenarnya langsung bisa dimasukkan var $input
         * Ini dilakukan untuk tidak membingungkan dan lebih beginner friendly
         */
//        $post = Post::find($id)->update([
//            'judul'=>$input['judul'],
//            'isi'=>$input['isi'],
//        ]);
//        $post->update();

        return redirect()->to('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->to('dashboard');
    }
}
