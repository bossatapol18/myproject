<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    //สร้างcontroller
    
    public function create(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');

        $fullname = $name . " " . $lastname;
        $sensor_name = str_replace("a","*",$fullname);
        $sensor_name = str_replace("u","*",$sensor_name);
        echo $sensor_name;

        return view("myprofile/create");
    }

    public function edit($id)
    {   
        $profile = (object)[
            "id" => $id,
            "name" => "James" ,
            "lastname" =>  "Mars",
            "email" => "james@vru.ac.th",
        ];
        $others = "hello world";
        return view("myprofile/edit" , compact('profile','others') );
    }

    public function show($id)
    {   
        $profile = (object)[
            "id" => $id,
            "name" => "James" ,
            "lastname" =>  "Mars",
            "email" => "james@vru.ac.th",
        ];
        $others = "hello world";
        return view("myprofile/show" , compact('profile','others') );
    }

    public function gallery ()
    {
        $ant = url("images/ant.jpg");
        $bird = url("images/bird.jpg");
        $cat = url("images/cat.jpg");
        $god = url("images/god.jpg");
        $spider = url("images/spider.jpg");

        return  view("test/index", compact("ant","bird","cat","god","spider") );
    }

    public function ant ()
    {
        $ant = url("images/ant.jpg");
    

        return  view("test/index1", compact("ant") );

    }

    public function bird ()
    {
        $bird = url("images/bird.jpg");

        return  view("test/index2", compact("bird") );

    }




     
}
