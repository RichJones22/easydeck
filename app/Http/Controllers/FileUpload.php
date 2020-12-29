<?php

namespace App\Http\Controllers;

use App\Models\card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\UploadedFile;

class FileUpload extends Controller
{

    public CONST SUB_DIR = 'images';  // images dir off of the /public dir...

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();

        $this->storeImage($image, $imageName);

        return response(['success'=>$image->getClientOriginalName()]);
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
    }

    /**
     * @param UploadedFile|null $image
     * @param string $imageName
     */
    protected function storeImage(?UploadedFile $image, string $imageName): void
    {
        $this->moveImageToFileSystem($image, $imageName);

        $this->addCard($imageName);
    }

    /**
     * @param UploadedFile|null $image
     * @param string $imageName
     */
    protected function moveImageToFileSystem(?UploadedFile $image, string $imageName): void
    {
        $image->move(public_path(FileUpload::SUB_DIR), $imageName);
    }

    /**
     * @param string $imageName
     */
    protected function addCard(string $imageName): void
    {
        /**
         * if card() does not exist, create it...
         *
         * we can download the same image more than once
         */
        if (!$this->doesImageExist($imageName)) {
            (new card())
                ->setAttribute('file_name', $imageName)
                ->setAttribute('file_location', public_path(FileUpload::SUB_DIR))
                ->save();
        }
    }

    /**
     * @param string $imageName
     * @return bool
     */
    protected function doesImageExist(string $imageName): bool
    {
        return DB::table('cards')
                ->where('file_name', $imageName)
                ->count(('file_name')) > 0;
    }

}
