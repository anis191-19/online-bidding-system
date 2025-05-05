<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexforadmin()
    {
        $categories=DB::table('categories')->get();
        return view('admin\categories', ['categories' => $categories]);
    }
    
    public function createCategory(Request $request){
        // session for duplicate value: 
            $existingCategory = DB::table('categories')->where('name', $request->name)->first();

            if ($existingCategory) {
                // If a category with the same name exists, flash an error message
                session()->flash('addError', 'Category name already exists!');
                return redirect()->route('admin.categories.index')->withInput();
            }

        $categories= DB::table('categories')->insert(
            [
                'name'=>$request->name,
            ]
            );
            
            if($categories){
                session()->flash('addSuccess','Data inserted Successfully');
            }
            else{
                session()->flash('addError','Something went wrong!!Try again');
            }
            return redirect()->route('admin.categories.index');

    }
        public function indexforsusers() {
                   $categories=DB::table('categories')->get();
                   return view('user\home', ['categories' => $categories]);
              }
   
    

            
                /**
                 * Show the form for editing the specified resource.
                 */
                public function edit(string $id)
                {
                    $category = DB::table('categories')->find($id);
                    return view('admin.edit_categories', ['data' => $category]);
                }
                
                


                /**
                 * Update the specified resource in storage.
                 */
                public function update(Request $request, string $id)
            {
                $request->validate([
                    'name' => 'required|string|max:255|unique:categories,name,'.$id,
                ]);

                $updated = DB::table('categories')
                            ->where('id', $id)
                            ->update([
                                'name' => $request->name,
                                'updated_at' => now(),
                            ]);

                if ($updated) {
                    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
                } else {
                    return redirect()->back()->with('error', 'Error updating category.');
                }
            }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyCategory(string $id)
    {
       
        $deleted = DB::table('categories')->where('id', $id)->delete();
    
        if ($deleted) {
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Error deleting category.');
        }
    }
    
    
}

