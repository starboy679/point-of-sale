<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Sale;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function(){
    $total = \App\Models\Sale::sum('total');
    $products = \App\Models\Product::count();
    $users = \App\Models\User::count();
    return view('dashboard', compact('total', 'products', 'users'));
})->middleware(['auth', 'role:admin']);

Route::get('/products', function(){
    return view('products');
})->middleware(['auth', 'role:admin,inventory']);

Route::get('/products/create', function(){
    return view('create-product');
})->middleware(['auth', 'role:admin,inventory']);

Route::post('/products', function(){
    
    \App\Models\Product::create([
        'name' => request('name'),
        'price' => request('price'),
        'quantity' => request('quantity'),
    ]);

    return redirect('/products');
})->middleware(['auth', 'role:admin,inventory']);

Route::get('/pos', function(){
    return view('pos');
})->middleware(['auth', 'role:cashier']);

Route::get('/inventory', function(){
    $products = \App\Models\Product::all();
    $lowStock = \App\Models\Product::where('quantity', '<', 5)->count();
    return view('inventory', compact('products', 'lowStock'));
})->middleware(['auth', 'role:inventory']);

Route::get('/products/{id}/edit', function($id){
    $product = \App\Models\Product::find($id);
    return view('edit-product', compact('product'));
});

Route::put('/products/{id}', function($id){
    $product = \App\Models\Product::find($id);
    $product->update([
        'name' => request('name'),
        'price' => request('price'),
        'quantity' => request('quantity'),
    ]);
    return redirect('/products');
});

Route::delete('/products/{id}', function($id){
    \App\Models\Product::find($id)->delete();
    return redirect('/products');
});

Route::post('/checkout', function(){
    $cart = json_decode(request('cart'), true);

    foreach($cart as $item){
        $product = \App\Models\Product::find($item['id']);
        if($product->quantity < $item['quantity']){
            return back()->with('error', 'Stock not enough for ' . $product->name);
        }
    }
    $sale = \App\Models\Sale::create([
        'total' => request('total')
    ]);

    foreach($cart as $item){
        \App\Models\SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ]);

        $product = \App\Models\Product::find($item['id']);
        $product->quantity -= $item['quantity'];
        $product->save();
    }

    return redirect('/pos');
});

Route::get('/sales', function(){
    $sales = \App\Models\Sale::latest()->get();
    return view('sales', compact('sales'));
});

Route::get('/sales/{id}', function($id){

    $sale = \App\Models\Sale::findOrFail($id);

    $items = \App\Models\SaleItem::where('sale_id', $id)->get();

    return view('sale-details', compact('sale', 'items'));
});


Route::get('/users', function(){
    $users = \App\Models\User::all();
    return view('users', compact('users'));
})->middleware(['auth', 'role:admin']);

Route::get('/users/create', function() {
    return view('create-user');
})->middleware(['auth', 'role:admin']);

Route::post('/users', function() {
    \App\Models\User::create([
        'name' => request('name'),
        'password' => \Illuminate\Support\Facades\Hash::make(request('password')),
        'role' => request('role'),
    ]);
    return redirect('/users');
})->middleware(['auth', 'role:admin']);
    
Route::get('/users/{id}/edit', function($id){
    $user = \App\Models\User::find($id);
    return view('edit-user', compact('user'));
})->middleware('role:admin');

Route::delete('/users/{id}', function($id){
    \App\Models\User::find($id)->delete();
    return redirect('/users');
})->middleware('role:admin');

Route::get('/reports', function(){
    $total = \App\Models\Sale::sum('total');
    $count = \App\Models\Sale::count();

    $topProducts = \App\Models\SaleItem::join('products',"products.id", '=', 'sales_items.product_id')
        ->selectRaw('products.name as product_name, SUM(sales_items.quantity) as total_qty')
        ->groupBy('products.name')
        ->orderByDesc('total_qty')
        ->take(5)
        ->get();
    return view('reports', compact('total', 'count', 'topProducts'));
})->middleware(['auth', 'role:admin']);

Route::put('/users/{id}', function($id){
    $user = \App\Models\User::find($id);
    $user->update([
        'name' => request('name'),
        'password' => \Illuminate\Support\Facades\Hash::make(request('password')),
        'role' => request('role'),
    ]);
    return redirect('/users');
})->middleware(['auth', 'role:admin']);

Route::post('/logout', function(){
    auth()->logout();
    
    return redirect('/login');
});
Route::get('/create-admin', function(){
    \App\Models\User::create([
        'name' => 'admin',
        'password' => bcrypt('123456'),
        'role' => 'admin',
    ]);
    return 'Admin created';
});