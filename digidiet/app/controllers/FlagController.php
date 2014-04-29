<?php
/*
* FlagController handles flagging of content
*/
class FlagController extends BaseController{
	
	/*
	* this method is called when the user clicks the flag button
	*/
	public function flag(){

		//get data passed in from POST ajax request
		$data = Input::all();

		//perform check to make sure that an ajax request was made
		if(Request::ajax()){

			//add flag to database, post_id and user_did are unique
			//so that needs ot be checked before adding the flag
			$result = DB::table('flags')->where('post_id','=',$data['id'])
			->where('user_id','=',$data['user_id'])->get();

			//if there was no result, then add the flag to the DB
			if(!$result){
				
				Eloquent::unguard();
				Flag::create(array(
					'post_id' => $data['id'],
					'user_id' => $data['user_id'],
				));

				//return successful JSON response to page
				return Response::json(array(
				'success'=>true, 
				'post'=>$data['id'],
				'user'=>$data['user_id'],
				'query_result'=>$result
				));
			}
			else{
				
				return Response::json(array(
					'success'=>false, 
					'post'=>$data['id'],
					'user'=>$data['user_id'],
					'query_result'=>$result
				));	
			}		
			
		}
		else{ //no ajax request made, shouldn't be allowed to flag
			//return unsuccesful JSON response
			return Response::json(array(
				'success'=>false, 
				'post'=>$data['id'],
				'user'=>$data['user_id'] 
				));	
		}

	}


	public function index(){
		$flags = Flag::with('user', 'post.user')->get();
		return Response::json($flags);
	}

	public function destroy($id){
		
		$flag=Flag::find($id);
		Notification::create(array(
                'user_id'       => $flag->user_id,
                'link'          => 'profile',
                'icon'          => 'icon-bell',
                'acknowledged'  => FALSE,
                'content'       => "Dear ".$user->username. 
                                ", Your post has been removed.  Please contact us for more details."
        ));
		$flag->delete();

	}
}