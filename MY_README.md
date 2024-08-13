## Get all data from posts table

public function index()
{
return response()->json([
'posts'=>Post:: get()
])
}


## api.php

Route::get('posts', [PostController::cLass, 'index']);
Route::post("posts', [PostController::class, 'store']);


## Data Submission
public function store(Request $request)
{
$post = new Post;
$post-›title = $request-›title;
$post-›description = request-›description;
$post-›save ();
return response(->json ([
'message' => 'Post Created',
'status' => 'success',
'data'= $post
])
}

## Show Single Post
public function show(Post $post)
return response()->json(['post'=>$post]);|
｝
//Route
Route: :get('posts/{post}', [PostController::class,'show') ;

//Link

http://localhost:8000/api/posts/1

## Update Post

public function update(Request $request, Post $post)
{
$post-›title = request-›title;
$post-›description = request-›description;
$post-›save() ;
return response(->json ([

'message' => 'Post Updated',
'status' => 'success',
'data'
=> $post
)]
}


http://localhost:8000/api/posts/2?_method=PUT

Route:: put('posts/{post}', [PostController::class,'update']);


## Delete Post

public function destroy(Post $post) {
$post=>delete;
return response()->json ([
'message'=> 'post deleted',
'status'=>'success'
]}

Route:: delete('posts/{post}',[PostController::class, 'destroy"]);


Route::apiResource('posts' ,PostController:: class);


//Seeding

php artisan make:seeder
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=ServicesCategorySeeder
