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
    <h3><b>INTERVIEW EXERCISE INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN FOR BASIC GENERAL NURSING</b></h3>
<p>1) This is to inform the under listed candidates that the interview exercise for admission into 2022/2023 Academic Session for Basic General Nursing programme has been scheduled to hold from Monday, 4th April, 2022 to Wednesday, 6th April, 2022 by 8am each day:

</p>

    <p>Day 1 ( Monday, 4th April, 2022)</p>
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
    @if($stud->date_interview == '2022-04-04')

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


<p>Day 2 ( Tuesday, 5th April, 2022))</p>
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
    @if($stud->date_interview == '2022-04-05')
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

        <p>Please note that 53% and 60% are being used as cut-off marks for Oyo State Indigene and Non-Indigene respectively.</p>
        </div>
        </div>
        <br>
        <p class="text-center"> <strong>Signed</strong> <br> <b>Management</b> </p>
        
@else
<!--For Admission List -->
<h3><b>2022 ENTRANCE EXAMINATION RESULT OF BASIC GENERAL NURSING INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN </b></h3>
<p>1) The underlisted candidates who wrote entrance examination and called for interview into Oyo State College of College Nursing and Midwifery, Eleyele, Ibadan have been offered admission into Basic General Nursing programme of the Institution.</p>
<?php $key1= 1;
        $key2=1;?>

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
    
    <tr>
      <th scope="row">{{$key1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    <?php $key1++; ?>
    @endforeach

  </tbody>
</table>



  <div class="row">
    <p class="text-justify"><strong>2) The resumption date for the Basic General Nursing Programme is Monday, 25th April 2022. Successful candidates who are on the list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter(s) but must have paid the sum of Fifteen Thousand Naira (N15,000:00) only as Acceptance Fee through the College website. Do not pay to any Bank Account, check here to login for payment. <a href="{{asset('admission/login')}}">click here</a> to login for payment </strong></p>
      <p><strong>3) Process of the online acceptance payment is as follows:</strong></p>
      <ul>

        <li>Your registration and pin number you obtained will be used to login to pay the Acceptance fee</li>
        <li>Once you make the online payment, make sure you print out the Acceptance Payment Receipt</li>
        <li>Acceptance payment receipt will be used to collect Admission Letter(s) from the office of the Registrar</li>
        <li>Any candidate who fail to pay the Acceptance Fee before Friday, 6th May, 2022 will forfeit the admission for other candidates on waiting list</li>
        <li>The School fee is expected to be paid latest Friday, 27th May, 2022.</li>
      </ul>

    <p class="text-justify">  <strong>4) Details of the School Fee will be reflected in the document attached to Admission Letter for each candidate.</strong></p>

    <p class="text-justify">  <strong>5) Please visit the Admission Office or call 09138766976 | 08156903399 for further enquiries.</strong></p>

  </div>
  <p class="text-center"> <strong>Signed</strong> <br> Yusuf, F. A (Mrs.) <br> Ag. Registrar </p>
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
