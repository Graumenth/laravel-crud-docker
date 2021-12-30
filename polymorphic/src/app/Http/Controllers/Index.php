<?php

namespace App\Http\Controllers;

use App\Photo;
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
        return 1;
    }

    public function update(){
        $staff = Staff::findOrFail(1);
        $photo = $staff->photos()->whereId(1)->first();
        $photo->path = "Example.jpg";
        echo ($photo->save()) ? "Success" : "Failure";
    }

    public function delete(){
        $staff = Staff::findOrFail(1);
        //$staff->photos()->whereName('bad_photo.jpg')->delete();
        echo ($staff->photos()->whereId(1)->delete()) ? "Success" : "Failure";
    }

    public function assign(){
        $staff = Staff::findOrFail(1);
        $photo = Photo::find(2);
        $staff->photos()->save($photo);
    }

    public function unassign(){
        $staff = Staff::findOrFail(1);
        //$photo = Photo::findOrFail(2);
        $outcome = $staff->photos()->update(['imageable_id'=>'5']);
        echo ($outcome) ? "Success" : "Failure";
    }
}
