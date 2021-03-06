@extends('layouts.master')
@section('content')

<div class="container login-container">
	<h1 id="" style="text-align: center;margin-bottom: 30px"><span id="war-header-inner" style="color:#A83334">REGISTER</span></h1>
	{{ Form::open(array('url' => 'createuser','method' => 'post','autocomplete' => 'off','id' => 'registerform','files' => true)) }}
	<ul id="progressbar">
		<li class="l1 active">Account Setup</li>
		<li class="l2">Social Profiles</li>
		<li class="l3">Personal Details</li>
	</ul>
	<fieldset class="f1">
		<div class="row col-md-4 col-md-offset-4 ">
			<span class="warlock-error" id="generalerror">{{$errors->login->first('username')}}</span>
			{{Form::text('username', '', array('class' => 'form-control','data-valid' => '0','id'=> 'usercheck','placeholder' => 'USER NAME'))}}
			<span class="warlock-error" id="usernameerror">{{$errors->login->first('username')}}</span>
			<br>
			{{ Form::password('password', array('class' => 'form-control','id'=> 'password','placeholder' => 'PASSWORD'))}}
			<span class="warlock-error">{{$errors->login->first('password')}}</span>
			<br>
			{{ Form::password('confirmpassword', array('class' => 'form-control','id'=> 'confirmpassword','placeholder' => 'CONFIRM PASSWORD'))}}
			<span class="warlock-error" id="passworderror">{{$errors->login->first('confirmpassword')}}</span>
			<br>
			<div></div>
			{{Form::text('uniquecode', '', array('class' => 'form-control','data-valid' => '0','id'=> 'codecheck','placeholder' => 'VERIFICATION CODE'))}}
			<span class="warlock-error" id="codeerror">{{$errors->login->first('uniquecode')}}</span>
			<br>
			{{ Form::button('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1','disabled','true'))}}
		</div>
	</fieldset>
	<fieldset class="f2">
		<div class="row">
			<div class="col-md-3">
				<div class="warlock-inline-head" >PERSONAL INFO</div>
				<div class="warlock-inline">
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','id' => 'firstname','placeholder' => 'FIRST NAME'))}}
					<span class="warlock-error" id="firstnameerror">{{$errors->login->first('firstname')}}</span>
					{{Form::text('lastname', '', array('class' => 'form-control warlock-right','id' => 'lastname','placeholder' => 'LAST NAME'))}}
					<span class="warlock-error" id="lastnameerror">{{$errors->login->first('lastname')}}</span>
				</div>
				<br>
				{{ Form::email('personalemail','', array('class' => 'form-control','id' => 'personalemail','placeholder' => 'EMAIL ADDRESS(PERSONAL)'))}}
				<span class="warlock-error" id="personalemailerror">{{$errors->login->first('personalemail')}}</span>
				<br>
				{{ Form::email('professionalemail','', array('class' => 'form-control','placeholder' => 'EMAIL ADDRESS(PROFESSIONAL)'))}}
				<span class="warlock-error" id="professionalemailerror">{{$errors->login->first('professionalemail')}}</span>
				<br>
				<div>
					<div class="col-md-4 warlock-clear">
						{{Form::select('countrycode',array('' => 'Select Code',
							'91' => '+91',
							'7' => '+7',
							'20' => '+20',
							'27' => '+27',
							'30' => '+30',
							'31' => '+31',
							'32' => '+32',
							'33' => '+33',
							'34' => '+34',
							'36' => '+36',
							'39' => '+39',
							'40' => '+40',
							'41' => '+41',
							'43' => '+43',
							'44' => '+44',
							'45' => '+45',
							'46' => '+46',
							'47' => '+47',
							'48' => '+48',
							'49' => '+49',
							'51' => '+51',
							'52' => '+52',
							'53' => '+53',
							'54' => '+54',
							'55' => '+55',
							'56' => '+56',
							'57' => '+57',
							'58' => '+58',
							'60' => '+60',
							'61' => '+61',
							'62' => '+62',
							'63' => '+63',
							'64' => '+64',
							'65' => '+65',
							'66' => '+66',
							'81' => '+81',
							'82' => '+82',
							'84' => '+84',
							'86' => '+86',
							'90' => '+90',
							'92' => '+92',
							'93' => '+93',
							'94' => '+94',
							'95' => '+95',
							'98' => '+98',
							'211' => '+211',
							'212' => '+212',
							'213' => '+213',
							'216' => '+216',
							'218' => '+218',
							'220' => '+220',
							'221' => '+221',
							'222' => '+222',
							'223' => '+223',
							'224' => '+224',
							'225' => '+225',
							'226' => '+226',
							'227' => '+227',
							'228' => '+228',
							'229' => '+229',
							'230' => '+230',
							'231' => '+231',
							'232' => '+232',
							'233' => '+233',
							'234' => '+234',
							'235' => '+235',
							'236' => '+236',
							'237' => '+237',
							'238' => '+238',
							'239' => '+239',
							'240' => '+240',
							'241' => '+241',
							'242' => '+242',
							'243' => '+243',
							'244' => '+244',
							'245' => '+245',
							'246' => '+246',
							'247' => '+247',
							'248' => '+248',
							'249' => '+249',
							'250' => '+250',
							'251' => '+251',
							'252' => '+252',
							'253' => '+253',
							'254' => '+254',
							'255' => '+255',
							'256' => '+256',
							'257' => '+257',
							'258' => '+258',
							'260' => '+260',
							'261' => '+261',
							'262' => '+262',
							'262' => '+262',
							'263' => '+263',
							'264' => '+264',
							'265' => '+265',
							'266' => '+266',
							'267' => '+267',
							'268' => '+268',
							'269' => '+269',
							'290' => '+290',
							'291' => '+291',
							'297' => '+297',
							'298' => '+298',
							'299' => '+299',
							'350' => '+350',
							'351' => '+351',
							'352' => '+352',
							'353' => '+353',
							'354' => '+354',
							'355' => '+355',
							'356' => '+356',
							'357' => '+357',
							'358' => '+358',
							'359' => '+359',
							'370' => '+370',
							'371' => '+371',
							'372' => '+372',
							'373' => '+373',
							'374' => '+374',
							'375' => '+375',
							'376' => '+376',
							'377' => '+377',
							'378' => '+378',
							'379' => '+379',
							'380' => '+380',
							'381' => '+381',
							'382' => '+382',
							'385' => '+385',
							'386' => '+386',
							'387' => '+387',
							'389' => '+389',
							'420' => '+420',
							'421' => '+421',
							'423' => '+423',
							'500' => '+500',
							'501' => '+501',
							'502' => '+502',
							'503' => '+503',
							'504' => '+504',
							'505' => '+505',
							'506' => '+506',
							'507' => '+507',
							'508' => '+508',
							'509' => '+509',
							'590' => '+590',
							'590' => '+590',
							'590' => '+590',
							'591' => '+591',
							'592' => '+592',
							'593' => '+593',
							'594' => '+594',
							'595' => '+595',
							'596' => '+596',
							'597' => '+597',
							'598' => '+598',
							'599' => '+599',
							'599' => '+599',
							'670' => '+670',
							'673' => '+673',
							'674' => '+674',
							'675' => '+675',
							'676' => '+676',
							'677' => '+677',
							'678' => '+678',
							'679' => '+679',
							'680' => '+680',
							'681' => '+681',
							'682' => '+682',
							'683' => '+683',
							'685' => '+685',
							'686' => '+686',
							'687' => '+687',
							'688' => '+688',
							'689' => '+689',
							'690' => '+690',
							'691' => '+691',
							'692' => '+692',
							'850' => '+850',
							'852' => '+852',
							'853' => '+853',
							'855' => '+855',
							'856' => '+856',
							'870' => '+870',
							'880' => '+880',
							'886' => '+886',
							'960' => '+960',
							'961' => '+961',
							'962' => '+962',
							'963' => '+963',
							'964' => '+964',
							'965' => '+965',
							'966' => '+966',
							'967' => '+967',
							'968' => '+968',
							'970' => '+970',
							'971' => '+971',
							'972' => '+972',
							'973' => '+973',
							'974' => '+974',
							'975' => '+975',
							'976' => '+976',
							'977' => '+977',
							'992' => '+992',
							'993' => '+993',
							'994' => '+994',
							'995' => '+995',
							'996' => '+996',
							'998' => '+998',
							'6723' => '+6723'
							), null,array('class' => 'form-control','id' => 'countrycode'))}}
						</div>
						<div class="col-md-8 warlock-clear">
							{{Form::text('contactno', '', array('class' => 'form-control','id' => 'contactno','placeholder' => 'NUMBER'))}}
						</div>
						<span class="warlock-error" id="contactnoerror">{{$errors->login->first('contactno')}}</span>
					</div>

					<br>
				</div>
				<div class="col-md-3">
					<div class="warlock-inline-head">PARENTAL INFO (OPTIONAL)</div>
					{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
					<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
					<br>
					<div>
						<div class="col-md-4 warlock-clear">
							{{Form::select('countrycodefather',array('' => 'Select Code',
								'91' => '+91',
								'7' => '+7',
								'20' => '+20',
								'27' => '+27',
								'30' => '+30',
								'31' => '+31',
								'32' => '+32',
								'33' => '+33',
								'34' => '+34',
								'36' => '+36',
								'39' => '+39',
								'40' => '+40',
								'41' => '+41',
								'43' => '+43',
								'44' => '+44',
								'45' => '+45',
								'46' => '+46',
								'47' => '+47',
								'48' => '+48',
								'49' => '+49',
								'51' => '+51',
								'52' => '+52',
								'53' => '+53',
								'54' => '+54',
								'55' => '+55',
								'56' => '+56',
								'57' => '+57',
								'58' => '+58',
								'60' => '+60',
								'61' => '+61',
								'62' => '+62',
								'63' => '+63',
								'64' => '+64',
								'65' => '+65',
								'66' => '+66',
								'81' => '+81',
								'82' => '+82',
								'84' => '+84',
								'86' => '+86',
								'90' => '+90',
								'92' => '+92',
								'93' => '+93',
								'94' => '+94',
								'95' => '+95',
								'98' => '+98',
								'211' => '+211',
								'212' => '+212',
								'213' => '+213',
								'216' => '+216',
								'218' => '+218',
								'220' => '+220',
								'221' => '+221',
								'222' => '+222',
								'223' => '+223',
								'224' => '+224',
								'225' => '+225',
								'226' => '+226',
								'227' => '+227',
								'228' => '+228',
								'229' => '+229',
								'230' => '+230',
								'231' => '+231',
								'232' => '+232',
								'233' => '+233',
								'234' => '+234',
								'235' => '+235',
								'236' => '+236',
								'237' => '+237',
								'238' => '+238',
								'239' => '+239',
								'240' => '+240',
								'241' => '+241',
								'242' => '+242',
								'243' => '+243',
								'244' => '+244',
								'245' => '+245',
								'246' => '+246',
								'247' => '+247',
								'248' => '+248',
								'249' => '+249',
								'250' => '+250',
								'251' => '+251',
								'252' => '+252',
								'253' => '+253',
								'254' => '+254',
								'255' => '+255',
								'256' => '+256',
								'257' => '+257',
								'258' => '+258',
								'260' => '+260',
								'261' => '+261',
								'262' => '+262',
								'262' => '+262',
								'263' => '+263',
								'264' => '+264',
								'265' => '+265',
								'266' => '+266',
								'267' => '+267',
								'268' => '+268',
								'269' => '+269',
								'290' => '+290',
								'291' => '+291',
								'297' => '+297',
								'298' => '+298',
								'299' => '+299',
								'350' => '+350',
								'351' => '+351',
								'352' => '+352',
								'353' => '+353',
								'354' => '+354',
								'355' => '+355',
								'356' => '+356',
								'357' => '+357',
								'358' => '+358',
								'359' => '+359',
								'370' => '+370',
								'371' => '+371',
								'372' => '+372',
								'373' => '+373',
								'374' => '+374',
								'375' => '+375',
								'376' => '+376',
								'377' => '+377',
								'378' => '+378',
								'379' => '+379',
								'380' => '+380',
								'381' => '+381',
								'382' => '+382',
								'385' => '+385',
								'386' => '+386',
								'387' => '+387',
								'389' => '+389',
								'420' => '+420',
								'421' => '+421',
								'423' => '+423',
								'500' => '+500',
								'501' => '+501',
								'502' => '+502',
								'503' => '+503',
								'504' => '+504',
								'505' => '+505',
								'506' => '+506',
								'507' => '+507',
								'508' => '+508',
								'509' => '+509',
								'590' => '+590',
								'590' => '+590',
								'590' => '+590',
								'591' => '+591',
								'592' => '+592',
								'593' => '+593',
								'594' => '+594',
								'595' => '+595',
								'596' => '+596',
								'597' => '+597',
								'598' => '+598',
								'599' => '+599',
								'599' => '+599',
								'670' => '+670',
								'673' => '+673',
								'674' => '+674',
								'675' => '+675',
								'676' => '+676',
								'677' => '+677',
								'678' => '+678',
								'679' => '+679',
								'680' => '+680',
								'681' => '+681',
								'682' => '+682',
								'683' => '+683',
								'685' => '+685',
								'686' => '+686',
								'687' => '+687',
								'688' => '+688',
								'689' => '+689',
								'690' => '+690',
								'691' => '+691',
								'692' => '+692',
								'850' => '+850',
								'852' => '+852',
								'853' => '+853',
								'855' => '+855',
								'856' => '+856',
								'870' => '+870',
								'880' => '+880',
								'886' => '+886',
								'960' => '+960',
								'961' => '+961',
								'962' => '+962',
								'963' => '+963',
								'964' => '+964',
								'965' => '+965',
								'966' => '+966',
								'967' => '+967',
								'968' => '+968',
								'970' => '+970',
								'971' => '+971',
								'972' => '+972',
								'973' => '+973',
								'974' => '+974',
								'975' => '+975',
								'976' => '+976',
								'977' => '+977',
								'992' => '+992',
								'993' => '+993',
								'994' => '+994',
								'995' => '+995',
								'996' => '+996',
								'998' => '+998',
								'6723' => '+6723'
								), null,array('class' => 'form-control'))}}
								<br>
							</div>
							<div class="col-md-8 warlock-clear">
								{{Form::text('contactnofather', '', array('class' => 'form-control','placeholder' => 'NUMBER'))}}
								<br>
							</div>
						</div>
						<br>
						<span class="warlock-error">{{$errors->login->first('contactnofather')}}</span>
						{{Form::text('mothername', '', array('class' => 'form-control','placeholder' => 'MOTHERS NAME'))}}
						<span class="warlock-error">{{$errors->login->first('mothername')}}</span>
						<br>
						<div>
							<div class="col-md-4 warlock-clear">
								{{Form::select('countrycodemother',array('' => 'Select Code',
									'91' => '+91',
									'7' => '+7',
									'20' => '+20',
									'27' => '+27',
									'30' => '+30',
									'31' => '+31',
									'32' => '+32',
									'33' => '+33',
									'34' => '+34',
									'36' => '+36',
									'39' => '+39',
									'40' => '+40',
									'41' => '+41',
									'43' => '+43',
									'44' => '+44',
									'45' => '+45',
									'46' => '+46',
									'47' => '+47',
									'48' => '+48',
									'49' => '+49',
									'51' => '+51',
									'52' => '+52',
									'53' => '+53',
									'54' => '+54',
									'55' => '+55',
									'56' => '+56',
									'57' => '+57',
									'58' => '+58',
									'60' => '+60',
									'61' => '+61',
									'62' => '+62',
									'63' => '+63',
									'64' => '+64',
									'65' => '+65',
									'66' => '+66',
									'81' => '+81',
									'82' => '+82',
									'84' => '+84',
									'86' => '+86',
									'90' => '+90',
									'92' => '+92',
									'93' => '+93',
									'94' => '+94',
									'95' => '+95',
									'98' => '+98',
									'211' => '+211',
									'212' => '+212',
									'213' => '+213',
									'216' => '+216',
									'218' => '+218',
									'220' => '+220',
									'221' => '+221',
									'222' => '+222',
									'223' => '+223',
									'224' => '+224',
									'225' => '+225',
									'226' => '+226',
									'227' => '+227',
									'228' => '+228',
									'229' => '+229',
									'230' => '+230',
									'231' => '+231',
									'232' => '+232',
									'233' => '+233',
									'234' => '+234',
									'235' => '+235',
									'236' => '+236',
									'237' => '+237',
									'238' => '+238',
									'239' => '+239',
									'240' => '+240',
									'241' => '+241',
									'242' => '+242',
									'243' => '+243',
									'244' => '+244',
									'245' => '+245',
									'246' => '+246',
									'247' => '+247',
									'248' => '+248',
									'249' => '+249',
									'250' => '+250',
									'251' => '+251',
									'252' => '+252',
									'253' => '+253',
									'254' => '+254',
									'255' => '+255',
									'256' => '+256',
									'257' => '+257',
									'258' => '+258',
									'260' => '+260',
									'261' => '+261',
									'262' => '+262',
									'262' => '+262',
									'263' => '+263',
									'264' => '+264',
									'265' => '+265',
									'266' => '+266',
									'267' => '+267',
									'268' => '+268',
									'269' => '+269',
									'290' => '+290',
									'291' => '+291',
									'297' => '+297',
									'298' => '+298',
									'299' => '+299',
									'350' => '+350',
									'351' => '+351',
									'352' => '+352',
									'353' => '+353',
									'354' => '+354',
									'355' => '+355',
									'356' => '+356',
									'357' => '+357',
									'358' => '+358',
									'359' => '+359',
									'370' => '+370',
									'371' => '+371',
									'372' => '+372',
									'373' => '+373',
									'374' => '+374',
									'375' => '+375',
									'376' => '+376',
									'377' => '+377',
									'378' => '+378',
									'379' => '+379',
									'380' => '+380',
									'381' => '+381',
									'382' => '+382',
									'385' => '+385',
									'386' => '+386',
									'387' => '+387',
									'389' => '+389',
									'420' => '+420',
									'421' => '+421',
									'423' => '+423',
									'500' => '+500',
									'501' => '+501',
									'502' => '+502',
									'503' => '+503',
									'504' => '+504',
									'505' => '+505',
									'506' => '+506',
									'507' => '+507',
									'508' => '+508',
									'509' => '+509',
									'590' => '+590',
									'590' => '+590',
									'590' => '+590',
									'591' => '+591',
									'592' => '+592',
									'593' => '+593',
									'594' => '+594',
									'595' => '+595',
									'596' => '+596',
									'597' => '+597',
									'598' => '+598',
									'599' => '+599',
									'599' => '+599',
									'670' => '+670',
									'673' => '+673',
									'674' => '+674',
									'675' => '+675',
									'676' => '+676',
									'677' => '+677',
									'678' => '+678',
									'679' => '+679',
									'680' => '+680',
									'681' => '+681',
									'682' => '+682',
									'683' => '+683',
									'685' => '+685',
									'686' => '+686',
									'687' => '+687',
									'688' => '+688',
									'689' => '+689',
									'690' => '+690',
									'691' => '+691',
									'692' => '+692',
									'850' => '+850',
									'852' => '+852',
									'853' => '+853',
									'855' => '+855',
									'856' => '+856',
									'870' => '+870',
									'880' => '+880',
									'886' => '+886',
									'960' => '+960',
									'961' => '+961',
									'962' => '+962',
									'963' => '+963',
									'964' => '+964',
									'965' => '+965',
									'966' => '+966',
									'967' => '+967',
									'968' => '+968',
									'970' => '+970',
									'971' => '+971',
									'972' => '+972',
									'973' => '+973',
									'974' => '+974',
									'975' => '+975',
									'976' => '+976',
									'977' => '+977',
									'992' => '+992',
									'993' => '+993',
									'994' => '+994',
									'995' => '+995',
									'996' => '+996',
									'998' => '+998',
									'6723' => '+6723'
									), null,array('class' => 'form-control'))}}
								</div>
								<div class="col-md-8 warlock-clear">
									{{Form::text('contactnomother', '', array('class' => 'form-control','placeholder' => 'NUMBER'))}}
								</div>
								<span class="warlock-error">{{$errors->login->first('contactnomother')}}</span>
							</div>
							<br>
						</div>
						<div class="col-md-3">
							<div class="warlock-inline-head">PERMANENT ADDRESS (OPTIONAL)</div>
							{{Form::text('paddressline1', '', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 1'))}}
							<br>
							<span class="warlock-error">{{$errors->login->first('paddressline1')}}</span>

							{{ Form::text('paddressline2','', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 2'))}}
							<br>
							<span class="warlock-error">{{$errors->login->first('paddressline2')}}</span>
							<div class="warlock-inline">
								{{Form::text('pcity', '', array('class' => 'form-control warlock-left','placeholder' => 'CITY'))}}
								<span class="warlock-error">{{$errors->login->first('pcity')}}</span>
								{{Form::text('pstate', '', array('class' => 'form-control warlock-right','placeholder' => 'STATE'))}}
								<span class="warlock-error">{{$errors->login->first('pstate')}}</span>
							</div>
							<br>
							<div class="warlock-inline">
								{{Form::text('pcode', '', array('class' => 'form-control warlock-left','placeholder' => 'PIN CODE'))}}
								<span class="warlock-error">{{$errors->login->first('pcode')}}</span>
								{{Form::select('pcountry',array('' => 'Select Country',
									'Afghanistan' => 'Afghanistan',
									'Albania' => 'Albania',
									'Algeria' => 'Algeria',
									'Andorra' => 'Andorra',
									'Angola' => 'Angola',
									'Antigua and Barbuda' => 'Antigua and Barbuda',
									'Argentina' => 'Argentina',
									'armenia' => 'Armenia',
									'Australia' => 'Australia',
									'Austria' => 'Austria',
									'Azerbaijan' => 'Azerbaijan',
									'Bahamas' => 'Bahamas',
									'Bahrain' => 'Bahrain',
									'Bangladesh' => 'Bangladesh',
									'Barbados' => 'Barbados',
									'Belarus' => 'Belarus',
									'Belgium' => 'Belgium',
									'Belize' => 'Belize',
									'Benin' => 'Benin',
									'Bhutan' => 'Bhutan',
									'Bolivia' => 'Bolivia',
									'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
									'Botswana' => 'Botswana',
									'Brazil' => 'Brazil',
									'Brunei' => 'Brunei',
									'Bulgaria' => 'Bulgaria',
									'Burkina Faso' => 'Burkina Faso',
									'Burundi' => 'Burundi',
									'Cabo Verde' => 'Cabo Verde',
									'Cambodia' => 'Cambodia',
									'Cameroon' => 'Cameroon',
									'Canada' => 'Canada',
									'Central African Republic' => 'Central African Republic',
									'Chad' => 'Chad',
									'Chile' => 'Chile',
									'China' => 'China',
									'Colombia' => 'Colombia',
									'Comoros' => 'Comoros',
									'Cook Islands' => 'Cook Islands',
									'Costa Rica' => 'Costa Rica',
									'Croatia' => 'Croatia',
									'Cuba' => 'Cuba',
									'Cyprus' => 'Cyprus',
									'Czech Republic' => 'Czech Republic',
									'Denmark' => 'Denmark',
									'Ecuador' => 'Ecuador',
									'Egypt' => 'Egypt',
									'Estonia' => 'Estonia',
									'Ethiopia' => 'Ethiopia',
									'Fiji' => 'Fiji',
									'Finland' => 'Finland',
									'France' => 'France',
									'Georgia' => 'Georgia',
									'Germany' => 'Germany',
									'Ghana' => 'Ghana',
									'Greece' => 'Greece',
									'Guatemala' => 'Guatemala',
									'Guinea' => 'Guinea',
									'Guyana' => 'Guyana',
									'Hungary' => 'Hungary',
									'Iceland' => 'Iceland',
									'India' => 'India',
									'Indonesia' => 'Indonesia',
									'Iran' => 'Iran',
									'Iraq' => 'Iraq',
									'Ireland' => 'Ireland',
									'Israel' => 'Israel',
									'Italy' => 'Italy',
									'Jamaica' => 'Jamaica',
									'Japan' => 'Japan',
									'Jordan' => 'Jordan',
									'Kazakhstan' => 'Kazakhstan',
									'Kenya' => 'Kenya',
									'Kuwait' => 'Kuwait',
									'Laos' => 'Laos',
									'Liberia' => 'Liberia',
									'Luxembourg' => 'Luxembourg',
									'Libya' => 'Libya',
									'Malaysia' => 'Malaysia',
									'Maldives' => 'Maldives',
									'Mauritius' => 'Mauritius',
									'Mexico' => 'Mexico',
									'Monaco' => 'Monaco',
									'Mongolia' => 'Mongolia',
									'Morocco' => 'Morocco',
									'Myanmar ' => 'Myanmar ',
									'Namibia' => 'Namibia',
									'Nepal' => 'Nepal',
									'Netherlands' => 'Netherlands',
									'New_Zealand' => 'New Zealand',
									'Nigeria' => 'Nigeria',
									'North_Korea' => 'North Korea',
									'Norway' => 'Norway',
									'Pakistan' => 'Pakistan',
									'Panama' => 'Panama',
									'Philippines' => 'Philippines',
									'Poland' => 'Poland',
									'Portugal' => 'Portugal',
									'Qatar' => 'Qatar',
									'Romania' => 'Romania',
									'Russia' => 'Russia',
									'Rwanda' => 'Rwanda',
									'Saudi_Arabia' => 'Saudi Arabia',
									'Serbia' => 'Serbia',
									'Singapore' => 'Singapore',
									'South_Africa' => 'South Africa',
									'Spain' => 'Spain',
									'Sri_Lanka' => 'Sri Lanka',
									'Sweden' => 'Sweden',
									'Switzerland' => 'Switzerland',
									'Taiwan' => 'Taiwan',
									'Thailand' => 'Thailand',
									'Turkey' => 'Turkey',
									'UK' => 'UK',
									'USA' => 'USA',
									'Vietnam' => 'Vietnam',
									'Zimbabwe' => 'Zimbabwe'

									), null,array('class' => 'form-control'))}}
									<span class="warlock-error">{{$errors->login->first('pcountry')}}</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="warlock-inline-head">PRESENT ADDRESS</div>
								{{Form::text('caddressline1', '', array('class' => 'form-control','id' => 'caddressline1','placeholder' => 'ADDRESS LINE 1'))}}
								<span class="warlock-error" id="caddressline1error">{{$errors->login->first('caddressline1')}}</span>
								<br>
								{{ Form::text('caddressline2','', array('class' => 'form-control','id' => 'caddressline2','placeholder' => 'ADDRESS LINE 2'))}}
								<span class="warlock-error" id="caddressline2error">{{$errors->login->first('caddressline2')}}</span>
								<br>
								<div class="warlock-inline">
									{{Form::text('ccity', '', array('class' => 'form-control warlock-left','id' => 'ccity','placeholder' => 'CITY'))}}
									<span class="warlock-error" id="ccityerror">{{$errors->login->first('ccity')}}</span>
									{{Form::text('cstate', '', array('class' => 'form-control warlock-right','id' => 'cstate','placeholder' => 'STATE'))}}
									<span class="warlock-error" id="cstateerror">{{$errors->login->first('cstate')}}</span>
								</div>
								<br>
								<div class="warlock-inline">
									{{Form::text('ccode', '', array('class' => 'form-control warlock-left','id' => 'ccode','placeholder' => 'PIN CODE'))}}
									<span class="warlock-error" id="ccodeerror">{{$errors->login->first('ccode')}}</span>
									{{Form::select('ccountry',array('' => 'Select Country',
										'Afghanistan' => 'Afghanistan',
										'Albania' => 'Albania',
										'Algeria' => 'Algeria',
										'Andorra' => 'Andorra',
										'Angola' => 'Angola',
										'Antigua and Barbuda' => 'Antigua and Barbuda',
										'Argentina' => 'Argentina',
										'armenia' => 'Armenia',
										'Australia' => 'Australia',
										'Austria' => 'Austria',
										'Azerbaijan' => 'Azerbaijan',
										'Bahamas' => 'Bahamas',
										'Bahrain' => 'Bahrain',
										'Bangladesh' => 'Bangladesh',
										'Barbados' => 'Barbados',
										'Belarus' => 'Belarus',
										'Belgium' => 'Belgium',
										'Belize' => 'Belize',
										'Benin' => 'Benin',
										'Bhutan' => 'Bhutan',
										'Bolivia' => 'Bolivia',
										'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
										'Botswana' => 'Botswana',
										'Brazil' => 'Brazil',
										'Brunei' => 'Brunei',
										'Bulgaria' => 'Bulgaria',
										'Burkina Faso' => 'Burkina Faso',
										'Burundi' => 'Burundi',
										'Cabo Verde' => 'Cabo Verde',
										'Cambodia' => 'Cambodia',
										'Cameroon' => 'Cameroon',
										'Canada' => 'Canada',
										'Central African Republic' => 'Central African Republic',
										'Chad' => 'Chad',
										'Chile' => 'Chile',
										'China' => 'China',
										'Colombia' => 'Colombia',
										'Comoros' => 'Comoros',
										'Cook Islands' => 'Cook Islands',
										'Costa Rica' => 'Costa Rica',
										'Croatia' => 'Croatia',
										'Cuba' => 'Cuba',
										'Cyprus' => 'Cyprus',
										'Czech Republic' => 'Czech Republic',
										'Denmark' => 'Denmark',
										'Ecuador' => 'Ecuador',
										'Egypt' => 'Egypt',
										'Estonia' => 'Estonia',
										'Ethiopia' => 'Ethiopia',
										'Fiji' => 'Fiji',
										'Finland' => 'Finland',
										'France' => 'France',
										'Georgia' => 'Georgia',
										'Germany' => 'Germany',
										'Ghana' => 'Ghana',
										'Greece' => 'Greece',
										'Guatemala' => 'Guatemala',
										'Guinea' => 'Guinea',
										'Guyana' => 'Guyana',
										'Hungary' => 'Hungary',
										'Iceland' => 'Iceland',
										'India' => 'India',
										'Indonesia' => 'Indonesia',
										'Iran' => 'Iran',
										'Iraq' => 'Iraq',
										'Ireland' => 'Ireland',
										'Israel' => 'Israel',
										'Italy' => 'Italy',
										'Jamaica' => 'Jamaica',
										'Japan' => 'Japan',
										'Jordan' => 'Jordan',
										'Kazakhstan' => 'Kazakhstan',
										'Kenya' => 'Kenya',
										'Kuwait' => 'Kuwait',
										'Laos' => 'Laos',
										'Liberia' => 'Liberia',
										'Luxembourg' => 'Luxembourg',
										'Libya' => 'Libya',
										'Malaysia' => 'Malaysia',
										'Maldives' => 'Maldives',
										'Mauritius' => 'Mauritius',
										'Mexico' => 'Mexico',
										'Monaco' => 'Monaco',
										'Mongolia' => 'Mongolia',
										'Morocco' => 'Morocco',
										'Myanmar ' => 'Myanmar ',
										'Namibia' => 'Namibia',
										'Nepal' => 'Nepal',
										'Netherlands' => 'Netherlands',
										'New_Zealand' => 'New Zealand',
										'Nigeria' => 'Nigeria',
										'North_Korea' => 'North Korea',
										'Norway' => 'Norway',
										'Pakistan' => 'Pakistan',
										'Panama' => 'Panama',
										'Philippines' => 'Philippines',
										'Poland' => 'Poland',
										'Portugal' => 'Portugal',
										'Qatar' => 'Qatar',
										'Romania' => 'Romania',
										'Russia' => 'Russia',
										'Rwanda' => 'Rwanda',
										'Saudi_Arabia' => 'Saudi Arabia',
										'Serbia' => 'Serbia',
										'Singapore' => 'Singapore',
										'South_Africa' => 'South Africa',
										'Spain' => 'Spain',
										'Sri_Lanka' => 'Sri Lanka',
										'Sweden' => 'Sweden',
										'Switzerland' => 'Switzerland',
										'Taiwan' => 'Taiwan',
										'Thailand' => 'Thailand',
										'Turkey' => 'Turkey',
										'UK' => 'UK',
										'USA' => 'USA',
										'Vietnam' => 'Vietnam',
										'Zimbabwe' => 'Zimbabwe'

										), null,array('class' => 'form-control','id' => 'ccountry'))}}

										<span class="warlock-error" id="ccountry">{{$errors->login->first('ccountry')}}</span>
									</div>
									<br>
									{{ Form::button('SET YOUR PROFILE', array('class' => 'btn btn-default login-btn next2 last-btn','data-val'=> '1'))}}
								</div>
							</div>
						</fieldset>
						<fieldset class="f3">
							<div class="row">
								<div class="col-md-5">
									<div class="col-md-3">
										<div id="circleforregister" class="left">

										</div>
									</div>
									<div class="col-md-9">
										{{Form::file('image',array('class' => 'form-control','id' => 'image','style' => '    padding: 10px;' ))}}
										<span class="warlock-error" id="imageerror">{{$errors->login->first('image')}}</span>
										<br>
										{{Form::text('company', '', array('class' => 'form-control warlock-left','placeholder' => 'UNIVERSITY/COMPANY','id' => 'company'))}}
										<span class="warlock-error" id="companyerror">{{$errors->login->first('company')}}</span>
										<br>
										{{Form::text('position', '', array('class' => 'form-control warlock-left','placeholder' => 'MAJOR/POSITION','id' => 'position'))}}
										<span class="warlock-error" id="positionerror">{{$errors->login->first('position')}}</span>

									</div>

								</div>
								<div class="col-md-4">
									{{Form::textarea('bio', '', array('class' => 'form-control','placeholder' => 'BIO', 'rows' => 9, 'cols' => 40,'id' => 'bio'))}}
									<span class="warlock-error" id="bioerror">{{$errors->login->first('bio')}}</span>

								</div>
								<div class="col-md-3">

									{{ Form::select('key_skill', array('' => 'Select Your Key Skill',
										'Humanitarian and social sector' => 'Humanitarian and social sector',
										'Visual and Performing Arts' => 'Visual and Performing Arts',
										' Economics, Business and Entrepreneurship' => 'Economics, Business and Entrepreneurship',
										'Accounting and Finance' => 'Accounting and Finance',
										'Biology, Health and Medicine' => 'Biology, Health and Medicine',
										'Law and Legal Studies' => 'Law and Legal Studies',
										'Computer Science & Mathematics' => 'Computer Science & Mathematics',
										'Architecture & Civil Engineering' => 'Architecture & Civil Engineering',
										'Electrical Engineering' => 'Electrical Engineering',
										'Mechanical Engineering' => 'Mechanical Engineering',
										'Statistics & Actuarial Sciences' => 'Statistics & Actuarial Sciences',
										'Environmental Science & Sustainability' => 'Environmental Science & Sustainability',
										'Chemistry' => 'Chemistry',
										'Physics' => 'Physics',
										'Advertising & Journalism' => 'Advertising & Journalism',
										'Education' => 'Education',
										'Social Sciences' => 'Social Sciences',
										'Psychology & Behavioral Sciences' => 'Psychology & Behavioral Sciences',
										'Political Science and Government' => 'Political Science and Government'), null,array('class' => 'form-control','id' => 'key_skill')); }}
										<span class="warlock-error" id="key_skillerror">{{$errors->login->first('key_skill')}}</span>
										<br>
										{{ Form::textarea('funfact','', array('class' => 'form-control','placeholder' => 'Add your favorite quote', 'rows' => 5, 'cols' => 40,'id' => 'funfact'))}}
										<br>
										<span class="warlock-error" id="funfacterror">{{$errors->login->first('funfact')}}</span>
									</div>

								</div>
								<br>
								<div class="row">
									<p>SOCIAL MEDIA PROFILES</p>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-twitter"></i></span>
											{{Form::text('twitter', '', array('class' => 'form-control warlock-left','placeholder' => 'TWITTER PROFILE LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('twitter')}}</span>

									</div>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-linkedin"></i></span>
											{{Form::text('linkedin', '', array('class' => 'form-control warlock-left','placeholder' => 'LINKEDIN PROFILE LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('linkedin, link)')}}</span>

									</div>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-youtube-play"></i></span>
											{{Form::text('youtube', '', array('class' => 'form-control warlock-left','placeholder' => 'YOUTUBE CHANNEL LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('youtube')}}</span>

									</div>
								</div>
								<br>
								<div class="row">
									<p>WORK MEDIA PROFILES</p>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-github"></i></span>
											{{Form::text('github', '', array('class' => 'form-control warlock-left','placeholder' => 'GITHUB PROFILE LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('github')}}</span>

									</div>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-behance"></i></span>
											{{Form::text('behance', '', array('class' => 'form-control warlock-left','placeholder' => 'BEHANCE PROFILE LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('behance')}}</span>

									</div>
									<div class="col-md-4">
										<div class="input-prepend">
											<span class="add-on"><i class="fa fa-graduation-cap"></i></span>
											{{Form::text('academia', '', array('class' => 'form-control warlock-left','placeholder' => 'ACADEMIA PROFILE LINK'))}}
										</div>


										<span class="warlock-error">{{$errors->login->first('academia')}}</span>

									</div>

								</div>
								<br>
								<div class="row">
									<p>AREAS OF INTEREST</p>
									<div class="col-md-4">
										{{ Form::select('key_interest1', array('' => 'Select Your Area Of Interest',
											'Humanitarian and social sector' => 'Humanitarian and social sector',
											'Visual and Performing Arts' => 'Visual and Performing Arts',
											' Economics, Business and Entrepreneurship' => 'Economics, Business and Entrepreneurship',
											'Accounting and Finance' => 'Accounting and Finance',
											'Biology, Health and Medicine' => 'Biology, Health and Medicine',
											'Law and Legal Studies' => 'Law and Legal Studies',
											'Computer Science & Mathematics' => 'Computer Science & Mathematics',
											'Architecture & Civil Engineering' => 'Architecture & Civil Engineering',
											'Electrical Engineering' => 'Electrical Engineering',
											'Mechanical Engineering' => 'Mechanical Engineering',
											'Statistics & Actuarial Sciences' => 'Statistics & Actuarial Sciences',
											'Environmental Science & Sustainability' => 'Environmental Science & Sustainability',
											'Chemistry' => 'Chemistry',
											'Physics' => 'Physics',
											'Advertising & Journalism' => 'Advertising & Journalism',
											'Education' => 'Education',
											'Social Sciences' => 'Social Sciences',
											'Psychology & Behavioral Sciences' => 'Psychology & Behavioral Sciences',
											'Political Science and Government' => 'Political Science and Government'), null,array('class' => 'form-control')); }}
											<span class="warlock-error">{{$errors->login->first('key_interest1')}}</span>
										</div>
										<div class="col-md-4">
											{{ Form::select('key_interest2', array('' => 'Select Your Area Of Interest',
												'Humanitarian and social sector' => 'Humanitarian and social sector',
												'Visual and Performing Arts' => 'Visual and Performing Arts',
												' Economics, Business and Entrepreneurship' => 'Economics, Business and Entrepreneurship',
												'Accounting and Finance' => 'Accounting and Finance',
												'Biology, Health and Medicine' => 'Biology, Health and Medicine',
												'Law and Legal Studies' => 'Law and Legal Studies',
												'Computer Science & Mathematics' => 'Computer Science & Mathematics',
												'Architecture & Civil Engineering' => 'Architecture & Civil Engineering',
												'Electrical Engineering' => 'Electrical Engineering',
												'Mechanical Engineering' => 'Mechanical Engineering',
												'Statistics & Actuarial Sciences' => 'Statistics & Actuarial Sciences',
												'Environmental Science & Sustainability' => 'Environmental Science & Sustainability',
												'Chemistry' => 'Chemistry',
												'Physics' => 'Physics',
												'Advertising & Journalism' => 'Advertising & Journalism',
												'Education' => 'Education',
												'Social Sciences' => 'Social Sciences',
												'Psychology & Behavioral Sciences' => 'Psychology & Behavioral Sciences',
												'Political Science and Government' => 'Political Science and Government'), null,array('class' => 'form-control')); }}
												<span class="warlock-error">{{$errors->login->first('key_interest2')}}</span>

											</div>
											<div class="col-md-4">
												{{ Form::select('key_interest3', array('' => 'Select Your Area Of Interest',
													'Humanitarian and social sector' => 'Humanitarian and social sector',
													'Visual and Performing Arts' => 'Visual and Performing Arts',
													' Economics, Business and Entrepreneurship' => 'Economics, Business and Entrepreneurship',
													'Accounting and Finance' => 'Accounting and Finance',
													'Biology, Health and Medicine' => 'Biology, Health and Medicine',
													'Law and Legal Studies' => 'Law and Legal Studies',
													'Computer Science & Mathematics' => 'Computer Science & Mathematics',
													'Architecture & Civil Engineering' => 'Architecture & Civil Engineering',
													'Electrical Engineering' => 'Electrical Engineering',
													'Mechanical Engineering' => 'Mechanical Engineering',
													'Statistics & Actuarial Sciences' => 'Statistics & Actuarial Sciences',
													'Environmental Science & Sustainability' => 'Environmental Science & Sustainability',
													'Chemistry' => 'Chemistry',
													'Physics' => 'Physics',
													'Advertising & Journalism' => 'Advertising & Journalism',
													'Education' => 'Education',
													'Social Sciences' => 'Social Sciences',
													'Psychology & Behavioral Sciences' => 'Psychology & Behavioral Sciences',
													'Political Science and Government' => 'Political Science and Government'), null,array('class' => 'form-control')); }}
												</div>
											</div>
											{{ Form::button('SUBMIT', array('class' => 'btn btn-default login-btn next3 last-btn','data-val'=> '1'))}}
										</fieldset>
										{{ Form::close() }}

										<div class="row col-md-4 col-md-offset-4" style="margin-bottom: 10%;">

										</div>
									</div>
									{{ HTML::script('assets/js/script.js') }}
									@stop

