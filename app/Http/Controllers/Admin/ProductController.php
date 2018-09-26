<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use File;

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
        $this->brand = new Brand;
        $this->category = new Category;
    }

    public function showList(Request $request)
    {
        $products = Product::all();
        return view($this->product_index, [
            'products' => $products
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->get('name')) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $this->product->image = $name;
        } else {
            return back()->withInput();
        }
        $this->product->name = $request->get('name');
        $this->product->category_id = $request->get('category');
        $this->product->brand_id = $request->get('brand');
        $this->product->price = $request->get('price');
        $this->product->quantity = $request->get('quantity');
        $this->product->slug = str_slug($request->get('name'));
        $this->product->desc_en = $request->get('desc_en');
        $this->product->desc_vi = $request->get('desc_vi', '');
        $this->product->save();
        return redirect()->route('admin.product.add.show')->with('add_product', [
            'status' => 'success',
            'message' => 'Product has been added successfully!'
        ]);
      
    }     

    public function deleteProduct(DeleteProductRequest $request)
    {   
        if ($this->product->find($request->get('delete_id'))->delete()) {
            return back()->with('delete_product', [
                'status' => 'success',
                'message' => 'Product has been deleted successfully!'
            ]);
        } else {
            return back()->with('delete_product', [
                'status' => 'danger',
                'message' => 'Fail to delete product with given id!'
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
        $data = [
            'name' => $request->get('name'),
            'category_id' => $request->get('category'),
            'brand_id' => $request->get('brand'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'slug' => str_slug($request->get('name')),
            'desc_en' => $request->get('desc_en'),
            'desc_vi' => $request->get('desc_vi', '')
        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $path = "uploads/products/";
            $file->move($path,$name);
            $data['image'] = $name;
            $old_image_path = "/uploads/products/" . $this->product->find($id)->image;  
            if(File::exists($old_image_path)) {
                File::delete($old_image_path);
            }
        }
        $this->product->where('id', $id)->update($data);
        
        return redirect()->route('admin.product.list')->with('update_product', [
            'status' => 'success',
            'message' => 'Product has been updated succesfully!'
        ]);
    }

    private function editProductLang() 
    {}
}
