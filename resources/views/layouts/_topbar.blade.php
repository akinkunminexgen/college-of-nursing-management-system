<style media="screen">
    table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
              }
    </style>

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Important News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

              <div class="alert alert-secondary alert-dismissible fade show text-black" role="alert">
                <h4 class="alert-heading text-success text-justify"><b class="text-danger">Advertisement for Admission into Basic General Nursing and Post Basic Midwifery Programmes of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan for 2021/2022 Academic Session</b> <hr>
                <p class="text-success">Applications are hereby invited from suitably qualified candidates for admission into the following programmes of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan.</p>
                    <p>1.	Basic General Nursing
                    <br>
                    2.	Post-Basic Midwifery</p>

                <br><a href='/admission'> Click here</a> for more information.
                <br>
               <!-- <a href='admission/login'>Click here</a> to check your result</p> -->
                </h4>

                <!--<strong><p class="text-center">Closing Date For Basic Midwifery:</p></strong>
          <p class="text-justify">Sale of forms starts from Thursday 12th November, 2020 online application must be completed on or before 24th January, 2021.</p>
          <ul>
            <li>Date of Entrance Examination (CBT): Tuesday, 9th February – Friday, 12th February, 2021.</li>
            <li>Date of Interview: Tuesday, 23rd  – Friday, 26th  February, 2021. </li>
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan</li>
            <li>Time: 8.00 am prompt</li>
          </ul>-->
          <hr>
              </div>



          <!--  <div class="alert alert-secondary alert-dismissible fade show text-black" role="alert">
                <h4 class="alert-heading text-primary text-justify"><b class="text-primary">Advertisement for Admission into Basic General Nursing Programme of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan for 2021/2022 Academic Session</b> <hr>
                <p>Applications are hereby invited from suitably qualified candidates for admission into the following programmes of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan. <a href='admission'>Click here</a> for more information</p>
                </h4>

                <strong><p class="text-center">Closing Date For Basic General Nursing</p></strong>
          <p class="text-justify">Online application starts Tuesday 1st December, 2020 and must be completed on or before Friday, 5th March, 2021</p>
          <ul>
            <li>	Date of Entrance Examination (CBT): Monday, 8th– Friday, 12th March, 2021.</li>
            <li>	Date of Interview: Monday, 15th – Friday, 19th March, 2021. </li>
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan</li>
            <li>Time: 8.00 am prompt</li>
          </ul>
          <hr>-->


              </div>


          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="header-topbar">
    <div class="container">
      <!---- start of alert view -->


      <!-- end of -->
        <div class="row">
            <div class="col-xs-3 col-sm-5 col-md-6">
                <div class="header-top_address">
                    <div class="header-top_list">
                      <a href="tel:+2347086157620"><span class="icon-phone">+2347086157620</span></a>
                    </div>
                    <div class="header-top_list">
                      <a href="malito:info@oysconme.edu.ng"><span class="icon-envelope-open">info@oysconme.edu.ng</span></a>
                    </div>
                    <div class="header-top_list">
                      <a href="http://maps.google.com/?q=Oyo%20state%20college%20of%20nursing%20&%20midwifery"><span class="icon-location-pin">Eleyele, Ibadan Oyo state</span></a>
                    </div>
                </div>

                <div class="header-top_login2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/portal/dashboard') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="col-xs-3 col-sm-5">
              @if($news != null)
              <a href="{{route('latestNews', ['id'=>$news->id, 'info'=>$news->title])}}">
              <h6 id="hhh" class="movedisplay dis text-white">{{$news->title}} <span class="badge badge-info">Click</span></h6></a>
              @endif
            </div>
            <div class="col-xs-3 col-sm-2 col-md-1" id="zinde">
                <div class="header-top_login mr-sm-3">
                    @if (Route::has('login'))
                        @auth
                            {{--                                  <a href="{{ url('/home') }}">Home</a>--}}
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
