<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTran;
use DB;
use File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product_index;
    protected $product_form;
    protected $product;

    public function __construct()
    {
        $this->product_index = 'admin.pages.product.index';
        $this->product_form = 'admin.pages.product.form';
        $this->product = new Product;
        $this->productTran = new ProductTran;
        $this->brand = new Brand;
        $this->category = new Category;
    }

    public function showList(Request $request)
    {
        $products = Product::all();
        return view($this->product_index, [
            'products' => $products,
        ]);
    }

    public function showAddForm(Request $request)
    {

        $categories = $this->category->select('name', 'id')->get();
        $brands = $this->brand->select('name', 'id')->get();
        $options = [
            'categories' => $categories,
            'brands' => $brands,
            'role' => 'add',
            'action' => 'create',
            'id' => null,
        ];
        return view($this->product_form, $options);
    }

    public function addProduct(CreateProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'category_id' => $request->get('category'),
                'brand_id' => $request->get('brand'),
                'price' => $request->get('price'),
                'quantity' => $request->get('quantity'),
                'slug' => str_slug($request->get('name_en'))
            ];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $data['slug'] . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/products');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            } else {
                return back()->withInput();
            }
            $this->product->create($data);
            $id = $this->product->select('id')->where('slug', '=', $data['slug'])->first()->id;
            $langs = config('app.locales');
            foreach ($langs as $k => $v) {
                $data1 = [
                    'lang' => $k,
                    'product_id' => $id,
                    'name' => $request->get('name_' . $k),
                    'description' => $request->get('description_' . $k)
                ];
                $this->productTran->create($data1);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('add_product', [
                'status' => 'danger',
                'message' => $e->getMessage()
            ]);
        } 
        DB::commit();
        return redirect()->route('admin.product.add.show')->with('add_product', [
            'status' => 'success',
            'message' => 'Product has been added successfully!',
        ]);

    }

    public function deleteProduct(DeleteProductRequest $request)
    {
        if ($this->product->find($request->get('delete_id'))->delete()) {
            return back()->with('delete_product', [
                'status' => 'success',
                'message' => 'Product has been deleted successfully!',
            ]);
        } else {
            return back()->with('delete_product', [
                'status' => 'danger',
                'message' => 'Fail to delete product with given id!',
            ]);
        }
    }

    public function showEditForm($id, Request $request)
    {
        if (Product::find($id)) {
            $this->product = Product::find($id);
            $categories = $this->category->select('name', 'id')->get();
            $brands = $this->brand->select('name', 'id')->get();
            $options = [
                'product' => $this->product,
                'action' => 'edit',
                'role' => 'edit',
                'id' => $id,
                'categories' => $categories,
                'brands' => $brands,
            ];
            return view($this->product_form, $options);
        } else {
            abort(404);
        }
    }

    public function editProduct(UpdateProductRequest $request)
    {
        $id = $request->get('id');
        if (Product::find($id)) {
            DB::beginTransaction();
            try {
                $data = [
                    'category_id' => $request->get('category'),
                    'brand_id' => $request->get('brand'),
                    'price' => $request->get('price'),
                    'quantity' => $request->get('quantity')
                ];
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $name = time() . $file->getClientOriginalName();
                    $path = "uploads/products/";
                    $file->move($path, $name);
                    $data['image'] = $name;
                    $old_image_path = "/uploads/products/" . Product::find($id)->image;
                    if (File::exists($old_image_path)) {
                        File::delete($old_image_path);
                    }
                }
                $product = Product::find($id);
                $product->update($data);
                $langs = config('app.locales');
                foreach ($langs as $k => $v) {
                    $productTran = ProductTran::where('lang', '=', $k)->where('product_id', '=', $id)->first();
                    $data = [
                        'name' => $request->get('name_' . $k),
                        'description' => $request->get('description_' . $k)
                    ];
                    $productTran->update($data);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('admin.product.list')->with('update_product', [
                    'status' => 'danger',
                    'message' => 'Fail to update product!!',
                ]);
            } 
            DB::commit();
            return redirect()->route('admin.product.list')->with('update_product', [
                'status' => 'success',
                'message' => 'Product has been updated succesfully!!',
            ]);
        }
    }

}
