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

    return view('template');
       


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
        // Validate the request...
 
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
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
        $mod = UserMod::find($id);
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
    $mod->save();
    echo "update success";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  $mod = UserMod::find(1);
      //  $mod->delete();

    }
}