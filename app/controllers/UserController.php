<?php

/**
* 
*/
class UserController extends BaseController
{
	

	public function index()
	{
		$title = "TGelf - Register Page";
		
		return View::make('pages.register',array('title'=> $title));
	}
	public function createuser(){

		$credentials = [
		'username' => Input::get('username'),
		'password' => Input::get('password'),
		'confirmpassword' => Input::get('confirmpassword'),
		'uniquecode' => Input::get('uniquecode')
		];
		
		$rules = [
		'username' => 'required|alpha',
		'password' => 'required|alpha_num|between:4,15|confirmed',
		'confirmpassword' => 'required|alpha_num|between:4,15',
		'uniquecode' => 'required|alpha',
		'firstname' => 'required|alpha',
		'lastname' => 'required|alpha',
		'personalemail' => 'required|email',
		'professionalemail' => 'required|email',
		'countrycode' => 'required',
		'contactno' => 'required|min:10|max:10',
		'fathername' => 'required|alpha',
		'countrycodefather' => 'required',
		'contactnofather' => 'required|min:10|max:10',
		'mothername' => 'required|alpha',
		'countrycodefather' => 'required',
		'contactnomother' => 'required|min:10|max:10',
		'paddressline1' => 'required|alpha|max:40',
		'paddressline2' => 'required|alpha:max:40',
		'pcity' => 'required|alpha',
		'pstate' => 'required|alpha',
		'pcode' => 'required|numeric',
		'pcountry' => 'required|alpha',
		'caddressline1' => 'required|alpha|max:40',
		'caddressline2' => 'required|alpha:max:40',
		'ccity' => 'required|alpha',
		'cstate' => 'required|alpha',
		'ccode' => 'required|numeric',
		'ccountry' => 'required|alpha',
		'lastname' => 'required|alpha',
		'company' => 'required|alpha',
		'position' => 'required|alpha',
		'bio' => 'required|max:300',
		'key_skill' => 'required',
		'funfact' => 'required|max:100',
		'twitter' => 'required|url',
		'linkedin' => 'required|url',
		'youtube' => 'required|url',
		'github' => 'required|url',
		'behance' => 'required|url',
		'academia' => 'required|url',
		'key_interest1' => 'required|url',
		'key_interest2' => 'required|url',
		'key_interest3' => 'required|url'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			//return Redirect::to('success');
			DB::beginTransaction()

			try {
    // Validate, then create if valid
				$newAcct = Account::create( ['accountname' => Input::get('accountname')] );
			} catch(ValidationException $e)
			{
    // Rollback and then redirect
    // back to form with errors
				DB::rollback();
				return Redirect::to('/form')
				->withErrors( $e->getErrors() )
				->withInput();
			} catch(\Exception $e)
			{
				DB::rollback();
				throw $e;
			}

			try {
    // Validate, then create if valid
				$newUser = User::create([
					'username' => Input::get('username'),
					'account_id' => $newAcct->id
					]);
			} catch(ValidationException $e)
			{
    // Rollback and then redirect
    // back to form with errors
				DB::rollback();
				return Redirect::to('/form')
				->withErrors( $e->getErrors() )
				->withInput();
			} catch(\Exception $e)
			{
				DB::rollback();
				throw $e;
			}

// If we reach here, then
// data is valid and working.
// Commit the queries!
			DB::commit();
		}
		else
		{
			return Redirect::to('register')->withErrors($validator,'login')->withInput(Input::except('password','confirmpassword'));
		}

	}

	public function profile($username)
	{
		$title = "TGelf - User Profile Page";
		$user = User::where('username',$username)->first();
		$data = array(
			'title' => $title,
			'username' => $user
			);
		return View::make('pages.userprofile',$data);
	}


	public function checkusername()
	{
		$username = Input::get('username');
		$result = User::where('username',$username)->first();
		//return $result;
		if ($result){
			return "true";
		}
		
		else {
			return "false";
		}
	}

	public function checkcode()
	{
		$codecheck = Input::get('codecheck');
		$result = UniqueCode::where('code',$codecheck)->where('used',1)->first();
		//return $result;
		if ($result){
			return "true"; //code is valid and used
		}
		
		else {
			$result1 = UniqueCode::where('code',$codecheck)->first();
			if($result1){
				return "valid"; //code is valid
			}
			else
			{
				return "false"; // code is invalid
			}
		}
	}

}