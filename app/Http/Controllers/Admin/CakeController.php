<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $cakes = Cake::with('category')->get();

    return view('admin.cakes.index', compact('cakes'));
}
    /**
     * Show the form for creating a new resource.
     */
      public function create()
    {
     $categories = \App\Models\Category::all();

        return view('admin.cakes.create', compact('categories'));
    }  
    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'flavour' => 'required',
        'weight' => 'required',
        'egg_type' => 'required',
        'stock' => 'required|integer',
        'description' => 'nullable',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('uploads/cakes'), $imageName);

    Cake::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
        'flavour' => $request->flavour,
        'weight' => $request->weight,
        'egg_type' => $request->egg_type,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
        'stock' => $request->stock,
        'image' => $imageName,
        'is_featured' => $request->has('is_featured'),
    ]);

    return redirect()->route('cakes.index')
        ->with('success', 'Cake added successfully!');
}

    

    /**
     * Display the specified resource.
     */
   public function show(Cake $cake)
{
    $cake->load([
        'reviews.user'
    ]);

    return view('cake-details', compact('cake'));
}
    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Cake $cake)
{
    $categories = \App\Models\Category::all();

    return view('admin.cakes.edit', compact('cake','categories'));
}

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Cake $cake)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'flavour' => 'required',
        'weight' => 'required',
        'egg_type' => 'required',
        'stock' => 'required|integer',
    ]);

    if($request->hasFile('image'))
    {
        $imageName=time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/cakes'),$imageName);

        $cake->image=$imageName;
    }

    $cake->category_id=$request->category_id;
    $cake->name=$request->name;
    $cake->slug=Str::slug($request->name);
    $cake->description=$request->description;
    $cake->flavour=$request->flavour;
    $cake->weight=$request->weight;
    $cake->egg_type=$request->egg_type;
    $cake->price=$request->price;
    $cake->discount_price=$request->discount_price;
    $cake->stock=$request->stock;
    $cake->is_featured=$request->has('is_featured');

    $cake->save();

    return redirect()->route('cakes.index')
            ->with('success','Cake Updated Successfully');
}

    /**
     * Remove the specified resource.
     */
   public function destroy(Cake $cake)
{
    if($cake->image)
    {
        $path=public_path('uploads/cakes/'.$cake->image);

        if(file_exists($path))
        {
            unlink($path);
        }
    }

    $cake->delete();

    return redirect()->route('cakes.index')
            ->with('success','Cake Deleted Successfully');
}
}