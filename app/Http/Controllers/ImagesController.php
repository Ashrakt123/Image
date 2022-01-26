<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $images=Image::all();
      return view('images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>'required|min:3',
            "image"=>'sometimes|image|mimes:jpg,jpeg,bmp,png|unique:Images',

        ]);
       $images= $request->except('image');
       $image= $request->file('image');
       if($request->hasFile('image')){
           $filename=time().".".$image->getClientOriginalName();
           $images['image']= $image->storeAs('Images',$filename,'uploads');
       }
       Image::create($images);
       return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images =Image::findOrFail($id);
        return view('images.edit',compact('images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            "name"=>'required|min:3',
            "image"=>'image|mimes:jpg,jpeg,bmp,png|unique:Images',

        ]);
       $images= $request->except('image');
       $file= $request->file('image');
       if($request->hasFile('image') && $file->isValid()){
           $filename=time().".".$file->getClientOriginalName();
           $images['image']= $file->storeAs('Images',$filename,'uploads');
       }
       if(isset($image->image) && isset($images['image'])){
        Storage::disk('uploads')->delete($image->image);
    }
       $image->update($images);
       
       return redirect()->route('images.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images =Image::findOrFail($id);
        if(isset($images->image)){
            Storage::disk('uploads')->delete($images->image);
        }
        $images->delete();
       
        return redirect()->route('images.index');
    }
}
