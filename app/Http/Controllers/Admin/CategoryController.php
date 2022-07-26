<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryAddRequest;
use illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function showCategories()
    {

        $categories = Category::all()->sortBy('title');
        return view('admin.category.categories')->with('categories', $categories);

    }

    public function newCategory()
    {
        return view('admin.category.category-new');
    }

    public function addCategory(CategoryAddRequest $request) //ptr a avea acces la datele postate add un request
    {

        $this->validate($request,

            [
                'slug' => 'unique:categories,slug'
            ],
            [
                'slug.unique' => 'acest slug este deja utilizat in BD'
            ]

        );

        $category = new Category;

        $category->title = $request->title;
        $category->slug = Str::slug($request->slug);
        $category->subtitle = $request->subtitle;
        $category->excerpt = $request->excerpt;
        $category->views = $request->views;


        // $category->prder = $request->prder;
        // $category->public = $request->public;

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;



        if($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->title) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/categories', $photoName);

            $category->photo = $photoName;
        }

        $mess = 'Categoria ' . $request->title . 'a fost
        inregistrata in baza de date.';


        $category->save();

        return redirect(route('admin.categories'))->with('success', $mess);
            }

            #################################################################

            public function editCategory($id)
            {
                $category = Category::findOrFail($id);//crearea unei rute pe care o editam

                return view('admin.category.category-edit')->with('category', $category);
            }

            #####################################################################

            public function updateCategory(CategoryAddRequest $request, $id){

                $this->validate($request,

                    [
                        'slug' => 'unique:categories,slug,' . $id
                    ],
                    [
                        'slug.unique' => 'acest slug este deja utilizat in BD'
                    ]

                );


                $category=Category::findOrFail($id);

                $category->title = $request->title;
                $category->slug = Str::slug($request->slug);
                $category->subtitle = $request->subtitle;
                $category->excerpt = $request->excerpt;
                $category->views = $request->views;


                // $category->prder = $request->prder;
                // $category->public = $request->public;

                $category->meta_title = $request->meta_title;
                $category->meta_description = $request->meta_description;
                $category->meta_keywords = $request->meta_keywords;



                if($request->hasFile('photo')){
                    if(!($category->photo == 'category.png')){

                        File::delete('images/categories/' . $category->photo);
                    }

                    $extension = $request->file('photo')->getClientOriginalExtension();
                    $photoName = str_replace(' ', '', $request->title) . '_' . time() . '.' . $extension;

                    $request->file('photo')->move('images/categories', $photoName);

                    $category->photo = $photoName;
                }

                $mess = 'Categoria ' . $request->title . 'a fost
                actualizat cu noile date.';


                $category->save();

                return redirect(route('admin.categories'))->with('success', $mess);

            }

            public function deleteCategory($id){

                //gasirea categoriei
                $category = Category::findOrFail($id);


                if(!($category->photo == "default.jpg")){
                   File::delete('images/categories/' . $category->photo);
                }

                $category->delete();
                return redirect(route('admin.categories'))->with('success', 'Categoria ' . $category->title . 'a fost stearsa definitiv din baza de date');

            }
}
