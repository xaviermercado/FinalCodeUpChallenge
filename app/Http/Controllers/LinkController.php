<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Link;
use View;
use Illuminate\Support\Facades\Validator;
use Input;
use Session;
use Redirect;
use Auth;
use App\Vote;
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//FXMM 03/12/2015- In order to see all links, we make an index function
     
		$links=Link::all();
	  
	  
	  return View::make('links.index') ->with('links',$links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//FXMM 03/12/2015- In order to create links from users, we make a create function
         return View::make('links.create');
    }
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'LinkURL'       => 'required',
            'Description'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('links/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $link = new Link;
			
            $link->LinkURL       = Input::get('LinkURL');
            $link->Description      = Input::get('Description');
			$link->UserID = Input::get('UserID');
            $link->save();

            // redirect
            Session::flash('message', 'Successfully created Link!');
            return Redirect::to('links');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $link = Link::find($id);
            $link->Rating -=1;
            $link->save();

            // redirect
            Session::flash('message', 'Rating succesfully saved!');
            return Redirect::to('links');
    
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
		//FXMM 03-12-2015: In this part we're having the validations of voters
		$value=1;
       if($id<=0)
	   {
		   $value=-1;
		   $id=$id*-1;
		   
	   }
            //lets check if we already voted for this url.
			
			
			$link = Link::find($id);
            
			$CurrentUser=$request->user();
			
	        
			$votes = DB::table('uservotes')
                     ->select(DB::raw('count(*) as user_count'))
                     ->where('LinkID', '=', $link->id)
					 ->where('UserID', '=', $CurrentUser->id)
                     ->groupBy('UserID')
                     ->count();
			if($votes==0)
			{
			
			$link->Rating +=$value;
            $link->save();
			
			$vote = new  Vote;
			
            $vote->LinkID       = $link->id;
            $vote->UserID      = $CurrentUser->id;
			$vote->RatingValue = 1;
            $vote->save();
			//In case you haven't vote, the application will save your vote
			Session::flash('message', 'Rating succesfully saved! USER ID:'.$CurrentUser->id);
            	
				
			}
			else
				//In case you already vote, the application won't be able to save your vote.
				{
				Session::flash('message', 'Cant be saved, already voted! USER ID: '.$CurrentUser->id);
            	
					
				}
			
			
			

            // redirect
            return Redirect::to('links');
        
    }
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
            $link = Link::find($id);
            $link->Rating -=1;
            $link->save();

            // redirect
            Session::flash('message', 'Rating succesfully saved!');
            return Redirect::to('links');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
