<?php
class ProfileController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function index(){
		return View::make('pages.signup');
	}
	public function checkval()
	{
    // process the form here
    // create the validation rules ------------------------
    $rules = array(
        'name'             => 'required',                        // just a normal required validation
        'email'            => 'required|email|unique:signup',     // required and must be unique in the ducks table
        'password'         => 'required',
        'password_confirm' => 'required|same:password'           // required and has to match the password field
    );
    // do the validation ----------------------------------
    // validate against the inputs from our form
    $validator = Validator::make(Input::all(), $rules);
    // check if the validator failed -----------------------
    if ($validator->fails()) {
        // get the error messages from the validator
        $messages = $validator->messages();
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('signup')
            ->withErrors($validator);
    } else {
        // validation successful ---------------------------
        // our duck has passed all tests!
        // let him enter the database
        // create the data for our duck
        $duck = new Duck;
        $duck->name     = Input::get('name');
        $duck->email    = Input::get('email');
        $duck->password = Hash::make(Input::get('password'));
        // save our duck
        $duck->save();
        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('signup');
    }
}
	

    //

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

    //temp 

    public function temp()
    {
        $title = "Temp";
        $data = array('title' => $title );
        return View::make('pages.temp',$data);
    }
}