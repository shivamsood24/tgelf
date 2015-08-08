@extends('layouts.master')
@section('content')

<div class="container login-container">
	<h1 id="" style="text-align: center;margin-bottom: 30px"><span id="war-header-inner" style="color:#A83334">REGISTER</span></h1>
	{{ Form::open(array('url' => 'createuser','method' => 'post','autocomplete' => 'off','id' => 'registerform')) }}
	<ul id="progressbar">
		<li class="l1 active">Account Setup</li>
		<li class="l2">Social Profiles</li>
		<li class="l3">Personal Details</li>
	</ul>
	<fieldset class="f1">
		<div class="row col-md-4 col-md-offset-4 ">
			{{Form::text('username', '', array('class' => 'form-control','placeholder' => 'USER NAME'))}}
			<br>
			<span class="warlock-error">{{$errors->login->first('username')}}</span>
			{{ Form::password('password', array('class' => 'form-control','placeholder' => 'PASSWORD'))}}
			<br>
			<span class="warlock-error">{{$errors->login->first('password')}}</span>
			{{ Form::password('confirmpassword', array('class' => 'form-control','placeholder' => 'CONFIRM PASSWORD'))}}
			<br>
			<span class="warlock-error">{{$errors->login->first('confirmpassword')}}</span>
			{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
			<br>
			<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
			{{ Form::button('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1'))}}
		</div>
	</fieldset>
	<fieldset class="f2">
		<div class="row">
			<div class="col-md-3">
				<div class="warlock-inline-head" >PERSONAL INFO</div>
				<div class="warlock-inline">
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FIRST NAME'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					{{Form::text('lastname', '', array('class' => 'form-control warlock-right','placeholder' => 'LAST NAME'))}}
					<span class="warlock-error">{{$errors->login->first('lastname')}}</span>
				</div>
				<br>
				{{ Form::email('personalemail','', array('class' => 'form-control','placeholder' => 'EMAIL ADDRESS(PERSONAL)'))}}
				<span class="warlock-error">{{$errors->login->first('personalemail')}}</span>
				<br>
				{{ Form::email('professionalemail','', array('class' => 'form-control','placeholder' => 'EMAIL ADDRESS(PROFESSIONAL)'))}}
				<span class="warlock-error">{{$errors->login->first('professionalemail')}}</span>
				<br>
				<div>
					<div class="col-md-4 warlock-clear">
						{{Form::select('countrycode',array('7' => '+7',
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
							'91' => '+91',
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
						{{Form::text('contactno', '', array('class' => 'form-control','placeholder' => 'NUMBER'))}}
					</div>
					<span class="warlock-error">{{$errors->login->first('contactno')}}</span>
				</div>
				
				<br>
			</div>
			<div class="col-md-3">
				<div class="warlock-inline-head">PARENTAL INFO</div>
				{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
				<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
				<br>
				<div>
					<div class="col-md-4 warlock-clear">
						{{Form::select('countrycodefather',array('7' => '+7',
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
							'91' => '+91',
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
					{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
					<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
					<br>
					<div>
						<div class="col-md-4 warlock-clear">
							{{Form::select('countrycodemother',array('7' => '+7',
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
							'91' => '+91',
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
					<div class="warlock-inline-head">PERMANENT ADDRESS</div>
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
						{{Form::text('pcountry', '', array('class' => 'form-control warlock-right','placeholder' => 'COUNTRY'))}}
						<span class="warlock-error">{{$errors->login->first('pcountry')}}</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="warlock-inline-head">PRESENT ADDRESS</div>
					{{Form::text('caddressline1', '', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 1'))}}
					<br>
					<span class="warlock-error">{{$errors->login->first('caddressline1')}}</span>

					{{ Form::text('caddressline2','', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 2'))}}
					<br>
					<span class="warlock-error">{{$errors->login->first('caddressline2')}}</span>
					<div class="warlock-inline">
						{{Form::text('ccity', '', array('class' => 'form-control warlock-left','placeholder' => 'CITY'))}}
						<span class="warlock-error">{{$errors->login->first('ccity')}}</span>
						{{Form::text('cstate', '', array('class' => 'form-control warlock-right','placeholder' => 'STATE'))}}
						<span class="warlock-error">{{$errors->login->first('cstate')}}</span>
					</div>
					<br>
					<div class="warlock-inline">
						{{Form::text('ccode', '', array('class' => 'form-control warlock-left','placeholder' => 'PIN CODE'))}}
						<span class="warlock-error">{{$errors->login->first('ccode')}}</span>
						{{Form::text('ccountry', '', array('class' => 'form-control warlock-right','placeholder' => 'COUNTRY'))}}
						<span class="warlock-error">{{$errors->login->first('ccountry')}}</span>
					</div>
					<br>
					{{ Form::button('REGISTER', array('class' => 'btn btn-default login-btn next2 last-btn','data-val'=> '1'))}}
				</div>
			</div>
		</fieldset>
		<fieldset class="f3">
		<div class="row">
			<div class="col-md-5">
				<div class="col-md-3">
                    <div id="circleforregister" class="left"></div>
                </div>
				<div class="col-md-9">
				 
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					<br>
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'UNIVERSITY/COMPANY'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					<br>
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'MAJOR/POSITION'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					
				</div>
				
			</div>
			<div class="col-md-4">
				{{Form::textarea('fathername', '', array('class' => 'form-control','placeholder' => 'BIO', 'rows' => 9, 'cols' => 40))}}
				<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
				
			</div>
			<div class="col-md-3">
				
				{{ Form::select('key_skill', array('key'=>'KEY SKILL'), null,array('class' => 'form-control')); }}
				<br>
				<span class="warlock-error">{{$errors->login->first('paddressline1')}}</span>

				{{ Form::textarea('funfact','', array('class' => 'form-control','placeholder' => 'FUN FACT', 'rows' => 5, 'cols' => 40))}}
				<br>
				<span class="warlock-error">{{$errors->login->first('paddressline2')}}</span>
			</div>
			
		</div>
		<br>
		<div class="row">
		<p>SOCIAL MEDIA PROFILES</p>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
		<p>WORK MEDIA PROFILES</p>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
		<p>AREAS OF INTEREST</p>
			<div class="col-md-4">
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
			</div>
			<div class="col-md-4">
				{{Form::text('firstname', '', array('class' => 'form-control warlock-left'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				
			</div>
			<div class="col-md-4">
				{{Form::text('paddressline1', '', array('class' => 'form-control'))}}
		</div>
		</div>
	</fieldset>
		{{ Form::close() }}

		<div class="row col-md-4 col-md-offset-4" style="margin-bottom: 10%;">

		</div>
	</div>
	{{ HTML::script('assets/js/script.js') }}
	@stop

