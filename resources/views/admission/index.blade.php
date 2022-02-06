@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application Guide")

@section('pagename')
Application Guide
@stop

@section('site.content')

<!--============================= ADMISSION FORM RULES =============================-->
<section class="admission-form_rules">
    <div class="container">
        <!--<div class="row">
            <div class="col-md-7 admission-form_mr">
                <h2>Admission Requirements</h2>
                <br>
                <br>
                <br>
                <h4><strong>Basic General Nursing</strong></h4>
                <br>
                <p>
                  This is a three year (3) programme commencing from 4TH October, 2021, after which candidates will be presented for both the College and the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations to qualify as General Nurses and be eligible for registration with NMCN as Registered Nurses (RN).
                  </p>
            </div>
            <div class="col-md-5 admission-form_mr">

                <ul class="admission-form_listed">
                  <strong>Requirements</strong>
                    <p>Applicant must:</p>
                    <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at more than
                      two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology</li>
                    <li>2.	Only individuals with required credit passes at not more than two (2) sittings form the same examination body may apply.
                       He or She should be at least Seventeen (17) years old on admission.</li>
                </ul>
            </div>
        </div>
        <hr>-->
        <div class="row">
            <div class="col-md-7 admission-form_mr">
              <br>
              <br>
              <br>
                <h4><strong>Basic Midwifery</strong></h4>
                <br>
                <p>This is a three year (3) programme commencing from March, 2022, after which candidates will be presented for both the College and the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations to qualify as Midwives and be eligible for registration with NMCN as Registered Midwife (RM).</p>
            </div>
            <div class="col-md-5 admission-form_mr">
              <ul class="admission-form_listed">
                <strong>Requirements</strong>
                  <p>Applicant must:</p>
                  <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits (at not more than
                    two (2) sittings) in English Language, Mathematics, Physics, Chemistry and Biology</li>
                  <li>2.	Only individuals with required credit passes at not more than two (2) sittings form the same examination body may apply.
                     He or She should be at least Seventeen (17) years old on admission.</li>
              </ul>
            </div>
        </div>

      <!--  <hr>
      <div class="row">
          <div class="col-md-7 admission-form_mr">
            <br>
            <br>
            <br>
              <h4><strong>Post Basic Midwifery</strong></h4>
              <br>
              <p>This is an eighteen (18) months programme commencing in September, 2021. </p>
          </div>
          <div class="col-md-5 admission-form_mr">
            <ul class="admission-form_listed">
              <strong>Requirements</strong>
                <p>Applicant must:</p>
                <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at not
                   more than two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology.</li>
                <li>2.	Be a Registered Nurse (RN) with the Nursing and Midwifery Council of Nigeria.
                  Applicants awaiting the result of Nursing and Midwifery Council of
                  Nigeria Examination may also apply.</li>
            </ul>
          </div>
      </div>
        <hr>-->
        <div class="row">
          <div class="col-md-12">
              <strong><p class="text-center"><b>Method of Application</b></p></strong>
            <p class="text-justify">Interested candidates are to follow the underlisted process for online application through the college website: www.oysconme.edu.ng</p>
            <ul>
              <li>Online payment with the sum of Ten Thousand, Five Hundred Naira (N10,500.00) via this <a href="/admission/appform">link</a> where application form fee is expected to be made.</li>
              <li>Pin generated after payment should be printed out</li>
              <li>After generating the pin, a <a href="#">link</a> will direct you to the page where you complete your application process</li>
              <li>Photo card to be printed out by the applicant, which is expected to be brought on the examination day</li>
              <li>Alternatively, you may wish to come to the College ICT Room with your ATM Card for registration, if you find the process listed above difficult to do. </li>
            </ul>
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">

             <!--<strong><p class="text-center">Closing Date For Basic Midwifery:</p></strong>
          <p class="text-justify">Sale of forms starts from Thursday 12th November, 2020 online application must be completed on or before 24th January, 2021.</p>
          <ul>
            <li>Date of Entrance Examination (CBT): Monday, 2nd – Friday, 6th August, 2021</li>
            <li>Date of Interview: Monday, 23rd – Friday, 27th August, 2021</li>
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan</li>
            <li>Time: 8.00 am prompt</li>
          </ul>
          <br>-->

            <strong><p class="text-center"><b>Closing Date</b></p></strong>
          <p class="text-justify">Online application must be completed on or before 31 January, 2022.</p>
          <ul>
            <li>Date of Entrance Examination (CBT): Monday, 7th – Friday, 11th February, 2022</li>
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan and the School of Basic Midwifery, Kishi respectively</li>
            <li>Date of Interview: Monday, 21st – Friday, 25th February, 2022</li>
            <li>Venue: The School of Basic Midwifery, Kishi</li>
            <li>Time: 8.00 am prompt</li>
          </ul>


          <p>For further enquiries, please contact the Office of the Registrar or Heads of Department of Nursing and Midwifery respectively.</p>
          <strong>Contact Numbers:</strong>
          <ul>
            <li>09138766976</li>
            <li>08156903399</li>
          </ul>
          <b>Note: No payment to any Individual/Agent or Personal Bank Account. All payment should be done via the school website
          <br>Thank You. </b>
        </div>
      </div>
      <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
      <div class="row">
        <div class="col-sm-4">

        </div>
        <a href="{{asset(route('invoice.activate'))}}" class="col-md-6"><button type="button" class="btn btn-info" name="button">Click here to start application</button></a>
      </div>

    </div>

</section>
<!--//END ADMISSION FORM RULES -->

@stop
