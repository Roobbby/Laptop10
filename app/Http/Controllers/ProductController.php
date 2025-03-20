<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('back.product', compact('products'));
    }

    public function dashboard()
    {
        return view('back.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            }

            $product                              = new Product();
            $product->name                        = $request->input('namaLaptop');
            $product->processor                   = $request->input('processor');
            $product->memory_capacity             = $request->input('memory_capacity');
            $product->memory_type                 = $request->input('memory_type');
            $product->storage_capacity            = $request->input('storage_capacity');
            $product->storage_type                = $request->input('storage_type');
            $product->additional_storage_capacity = $request->input('additional_storage_capacity') ?? null;
            $product->additional_storage_type     = $request->input('additional_storage_type') ?? null;
            $product->has_vga                     = $request->has('hasVGA') ? 1 : 0;
            $product->vga                         = $request->input('vga');
            $product->screen_size                 = $request->input('screenSize');
            $product->battery_life                = $request->input('batteryLife');
            $product->includes                    = json_encode($request->input('include', []));
            $product->description                 = $request->input('description');
            $product->image                       = $imagePath;
            $product->price                       = $request->input('price');
            $product->condition                   = $request->input('condition');
            $product->save();

            session()->flash('success', 'Product added successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to add product: ' . $e->getMessage());
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('back.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Jika ada gambar baru, upload dan hapus yang lama
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $product->image = 'images/' . $imageName;
            }

            // Update data produk
            $product->name                        = $request->input('namaLaptop');
            $product->processor                   = $request->input('processor');
            $product->memory_capacity             = $request->input('memory_capacity');
            $product->memory_type                 = $request->input('memory_type');
            $product->storage_capacity            = $request->input('storage_capacity');
            $product->storage_type                = $request->input('storage_type');
            $product->additional_storage_capacity = $request->input('additional_storage_capacity') ?? null;
            $product->additional_storage_type     = $request->input('additional_storage_type') ?? null;
            $product->has_vga                     = $request->has('hasVGA') ? 1 : 0;
            $product->vga                         = $request->input('vga');
            $product->screen_size                 = $request->input('screenSize');
            $product->battery_life                = $request->input('batteryLife');
            $product->includes                    = json_encode($request->input('include', []));
            $product->description                 = $request->input('description');
            $product->price                       = str_replace('.', '', $request->input('price'));
            $product->condition                   = $request->input('condition');
            $product->save();

            session()->flash('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update product: ' . $e->getMessage());
        }

        return redirect()->route('product.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete product!');
        }

        return redirect()->route('product.index');
    }

    public function rekomendasi(Request $request)
    {
        // Daftar merek yang mungkin dimasukkan pengguna
        $brandList = ['Dell', 'Asus', 'Lenovo', 'HP', 'Acer', 'MSI', 'Apple', 'Samsung', 'Toshiba'];

        // Validasi input pengguna
        $validated = $request->validate([
            'name'        => 'nullable|string|max:255',
            'screen_size' => 'nullable|numeric',
            'price'       => 'nullable|string',
        ]);

        // Konversi harga dari format input ke angka
        $price = !empty($validated['price']) ? (int) str_replace('.', '', $validated['price']) : null;

        // Pisahkan merek dari input user
        $inputBrand = null;
        foreach ($brandList as $brand) {
            if (stripos($validated['name'], $brand) !== false) {
                $inputBrand = $brand;
                break; // Jika ketemu, hentikan loop
            }
        }


        $input = [
            'name'        => $inputBrand, // Hanya mereknya saja
            'screen_size' => $validated['screen_size'],
            'price'       => $price,
        ];
        $products = Product::query();

        if ($input['name']) {
            $products->where('name', 'LIKE', "%{$input['name']}%");
        }

        if ($input['price']) {
            $products->where('price', '<=', $input['price']);
        }

        // Ambil produk yang sudah difilter
        $products = $products->get()->map(function ($product) use ($input) {
            $similarityData = $product->calculateSimilarityDetails($input);
            $product->similarity = $similarityData['total_similarity'];
            $product->similarity_details = $similarityData['details'];
            return $product;
        });

        // Urutkan berdasarkan similarity score dan ambil 3 rekomendasi terbaik
        $recommendedProducts = $products->sortByDesc('similarity')->take(3);

        return view('front.recomendation_result', compact('recommendedProducts'));
    }
}
