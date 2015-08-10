 @extends('layouts.master')
 @section('content')
<style>
.box
{
    background-color: #A83334; 
}
.box:not(.job-box) .box-article {
    padding: 112px 32px 35px 32px;
    text-align: center;
    color: #fff;
    }
</style>
  <div class="container login-container"  style="margin-bottom: 10%;">
    <h1 id="war-header" style="text-align: center;margin-bottom: 1px !important;"><span id="war-header-inner">PROGRAM</span></h1>
    <br>
    <br>
    <br>
    <h1 align="center" style="color: #A83334;">" Our vision is strategic,our voice credible,our results are unmistakable and our impact global."</h1>
    <br><br><br><br>
    <div class="row">
        <div class="col-md-3" style="text-align: center;">
            <img src="{{asset('uploads/pro1.png')}}">
            <input class="btn btn-default login-btn last-btn next program" type="submit" value="COMMUNITY">
        </div>
        <div class="col-md-3" style="text-align: center;">
            <img src="{{asset('uploads/pro2.png')}}">
            <a href="#reg1"> <input class="btn btn-default login-btn next1 program" type="submit" value="OPPORTUNITIES "></a>

        </div>
        <div class="col-md-3" style="text-align: center;">
            <img src="{{asset('uploads/pro3.png')}}">
            <input class="btn btn-default login-btn next2 last-btn next2 program" type="submit" value="PARTNERSHIP">

        </div>
        <div class="col-md-3" style="text-align: center;">
            <img src="{{asset('uploads/pro4.png')}}">
            <a href="#reg1"><input class="btn btn-default login-btn next3 program" type="submit" value="PERSONAL DEVELOPMENT"></a>
        </div>


    </div>

    <div class="container login-container">
       <ul id="progressbar1">
        <li class="l1 active">PRE COLLEGE</li>
        <li class="l2">FRESHMAN</li>
        <li class="l3">JUNIOR</li>
        <li class="l4">SENIOR</li>
    </ul>
    <br><br>
    <fieldset class="f1" >
        <div class="row col-md-12 ">
            <p class="programp">"A week long outward bound trip, focussing on service, and also
                on bonding within the new batch of the leaders forum members."</p>
                <br>
                <div class="col-md-4">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-4">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
            </div>
        </fieldset>
        <fieldset class="f2" style="display:none">
            <div class="row" id="#reg1">
              <p class="programp">"Every forum member chooses one of these summers 
                and works with TGELF for 6 weeks. Two weeks of this 6 week program will emphasise 
                learning. With one week will be devoted to internal training, while the second will focus 
                on external leadership. The remaining 4 weeks will involve working with the foundation."</p>
                <br>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-2">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
              </div>  
        </fieldset>
        <fieldset class="f3" style="display:none">
            <div class="row">
                
               <p class="programp">"tGELF helps the members of the leaders forum in getting internship 
                opportunities in their areas of interest, through a structured and a regulated process."</p>
                <br>
                <div class="col-md-4">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
                <div class="col-md-4">
                    <img src="{{asset('uploads/program_file.png')}}" style="width: 58%;">
                </div>
            </div>
        </fieldset>
        <fieldset class="f4" style="display:none">
            <div class="row">
                
               <p class="programp">"After graduation, tGELF offers a fellowship programme to interested
                students. This fellowship programme would be a 2 year long programme, which would 
                involve ...."</p>
                <br>
                
            </div>
        </fieldset>
    </div>
</div>
{{ HTML::script('assets/js/program.js') }}
@stop