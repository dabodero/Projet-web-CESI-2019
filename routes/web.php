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

Route::get('/', function () {
    return view('welcome');
});
//Route de Test
Route::get('blade', function () {
    return view('child');
});
Route::get('login', function () {
    return view('login');
});

Route::get('register', 'UsersController@register');
Route::post('register', 'UsersController@postregister');

Route::get('login', 'UsersController@showlogin');
Route::post('login', 'UsersController@postlogin');

Route::get('profile', 'UsersController@profile');

Route::get('cart', 'CartsController@showCart');

Route::get('checkout', 'CartsController@showCheckout');

Route::get('legal', 'LegalsController@showLegalNotices');

Route::get('legal/cookies', function () {
    return view('legalcookies');
});
Route::get('legal/CGV', 'LegalsController@showCGV');

Route::get('shop', 'ShopController@shops');

Route::get('shop/{id}', 'ShopController@shop');
Route::post('shop/{id}', 'ShopController@addToCard');

Route::get('events', 'EventsController@events');

Route::get('events/{id}', 'EventsController@event');

Route::get('temp', function () {
    return controller('temp');
});

//Penser à appliquer le middleware Auth dessus
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@dashboard');
    Route::get('shop', 'AdminController@shopAdmin');
    Route::get('events', 'AdminController@eventsAdmin');
    Route::get('shop/{id}', 'AdminController@articleAdmin');
    Route::get('events/{id}', 'AdminController@eventAdmin');
    Route::get('new-article', 'AdminController@createArticle');
    Route::get('new-event', 'AdminController@createEvent');
});


Route::get('testDiplayCampus', function () {

    $campuss = App\Campus::all();
    foreach ($campuss as $campus)
    {
        echo $campus->id;
        echo '<br>';
        echo $campus->name;
        echo '<br>';
        echo $campus->address;
        echo '<br>';
        echo $campus->city;
        echo '<br>';
        echo "-----";
        echo '<br>';
    }
});
Route::get('testDiplayUsers', function () {

    $users = App\User::all();
    foreach ($users as $user)
    {
        echo $user->id;
        echo '<br>';
        echo $user->last_name;
        echo '<br>';
        echo $user->first_name;
        echo '<br>';
        echo $user->email;
        echo '<br>';
        echo $user->password;
        echo '<br>';
        echo $user->created_at;
        echo '<br>';
        echo $user->updated_at;
        echo '<br>';
        echo $user->id_campus;
        echo ':';
        echo $user->campus->name;
        echo ':';
        echo $user->campus->address;
        echo ':';
        echo $user->campus->city;
        echo '<br>';
        echo $user->id_roles;
        echo ':';
        echo $user->role->name;
        echo '<br>';
        echo $user->id_images;
        echo ':';
        echo $user->image->path;
        echo ':';
        echo $user->image->alt;
        echo '<br>';
        echo "-----";
        echo '<br>';
    }
});


Route::get('testDiplayEvents', function () {

    $events = App\Event::all();
    foreach ($events as $event)
    {
        echo $event->id;
        echo '<br>';
        echo $event->name;
        echo '<br>';
        echo $event->description;
        echo '<br>';
        echo $event->start_date;
        echo '<br>';
        echo $event->end_date;
        echo '<br>';
        echo $event->price;
        echo '<br>';
        echo $event->recurrent;
        echo '<br>';
        echo $event->validate;
        echo '<br>';
        echo $event->id_images;
        echo ':';
        echo $event->image->path;
        echo ':';
        echo $event->image->alt;
        echo '<br>';
        echo $event->id_users;
        echo ':';
        echo $event->creator->email;
        echo '<br>EOTM ?';
        echo $event->isEventofthemonth;
        echo '<br>';
        echo "<br>PARTICIPATE:<br>";
        foreach($event->participate as $user)
        {
            echo '| ';
            echo $user->email;
            echo '<br>';
        }
        echo "<br>VOTED:<br>";
        foreach($event->voted as $user)
        {
            echo '| ';
            echo $user->email;
            echo '<br>';
        }
        echo "<br>LOCALISATION:<br>";
        foreach($event->localisation as $campus)
        {
            echo '| ';
            echo $campus->name;
            echo '<br>';
        }
        echo "<br>POSTS:<br>";
        foreach($event->posts as $post)
        {
            echo '| ';
            echo $post->text;
            echo ' : ';
            echo $post->user->email;
            echo '<br>';
        }
        echo "<br>IMAGES:<br>";
        foreach($event->illustrateeventsmulti as $illustrate)
        {
            echo '| ';
            echo $illustrate->image->path;
            echo ' : ';
            echo $illustrate->user->email;
            echo '<br>';
        }
        
        echo "--------------------------------";
        echo '<br>';
    }
});

Route::get('testDiplayArticles', function () {

    $articles = App\Article::all();
    foreach ($articles as $article)
    {
        echo $article->id;
        echo '<br>';
        echo $article->name;
        echo '<br>';
        echo $article->description;
        echo '<br>';
        echo $article->image->path;
        echo '<br>';
        echo $article->category->name;
        echo '<br>';
        /*echo "<br>PARTICIPATE:<br>";
        foreach($event->participate as $user)
        {
            echo '| ';
            echo $user->email;
            echo '<br>';
        }
        echo "<br>VOTED:<br>";
        foreach($event->voted as $user)
        {
            echo '| ';
            echo $user->email;
            echo '<br>';
        }
        echo "<br>LOCALISATION:<br>";
        foreach($event->localisation as $campus)
        {
            echo '| ';
            echo $campus->name;
            echo '<br>';
        }
        echo "<br>POSTS:<br>";
        foreach($event->posts as $post)
        {
            echo '| ';
            echo $post->text;
            echo ' : ';
            echo $post->user->email;
            echo '<br>';
        }*/
        echo "<br>IMAGES:<br>";
        foreach($article->illustratearticlesmulti as $illustrate)
        {
            echo '| ';
            echo $illustrate->path;
            echo ' : ';
            echo $illustrate->alt;
            echo '<br>';
        }
        
        echo "<br>--------------------------------<br>";
        echo '<br>';
    }
});

Route::get('testCurrent', function () {

    $sss = App\User::all();
    foreach ($sss as $aaa)
    {
        echo $aaa->id;
        echo '<br>';
        echo $aaa->email;
        echo '<br>';
        echo $aaa->campus->name;
        echo '<br>';
        echo $aaa->role->name;
        echo '<br>';
        echo $aaa->image->path;
        echo '<br>';
        
        echo "<br>A--:<br>";
        foreach($aaa->orders as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>Z--:<br>";
        foreach($aaa->commented as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>E--:<br>";
        foreach($aaa->posts as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>R--:<br>";
        foreach($aaa->illustrateeventsmulti as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>T--:<br>";
        foreach($aaa->events as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>Y-------:<br>";
        foreach($aaa->liked as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>U--:<br>";
        foreach($aaa->participate as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }

        echo "<br>I--:<br>";
        foreach($aaa->voted as $bbb)
        {
            echo '| ';
            echo $bbb;
            echo '<br>';
        }




        echo "<br>--------------------------------<br>";
        echo '<br>';
    }
});




/*Route::get('testCurrent', function () {

    $sss = App\Illustrateeventsmulti::all();
    foreach ($sss as $aaa)
    {
        echo $aaa->id;
        echo '<br>';
        echo $aaa->text;
        echo '<br>';
        echo $aaa->date;
        echo '<br>';
        echo $aaa->user;
        echo '<br>';
        echo $aaa->event;
        echo '<br>';

        echo "<br>--:<br>";
        foreach($aaa->liked as $bbb)
        {
            echo '| ';
            echo $bbb->email;
            /*echo ' : ';
            echo $bbb->stock;
            echo ' : ';
            echo $bbb->article->image->path;*//*
            echo '<br>';
        }
        
        echo "<br>--------------------------------<br>";
        echo '<br>';
    }
});*/
