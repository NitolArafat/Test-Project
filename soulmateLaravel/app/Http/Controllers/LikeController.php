<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception ;
use App\Likes;
//use DB;

class LikeController extends Controller
{
    public function likePerson(Request $request ) {
     // echo  $_GET['id'];
      //  print_r($requests) ;
       
//        DB::table('likes')->insert([
//            'request_person_id'       => $request->request_person_id,
//            'response_id'    => $request->response_id,
//            'request_status'    => 1,
//        ]); 
                    
  
    $check_like = \App\Likes::where('request_person_id',$request->response_id )
    ->where('response_id', $request->request_person_id)            
    ->first();
//echo '<pre>';
//print_r($check_like);
//    echo $request->request_person_id,'---------';
//    echo $request->response_id;
//    echo ' nnnnnnnnnnnnnnn';
    
    
    
        if($check_like==null){
            $like= new Likes();
            $like->request_person_id   = $request->request_person_id;
            $like->response_id         = $request->response_id;
            $like->request_status      =1;
             
           $like->save();
           return redirect('/person_detail/'.$request->request_person_id.'/'.$request->response_id  );
        }else{
            echo 'update';
           $query= Likes::find( $check_like->id);
          
           $query->request_status  =null;
           $query->match            =1 ;
           // echo '<pre>';
          //  print_r($query);
            $query->save();
            return redirect('/person_detail/'.$request->request_person_id.'/'.$request->response_id  )->with('message','Now Both are Friend');
        }
      //  $like->save();
        
       
        
    }
    public function dislikePerson(Request $request) {

        $like= new Likes();
       
        
       echo $like->request_person_ids       = $request->request_person_ids;
       echo $like->response_ids             = $request->response_ids;
      //  $like->request_status           =1;

        $query= Likes::find( $like->response_ids);
        
        echo '<pre>';
        echo '-----------';
        print_r($query);
        
      //  $like->save();
        
       // return redirect('/person_detail/'.$like->response_id )->with('message','You Like this Profile');
        
    }
}
