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
		$password = Hash::make(Input::get('password'));
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
		$twitter = Input::get('twitter');
		$behance = Input::get('behance');
		$academia = Input::get('academia');
		$key_interest1 = Input::get('key_interest1');
		$key_interest2 = Input::get('key_interest2');
		$key_interest3 = Input::get('key_interest3');


		$rules = [
		'username' => 'required',
		'password' => 'required||between:4,15',
		'confirmpassword' => 'required||between:4,15',
		'uniquecode' => 'required',
		'firstname' => 'required',
		'lastname' => 'required',
		'personalemail' => 'required|email',
		'professionalemail' => 'email',
		'countrycode' => 'required',
		'contactno' => 'required|min:10|max:10',
		'contactnofather' => 'min:10|max:10',
		'contactnomother' => 'min:10|max:10',
		'paddressline1' => 'required||max:40',
		'paddressline2' => 'required|:max:40',
		'pcity' => 'required',
		'pstate' => 'required',
		'pcode' => 'required|numeric',
		'pcountry' => 'required',
		'caddressline1' => 'required||max:40',
		'caddressline2' => 'required|:max:40',
		'ccity' => 'required',
		'cstate' => 'required',
		'ccode' => 'required|numeric',
		'ccountry' => 'required',
		'lastname' => 'required',
		'company' => 'required',
		'position' => 'required',
		'bio' => 'required|max:500',
		'key_skill' => 'required',
		'funfact' => 'required|max:200',
		'twitter' => 'required|url',
		'linkedin' => 'required|url',
		'youtube' => 'required|url',
		'github' => 'required|url',
		'behance' => 'required|url',
		'academia' => 'required|url',
		'key_interest1' => 'required',
		'key_interest2' => 'required',
		'key_interest3' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			
				$id = DB::table('users')->insertGetId(array('firstname' => $firstname,'lastname' => $lastname,'username' => $username,'password' => $password,'uniquecode' => $uniquecode ));
				DB::table('unique_codes')->where('code', $uniquecode)->update(array('used' => 1));
				
				if (Input::file('image')->isValid()) {
			      $destinationPath = 'uploads/profile'; // upload path
			      $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			      $fileName = rand(11111,99999).'.'.$extension; // renameing image
			      Input::file('image')->move($destinationPath, $fileName);
			      DB::table('user_profiles')->insert(array('user_id' => $id,'countrycode' => $countrycode,'contactno' => $contactno,'personalemail' => $personalemail,'professionalemail' => $professionalemail,'bio' => $bio,'fathername' => $fathername,'mothername' => $mothername,'photo' => $destinationPath.'/'.$fileName,'universitycompany' => $company,'majorposition' => $position,'funfact' => $funfact,'countrycodefather' => $countrycodefather,'contactnofather' => $contactnofather,'countrycodemother' => $countrycodemother,'contactnomother' => $contactnomother));

			  }
			  DB::table('user_addresses')->insert(array('user_id' => $id,'ispresent' => '1','addressline1' => $caddressline1,'addressline2' => $caddressline2,'city' => $ccity,'state' => $cstate,'country' => $ccountry,'pincode' => $ccode));
			  DB::table('user_addresses')->insert(array('user_id' => $id,'ispresent' => '0','addressline1' => $paddressline1,'addressline2' => $paddressline2,'city' => $pcity,'state' => $pstate,'country' => $pcountry,'pincode' => $pcode));
			  DB::table('user_interests')->insert(array('user_id' => $id,'isprimary' => '1','name' => $key_skill));
			  DB::table('user_interests')->insert(array('user_id' => $id,'isprimary' => '0','name' => $key_interest1));
			  DB::table('user_interests')->insert(array('user_id' => $id,'isprimary' => '0','name' => $key_interest2));
			  DB::table('user_interests')->insert(array('user_id' => $id,'isprimary' => '0','name' => $key_interest3));
			  DB::table('social_links')->insert(array('user_id' => $id,'twitter' => $twitter,'linkedin' => $linkedin,'youtube' => $youtube,'github' => $github,'academia' => $academia,'behance' => $behance));

			return Redirect::to('/profile/'.$username);
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