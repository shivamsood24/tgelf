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

		$firstname = Input::get('firstname');
		$lastname = Input::get('lastname');
		$username = Input::get('username');
		$uniquecode = Input::get('uniquecode');
		$password = Input::get('password');
		$personalemail = Input::get('personalemail');
		$professionalemail = Input::get('professionalemail');
		$countrycode = Input::get('countrycode');
		$contactno = Input::get('contactno');
		$fathername = Input::get('fathername');
		$countrycodefather = Input::get('countrycodefather');
		$contactnofather = Input::get('contactnofather');
		$mothername = Input::get('mothername');
		$countrycodemother = Input::get('countrycodemother');
		$contactnomother = Input::get('contactnomother');
		$paddressline1 = Input::get('paddressline1');
		$paddressline2 = Input::get('paddressline2');
		$pcity = Input::get('pcity');
		$pstate = Input::get('pstate');
		$pcode = Input::get('pcode');
		$pcountry = Input::get('pcountry');
		$caddressline1 = Input::get('caddressline1');
		$caddressline2 = Input::get('caddressline2');
		$ccity = Input::get('ccity');
		$cstate = Input::get('cstate');
		$ccode = Input::get('ccode');
		$ccountry = Input::get('ccountry');
		$fullname = Input::get('fullname');
		$company = Input::get('company');
		$position = Input::get('position');
		$bio = Input::get('bio');
		$key_skill = Input::get('key_skill');
		$funfact = Input::get('funfact');
		$linkedin = Input::get('linkedin');
		$youtube = Input::get('youtube');
		$github = Input::get('github');
		$behance = Input::get('behance');
		$academia = Input::get('academia');
		$key_interest1 = Input::get('key_interest1');
		$key_interest2 = Input::get('key_interest2');
		$key_interest3 = Input::get('key_interest3');


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
		'countrycodemother' => 'required',
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
			DB::transaction(function()
			{
				DB::table('users')->insert(array('firstname' => $firstname,'lastname' => $lastname,'username' => $username,'password' => $password,'uniquecode' => $uniquecode ));
				$results = DB::select('select * from users where username = ?', $username);
				DB::table('unique_codes')->update(array('used' => 1))->where('code' , $uniquecode);
				if (Input::file('image')->isValid()) {
			      $destinationPath = 'uploads/profile'; // upload path
			      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			      $fileName = rand(11111,99999).'.'.$extension; // renameing image
			      Input::file('image')->move($destinationPath, $fileName);
			      DB::table('userprofiles')->insert(array('user_id' => $results->id,'countrycode' => $countrycode,'contactno' => $contactno,'personalemail' => $personalemail,'professionalemail' => $professionalemail,'bio' => $bio,'fathername' => $fathername,'mothername' => $mothername,'photo' => $destinationPath.'/'.$fileName,'universitycompany' => $company,'majorposition' => $position,'funfact' => $funfact,'countrycodefather' => $countrycodefather,'contactnofather' => $contactnofather,'countrycodemother' => $countrycodemother,'contactnomother' => $contactnomother));

			  }
			  DB::table('user_addresses')->insert(array('user_id' => $results->id,'ispresent' => '1','addressline1' => $caddressline1,'addressline2' => $caddressline2,'city' => $ccity,'state' => $cstate,'country' => $ccountry,'pincode' => $ccode));
			  DB::table('user_addresses')->insert(array('user_id' => $results->id,'ispresent' => '0','addressline1' => $paddressline1,'addressline2' => $paddressline2,'city' => $pcity,'state' => $pstate,'country' => $pcountry,'pincode' => $pcode));
			  DB::table('userinterests')->insert(array('user_id' => $results->id,'isprimary' => '1','name' => $key_skill));
			  DB::table('userinterests')->insert(array('user_id' => $results->id,'isprimary' => '0','name' => $key_interest1));
			  DB::table('userinterests')->insert(array('user_id' => $results->id,'isprimary' => '0','name' => $key_interest2));
			  DB::table('userinterests')->insert(array('user_id' => $results->id,'isprimary' => '0','name' => $key_interest3));

			});
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