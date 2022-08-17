@extends('welcome')

@section('title')
Admission List
@stop

@section('site.styles')
<style>
.printable { display:none; }
@media only print {
    .container { display:none !important; };
    .printable { display:block !important; } ;
}
</style>
@stop

@section('pagename')
Admission List
@stop

@section('site.content')
<br>
<div class="container">
    <!-- For Interview list -->
@if($checkisYES == null)
<?php $k = 1; ?>

  <div class="row">
    <h3><b>INTERVIEW EXERCISE INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN FOR BASIC MIDWIFERY, IBADAN AND KISHI CAMPUS</b></h3>
<p>This is to inform the under listed candidates that the interview exercise for admission into Basic Midwifery, 2022/2023 Academic Session has been scheduled to hold on Monday, 21st February, 2022 by 9am both in Ibadan and Kishi campuses respectively:</p>

    <!--<p>Day 1 ( Monday, 23rd August, 2021)</p>
    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $key => $stud)
    @if($stud->date_interview == '2021-08-23')

    <tr>
      <th scope="row">{{$k}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    <?php $k++; ?>
    @endif
    @endforeach
  </tbody>
</table


<p>Day 2 ( Tuesday, 24th August, 2021))</p>
    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $key => $stud)
    @if($stud->date_interview == '2021-08-24')
    <tr>
      <th scope="row">{{$k}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
      <?php $k++; ?>
    @endif
    @endforeach
  </tbody>
</table>


<p>Day 3 ( Wednesday, 25th August, 2021)</p>
    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $key => $stud)
    @if($stud->date_interview == '2021-08-25')
    <tr>
      <th scope="row">{{$k}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    <?php $k++; ?>
    @endif
    @endforeach
  </tbody>
</table>

<br>-->



<!--<p class="text-justify"><strong>1) Venue of the interview for Basic General Nursing candidates is Oyo State College of Nursing and Midwifery, Eleyele Ibadan (Student's Common Room) </strong></p>-->
        <p>You are advised to come along with the following documents:</p>
            <ul>
                <li>Print out of entrance result slip</li>
                <li>Original Copy of WAEC/NECO result</li>
                <li>Original Copy of Birth Certificate</li>
                <li>Original Copy of Local Government Identification</li>
                <li>HP pencil</li>
                <li>Nose Mask</li>
            </ul>
        <div>
            <h3>GENERAL INFORMATION</h3>

        <p>Please note that 42% and 54% are being used as cut-off marks for Oyo State Indigenes and Non-Indigenes respectively.</p>
        </div>
        </div>
@else
<!--For Admission List -->
<h3><b>2022 ENTRANCE EXAMINATION RESULT OF BASIC MIDWIFERY INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN AND THE SCHOOL OF BASIC MIDWIFERY, KISHI</b></h3>
<p>The underlisted candidates who wrote entrance examination and called for interview into Oyo State College of College Nursing and Midwifery, Eleyele, Ibadan and the School of Basic Midwifery, Kishi have been offered admission into Basic Midwifery programme of the Institution.</p>
<?php $key1= 1;
        $key2=1;?>

        <div class="text-center"><h3>IBADAN</h3></div>

    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($checkisYES as $key => $stud)
    @if($stud->campus == 'IBADAN')

    <tr>
      <th scope="row">{{$key1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    <?php $key1++; ?>
    @endif
    @endforeach

  </tbody>
</table>


 <div class="text-center"><h3>KISHI</h3></div>

    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($checkisYES as $key => $stud)
    @if($stud->campus == 'KISHI')

    <tr>
      <th scope="row">{{$key2}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    <?php $key2++; ?>
    @endif
    @endforeach

  </tbody>
</table>

  <div class="row">
    <p class="text-justify"><strong>1) The resumption date for the Basic Midwifery Programme is Monday, 7th March 2022. Successful candidates who are on the list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter(s), but must have paid the sum of Fifteen Thousand Naira (N15,000:00) only as Acceptance Fee through the College website. Do not pay to any Bank Account, check here to login for payment. <a href="{{asset('admission/login')}}">click here</a> to login for payment </strong></p>
      <p><strong>2) Process of the online acceptance payment is as follows:</strong></p>
      <ul>

        <li>Your registration and pin number you obtained will be used to login to pay the Acceptance fee</li>
        <li>Once you make the online payment, make sure you print out the Acceptance Payment Receipt</li>
        <li>Acceptance payment receipt will be used to collect Admission Letter(s) from the office of the Registrar</li>
        <li>Any candidate who fails to pay the Acceptance Fee before Friday, 1st October, 2021 will forfeit the admission for other candidates on waiting list  </li>
        <li>The School fee is expected to be paid latest Friday, 29th October,2021.</li>
      </ul>

    <p class="text-justify">  <strong>3) Details of the School Fee will be reflected in the document attached to Admission Letter for each candidate.</strong></p>

    <p class="text-justify">  <strong>4) Please visit the Admission Office or call 09138766976 | 08156903399 for further enquiries.</strong></p>

  </div>
  <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
@endif
</div>
@stop

@section('site.scripts')
<script type="text/javascript">
 document.oncontextmenu = new Function("return false");

 $(document).ready(function() {
 $('body').bind('cut copy paste', function(event) {
 event.preventDefault();
 });
 });
 </script>
@stop
