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

use Illuminate\Support\Facades\Route;

//pages
Route::get('/', 'pageController@indexPage');
Route::get('about', 'pageController@aboutPage');
Route::get('blog', 'pageController@blogPage')->name('blog');
Route::get(md5('contact'), 'pageController@contactPage')->name('contact');
Route::get('add-student', 'pageController@studentPage')->name('student');


//posts
Route::get('create-a-new-post', 'postController@createPost')->name('create.post');
Route::get('view-all-post', 'postController@viewPosts')->name('all.posts');
//post cruds
Route::post('store/post', 'postController@storePost')->name('post.add');
Route::get('view-post/{id}', 'postController@singleView');
Route::get('edit-post/{id}', 'postController@postEdit');
Route::post('post/updated/{id}', 'postController@postUpdated');
Route::get('delete-post/{id}', 'postController@postDelete');


//categories
Route::get('view-all-categories', 'categoryController@viewCategory')->name('view.category');
//category cruds
Route::get('add-category', 'categoryController@addCategory')->name('add.category');
Route::get('view-category/id={id}', 'categoryController@singleCategory');
Route::post('store/category', 'categoryController@storeCategory')->name('store.category');
Route::get('delete-category/{id}', 'categoryController@deleteCategory');
Route::get('edit-category/{id}', 'categoryController@editCategory');
Route::post('update.category/{id}', 'categoryController@updateCategory');


///student cruds
Route::post('insert-student','studentController@insertStudent')->name('add.student');
Route::get('show-all-student','studentController@showStudents')->name('all.students');
Route::get('view.student/{id}','studentController@viewStudent');
Route::get('edit.student/{id}','studentController@editStudent');
Route::post('update.student/{id}','studentController@updateStudent');
Route::get('delete.student/{id}','studentController@deleteStudent');



// Route::get('/about', function () {
//     return view('about');
// });

//prefix route - must have prefix route name before the original route name
// Route::prefix('/prefix') ->group(function(){
//     Route::get('/contact', function () {
//         return view('contact');
//     });
//     Route::get('/blog', function () {
//         echo "This is blog page";
//         //return view('blog');
//     });
// });
