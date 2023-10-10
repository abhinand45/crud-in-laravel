<?php

namespace App\Http\Controllers;
use App\Models\Detail;


use Illuminate\Http\Request;

class HomeContoller extends Controller

    {
        //
        public function home(){
            // $add = New Details ;
            $details = Detail::all();
            return view('home',compact('details'));
            // return view('home');
        }


        public function insert(Request $request){
            $add = New Detail;
            $add->name=$request->name;
            $add->age=$request->age;
            $add->address=$request->address;
            $add->save();
            $details = Detail::all();
            return redirect('/');
        }

        public function delete($id)
        {
            $item = Detail::findOrFail($id);
            $item->delete();
            return redirect('/');
        }



        public function edit($id)
        {
            $item = Detail::findOrFail($id);
            // return view('edit');
            return view('edit',compact('item'));
        }


        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer|min:0',
                'address' => 'required|string|max:255',
            ]);

           
     
            $item = Detail::find($id);
            $item->name=$request->input('name');
            $item->age=$request->input('age');
            $item->address=$request->input('address');
            $item->save();

           
        
            // return redirect()->route('items.index')->with('success', 'Item updated successfully');
            return redirect('/');
        }

    }
    

