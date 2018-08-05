<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\products as product;
use App\Model\product as ProductMod;
use Illuminate\Database\Eloquent\Model;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $mods = UserMod::orderBy('id','desc')->paginate(10);
    return view('admin.user.lists', compact('mods') );


    
    //return view('admin.user.lists');
       


     //   $data = [
      //  'name' => 'My Name',
     //   'surname' => 'My SurName',
     //   'email' => 'myemail@gmail.com'
    //   ];

     //   $user = UserMod::find(1);
     //   $mods = UserMod::all();

     //   return view('temp, prefix)', compact('data', 'user', 'mods'));




    //$mods = UserMod::all();
    //return view('test', compact('mods'));




                // $data = [
              //      'name' => 'My Name',
               //     'surname' => 'My SurName',
                //    'email' => 'myemail@gmail.com'
              //  ];

                 // $item = [
              //      'item1' => 'My Value1',
                //      'item2' => 'My Value2'
               //  ];

               //  $results = [
              //      'data' => $data,
              //      'item' => $item
              //  ];

             //   return view('test', $results);



     

       //return view('test')->with('name', 'My Name Is Kunanon')
                         // ->with('email', 'test@email.com');


        //$mods = UserMod::all();
        
        // Using alias name
        //$mods = UserMod::all();

        //foreach ($mods as $item) 
        //{
       //     echo $item->name."<br />";
       // }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
    
       request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'age' => 'required|numeric',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',

            'surname.required' => 'surname is required',
            'surname.min' => 'surname must be at least 2 characters.',
            'surname.max' => 'surname should not be greater than 50 characters.',

            'mobile.required' => 'surname is required',
            'mobile.numeric' => 'surname is numeric.',

            'email.required' => 'email is required',
            'email.email' => 'email is email.',
            'email.unique' => 'email is unique.',

            'password.required' => 'password is required',
            'password.min' => 'password must be at least 2 characters.',

            'age.required' => 'age is required',
            'age.numeric' => 'age is numeric.',

            'confirm_password.required' => 'confirm password is required',
            'confirm_password.min' => 'confirm password must be at least 6 characters.',
            'confirm_password.max' => 'confirm password must be at least 20 characters.',
            'confirm_password.same' => 'confirm password Must be the same.',
            
        ]);


        $mod = new UserMod;
        $mod->email    = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();

                    return redirect('admin/user')
                    ->with('success', 'User ['.$request->name.'] created successfully.');

        echo "Save New data to table";


             // dd($request);    
             // Validate the request...
 
              // $mod = new UserMod;
             // $mod->name = $request->name;
             // $mod->email = $request->email;
             // $mod->password = bcrypt($request->password);
             //  $mod->save();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
            //$shop = ShopMod::find($id);
            // echo $shop->name;

            // echo "<br />";
           // echo $shop->user->name;

            // $products = ShopMod::find($id)->products;
           // foreach ($products as $product) {
           //     echo $product->name;
           //     echo "<br />";
         //}
           //     echo "OR <br /><br />";

            //    $shop = ShopMod::find($id);
          //     echo "<br />";            
          // foreach ($shop->products as $product) {
           //    echo $product->name;
           //    echo "<br />";
           // }
        
                      // $product = ProductMod::find($id);
                     // echo "Product Name Is: " .$product->name;
                     //  echo "<br /><br />";
                      //  echo "Shop Owner Is: " .$product->shop->name;

    }

    /**
     
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UserMod::find($id);
        return view('admin.user.edit', compact('item') );


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
       
            request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'password' => 'required|min:6',
            'age' => 'required|numeric',
            'confirm_password' => 'required|min:6|max:20|same:password',
              ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
             ]);

              $request->validated();
              $mod = UserMod::find($id);
             $mod->name     = $request->name;
                $mod->surname  = $request->surname;
             //$mod->email    = $request->email;
                $mod->mobile   = $request->mobile;
             $mod->surname  = $request->surname;
             $mod->age      = $request->age;
             $mod->address  = $request->address;
             $mod->city     = $request->city;
             $mod->save();
                return redirect('admin/user')
                ->with('success', 'User ['.$request->name.'] updated successfully.');


       // $mod = UserMod::find($id);
       // $mod->name = $request->name;
       // $mod->email = $request->email;
       // $mod->password = bcrypt($request->password);
    //$mod->save();
    //echo "update success";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $mod = UserMod::find(1);
            $mod->delete();


      //  $mod = UserMod::find(1);
      //  $mod->delete();

    }
}