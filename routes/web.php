<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

use App\Http\Controllers\ContactCRUDController;

use App\Models\Contact;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

  return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/relate/{id}/{wid}', function ($id,$wid) {
  $contact = Contact::find($id);
  $contact->wordpress_id = $wid;
  $contact->wordpress_createat = date('Y').'-'.date('m').'-'.date('d');
    $contact->save();
    return response()->json('ok', 200);
});


Route::get('/user/{id}', function ($id) {
  $contact = Contact::where('id',$id)->get()->toJson();
    return response()->json($contact, 200);
});


Route::get('/unrelate/{id}', function ($id) {
  $contact = Contact::find($id);
  $contact->wordpress_id = null;
  $contact->wordpress_createat = null;
    $contact->save();
    return response()->json('ok', 200);
});


Route::resource('contacts', ContactCRUDController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
