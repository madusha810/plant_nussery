<?php

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

Route::get('/', 'customhomecontroller@viewwelcomepage');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



    


Route::group(['middleware' => ['auth','admin']], function() {

    Route::get('/admin', 'admincontroller@userlist');
       
   

});

Route::get('/dashboard', function() {
    $data = App\User::all();
        return view('admin.dashboard')->with('user',$data);
});

Route::get('/plant', 'adminitemcontroller@display');
   
        


 /*admin route*/

//name as admin
Route::get('/asadmin/{id}', 'admincontroller@admin');

//remove from admin
Route::get('/remove/{id}', 'admincontroller@removeuser');

//admin view user info
Route::get('/detail/{id}', 'admincontroller@viewinfo');

//admin add plant
Route::get('/addplant', function(){
   
    return view('admin.addplant');
});

//store new item to databaase
Route::post('/storeitem', 'adminitemcontroller@store');

//delete item
Route::get('/removeitem/{id}', 'adminitemcontroller@remove');

//view edit item table
Route::get('/edititem/{id}', 'adminitemcontroller@edit');

//edit item in database
Route::post('/edititemadmin', 'adminitemcontroller@edititem');

//view stock update
Route::get('/editstock/{id}', 'adminitemcontroller@viewstock');

//update stock
Route::post('/addstock', 'adminitemcontroller@increase');

//minimize stock
Route::post('/removestock', 'adminitemcontroller@decrease');

//manage website view display
Route::get('/manage', function(){

    return view('admin.website');
    
});

//view imageslide page
Route::get('/imageslider' , 'imagecontroller@viewimagepage');

//save image to database
Route::post('/saveimage', 'imagecontroller@storeimage');

//delete image
Route::get('/deleteimage/{id}', 'imagecontroller@deleteimage');

//view edit image form
Route::get('/editimageslider/{id}', 'imagecontroller@showeditimage');


//view paragraph editor
Route::get('/paragraph', 'imagecontroller@viewpragraphform');

//save paragaph to database
Route::post('/saveparagaph', 'imagecontroller@storeparagraph');

//view conact editor
Route::get('/contact', 'imagecontroller@viewcontactform');

//save contact details to databse
Route::post('/savecontact', 'imagecontroller@storecontact');

//display all advertiesment
Route::get('/advertiesment', 'advertiesmentcontroller@showadd');

//display edit advertiement form
Route::get('/editadd/{id}', 'advertiesmentcontroller@editaddform');

//delte add
Route::get('/deleteadd/{id}', 'advertiesmentcontroller@deleteadd');

//modify advertiesment to databse
Route::post('/saveadd', 'advertiesmentcontroller@storeadd');

//insert advertiesment to database
Route::post('/savenewadd', 'advertiesmentcontroller@storenewadd');


//employee routes


Route::get('/employee','EmployeeController@index');

Route::post('/addimage','EmployeeController@store');

Route::get('/employeepage','EmployeeController@display');

Route::get('/employconfirm/{id}','EmployeeController@emailform');

Route::put('/updateimage/{id}','EmployeeController@update');

Route::get('/deleteemployee/{id}','EmployeeController@deleteemployye');


Route::get('/viewdetails/{id}', 'EmployeeController@viewdetails');

Route::post('/sendemployeeemail/{id}', 'EmployeeController@mail');


//supplier route

Route::get('/supplier','SupplierControler@index');

Route::post('/supplier','SupplierControler@store')->name('addimage');

Route::get('/supplierpage','SupplierControler@display');

Route::get('/viewsupplier/{id}','SupplierControler@view');

Route::put('/updateimage/{id}','SupplierControler@update');

Route::get('/deleteimage/{id}','SupplierControler@delete');

Route::get('/confirm/{id}', 'SupplierControler@emailform');

Route::post('/send/{id}', 'SupplierControler@mail');






/*user route*/
//user view user profile
Route::get('/userdetail{id}', 'usercontroller@view');

//update user profile
Route::post('/userinfo', 'usercontroller@storeuserinfo');

//view products before login
Route::get('/viewproducts', 'userproductviewcontroller@viewproduct');



//********************************************************************************* */

//view orderform before login
Route::get('/orderproduct/{id}', 'ordercontroller@view'); // view one order
   
Route::post('/order/item', 'ordercontroller@order');

Route::get('/order/view/notconfirmed', 'ordercontroller@viewOrder'); // view whole orders not confirmed
Route::get('/order/view/confirmed', 'ordercontroller@viewOrderConfirmed'); // view whole order confirmed
Route::get('/order/remove/{id}', 'ordercontroller@removeOrder'); 
Route::post('/order/checkout', 'ordercontroller@checkout'); 

Route::get('/order/checkout', 'ordercontroller@viewOrder'); 

Route::post('/order/pay/now', 'paymentcontroller@pay');
//

Route::get('stripe', 'paymentController@stripe');
///Route::post('/order/pay/now', 'paymentController@stripePost');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'paymentController@pdfview'));

//---------------admin---------

Route::get('/admin/orders', 'admincontroller@orders');
Route::get('/admin/orders/{id}', 'admincontroller@vieworder');
Route::get('/admin/delivery', 'admincontroller@delivery');
Route::post('/admin/addcity', 'admincontroller@addcity');
Route::get('/admin/remove_city/{id}', 'admincontroller@remove_city');
//Route::get('/admin/preorders', 'admincontroller@preOrders');
