<?php

namespace App\Http\Controllers;

use App\Models\bloggerBlog;
use Illuminate\Http\Request;
use App\Models\bloggerUser;
use Illuminate\Support\Str;

class blogController extends Controller
{
    public function index(){
        return view("blogViews.index");
    }

    public function createBlogButton(){
        return view("blogViews.login");
    }

    public function signup(){
        return view("blogViews.signup");
    }

    public function submitSignup(Request $request){

        $name = $request -> input("name");
        $surname = $request -> input("surname");
        $email = $request -> input("email");
        $password = $request -> input("password");

        $signupArray = [
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "password" => $password
        ];

        $this->signupDB($signupArray);

        return view("blogViews.login");
    }

    public function signupDB($signupArray){

        $bloggerUser = new bloggerUser();
        $bloggerUser->name = $signupArray["name"];
        $bloggerUser->surname = $signupArray["surname"];
        $bloggerUser->email = $signupArray["email"];
        $bloggerUser->password = $signupArray["password"];
        $bloggerUser->save();

        return "Kayıt oluşturuldu";
    }

    public function login(){
        return view("blogViews.login");
    }

    public function submitLogin(Request $request){

        $email = $request->input("email");
        $password = $request->input("password");

        $loginArray = [
            "email" => $email,
            "password" => $password
        ];

        return $this->loginDB($loginArray);
    }

    public function loginDB($loginArray){

        $bloggerUsers = bloggerUser::query()->get();

        foreach ($bloggerUsers as $item){
            if($loginArray["email"] == $item->email && $loginArray["password"] == $item->password){
                session()->put("name", $item->name);
                session()->put("surname", $item->surname);
                session()->put("email", $item->email);
                session()->put("password", $item->password);

                return $this->home($item->email);
            }
        }

        return view("blogViews.login");
    }

    public function home(){
        $name = session("name");
        $surname = session("surname");
        $email = session("email");

        $bloggerBlog = bloggerBlog::query()->get();

        $myblogs = [];

        foreach ($bloggerBlog as $item){
            $shortBlog = Str::limit($item->blog, 400);

            array_unshift($myblogs,'
                <div class="row mt-5">
                   <div class="col-3">
                       <a href="blogs/'.$item->id.'"><img src="https://picsum.photos/250/150"></a>
                   </div>
                   <div class="col-9">
                       <a href="blogs/'.$item->id.'" class="text-dark"><h3>'.$item->title.'</h3></a>
                       <p>'.$shortBlog.'</p>
                   </div>
               </div>');
        }

        return view("blogViews.home", compact("name","surname","email","myblogs"));
    }

    public function writeBlog(){
        $email = session("email");

        return view("blogViews.writeBlog", compact("email"));
    }

    public function submitWriteBlog(Request $request){

        $title = $request->input("title");
        $blog = $request->input("blog");
        $photo = $request->input("photo");

        return $this->writeBlogDB($title,$blog,$photo);
    }

    public function writeBlogDB($title, $blog){
        $bloggerBlog = new bloggerBlog();
        $bloggerBlog->name = session("name");
        $bloggerBlog->surname = session("surname");
        $bloggerBlog->email = session("email");
        $bloggerBlog->title = $title;
        $bloggerBlog->blog = $blog;
        $bloggerBlog->save();

        $name = session("name");
        $surname = session("surname");
        $email = session("email");

        $bloggerBlog = bloggerBlog::query()->get();

        $myblogs = [];

        foreach ($bloggerBlog as $item){
            $shortBlog = Str::limit($item->blog, 400);

            array_unshift($myblogs,'<div class="row mt-5">
                   <div class="col-3">
                       <a href="blogs/'.$item->id.'"><img src="https://picsum.photos/250/150"></a>
                   </div>
                   <div class="col-9">
                       <a href="blogs/'.$item->id.'" class="text-dark"><h3>'.$item->title.'</h3></a>
                       <p>'.$shortBlog.'</p>
                   </div>
               </div>');
        }

        return redirect()->route('routeHome');
    }

    public function profile(){
        $name = session("name");
        $surname = session("surname");
        $email = session("email");

        $bloggerBlog = bloggerBlog::query()->get();

        $myblogs = [];

        foreach ($bloggerBlog as $item){
            if($item->name == $name){
                $shortBlog = Str::limit($item->blog, 400);

                array_unshift($myblogs,'<div class="row mt-5">
                    <div class="col-3">
                        <a href="blogs/'.$item->id.'"><img src="https://picsum.photos/250/150"></a>
                    </div>
                    <div class="col-9">
                        <a href="blogs/'.$item->id.'" class="text-dark"><h3>'.$item->title.'</h3></a>
                        <p>'.$shortBlog.'</p>
                    </div>
                </div>');
            }
        }

        return view("blogViews.profile", compact("name","surname","email","myblogs"));
    }

    public function discover(){
        $name = session("name");
        $surname = session("surname");
        $email = session("email");

        $bloggerBlog = bloggerBlog::query()->get();

        $myblogs = [];

        foreach ($bloggerBlog as $item){
            $shortBlog = Str::limit($item->blog, 400);

            array_unshift($myblogs,'
                <div class="row mt-5">
                   <div class="col-3">
                       <a href="blogs/'.$item->id.'"><img src="https://picsum.photos/250/150"></a>
                   </div>
                   <div class="col-9">
                       <a href="blogs/'.$item->id.'" class="text-dark"><h3>'.$item->title.'</h3></a>
                       <p>'.$shortBlog.'</p>
                   </div>
               </div>');
        }

        return view("blogViews.discover", compact("name","surname","email","myblogs"));
    }

    public function blogs(string $id){
        $name = session("name");
        $surname = session("surname");
        $email = session("email");

        $bloggerBlog = bloggerBlog::query()->get();
        $bloggerID = bloggerBlog::query()->where("id",$id)->first();

        return view("blogViews.blogs", compact("name","surname","email","bloggerBlog","id"));
    }

    public function notifications(){
        $email = session("email");
        return view("blogViews.notifications", compact("email"));
    }

    public function settings(){
        $email = session("email");
        return view("blogViews.settings", compact("email"));
    }
}
