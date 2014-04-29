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

		//check to ensure that an ajax request was made
		if(Request::ajax()){

			//add flag to database, 
			//checking first that the user has not flagged this content
			//by querying the database
			$result = DB::table('flags')
						->where('post_id','=',$data['id'])
						->where('user_id','=',$data['user_id'])
						->where('post_type', '=',$data['post_type'])
						->get();

			//if there was no result, then add the flag to the DB
			if(!$result){
				
				Eloquent::unguard();
				Flag::create(array(
					'post_id' => $data['id'],
					'user_id' => $data['user_id'],
					'post_type' => $data['post_type']
				));

				//return successful JSON response to page
				return Response::json(array(
				'success'=>true, 
				'post'=>$data['id'],
				'user'=>$data['user_id'],
				'post_type' => $data['post_type'],
				'query_result'=>$result
				));
			}
			else{
				
				return Response::json(array(
					'success'=>false, 
					'post'=>$data['id'],
					'user'=>$data['user_id'],
					'post_type' => $data['post_type'],
					'query_result'=>$result
				));	
			}		
			
		}
		else{ //no ajax request made, shouldn't be allowed to flag
			//return unsuccesful JSON response
			return Response::json(array(
				'success'=>false, 
				'post'=>$data['id'],
				'user'=>$data['user_id'],
				'post_type' => $data['post_type'] 
				));	
		}

	}


	public function index(){
		$flags = Flag::with('user', 'post.user', 'recipe.user')->get();
		return Response::json($flags);
	}

	public function destroy($id){
		
		$flag=Flag::find($id);
		$user=User::find($flag->user_id);
		$flag->delete();

	}
}