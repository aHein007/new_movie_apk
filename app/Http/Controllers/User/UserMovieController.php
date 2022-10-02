<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Movie;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMovieController extends Controller
{
    public function userMoviedetail($id){

        $data =Movie::where("movie_id",$id)->first();

        return view("user.userMovieDetail")->with(["dataMovie" =>$data]);
    }

    public function postMessage(Request $request,$id){
        $dataUser =User::where("id",$id)->first();
        $getId =$dataUser->id;
        $data=$this->update($request,$getId);

        $postMessage =Contact::create($data);

        return redirect()->route("user#userPage")->with(["success"=>"Your suggestion is posted success!"]);

    }

    public function userSearch(Request $request){
        $categoryData =Category::get();
        $input =$request->search_movie;
        $data =Movie::where("movie_name","like","%".$input."%")->paginate(8);

        return view("user.userPage")->with(["dataMovie" =>$data,"category"=>$categoryData,"movieData"=>$data]);


    }

    public function userSearchCategory($id){
        $data =Movie::where("category_id",$id)->get();
        $categoryData =Category::get();
        return view("user.userPage")->with(["dataMovie" =>$data,"category"=>$categoryData,"movieData"=>$data]);
    }

    public function searchDate(Request $request){
        $start =$request->start;
        $end =$request->end;
        $data =Movie::get();
        $query =Movie::get();



        if(!is_null($start) && is_null($end)){
            $query =$query->where("created_at",">=",$start);
        }else if(is_null($start) && !is_null($end)){
            $query =$query->where("created_at","<=",$end);

        }else if(!is_null($start) && !is_null($end)){
            $query =$query->where("created_at",">=",$start)
                          ->where("created_at","<=",$end);

        }

        $categoryData =Category::get();
        return view("user.userPage")->with(["dataMovie" =>$query,"category"=>$categoryData,"movieData"=>$query]);
    }



    private function update($request,$data){
        $updateData =[
            "user_id"=>$data,
            "user_name"=>$request->name,
            "user_email"=>$request->email,
            "message"=>$request->message

        ];
        return $updateData;
    }


}
