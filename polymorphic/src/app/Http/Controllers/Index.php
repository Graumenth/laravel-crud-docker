<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function create(){
        $staff = Staff::find(1);
        $staff->photos()->create(['path'=>'example.jpg']);
    }

    public function read(){
        $staff = Staff::findOrFail(1);
        foreach ($staff->photos as $photo){
            return $photo->path;
        }
    }

    public function update(){
        $staff = Staff::findOrFail(1);
        $photo = $staff->photos()->whereId(1)->first();
        $photo->path = "Example.jpg";
        echo ($photo->save()) ? "Success" : "Failure";
    }
}
