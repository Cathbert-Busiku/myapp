<?php

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('index',[
       'contacts' => Contact::all()
    ]);
});


Route::get('/register', function () {
    return view('register');
});


Route::post('/savecontact', function (Request $request) {
    
    $formFields =  $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'phone' => 'required',
        'location' => 'required',

    ]);

    Contact::create($formFields);
    return redirect('/');
});

Route::get('/contacts/{contact}/edit', function (Contact $contact) {
    return view('edit', [
        'contact' => $contact
    ]);
});


Route::put('/update', function (Request $request) {
    
    $formFields =  $request->validate([
    
    ]);
     
    $id = $request->id;
    
    $formFields['firstName'] = $request->firstname;
    $formFields['lastName'] = $request->lastname;
    $formFields['Phone'] = $request->phone;
    $formFields['location'] = $request->location;

    Contact::where('id',$id)->update($formFields);
    
    return redirect('/');
});

Route::delete('/contacts/{contact}', function (Contact $contact) {

    
    $contact->delete();

     return redirect('/');
});
























// //Show Edit Form
// Route::get('/contacts/{contact}/edit', function(Contact $contacts) {
//     return view('edit',[
//         'contacts' => $contacts,
//     ]);
// });

// //Update submit Listing
// Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');





// Route::get('/register', function () {
//     return view('welcome');
// });
