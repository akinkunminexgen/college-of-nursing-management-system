@extends('welcome')

@section('title')
Admission List
@stop

@section('pagename')
Admission List
@stop

@section('site.content')
<br>
<div class="container">
  <div class="row">
    <h3><b>2021 ENTRANCE EXAMINATION RESULT OF THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN</b></h3>
   <!-- <p>This is to inform the under listed candidates that the interview exercise for admission into 2021/2022 Academic Session has been scheduled to hold from Monday, 15th March, 2021 to Wednesday, 17th March, 2021 by 9am each day </p>
    <p>Day 1 ( Monday, 15th March, 2021)</p>
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
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    @endforeach
  </tbody>
</table


<p>Day 2 ( Tuesday, 16th March, 2021)</p>
    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @for($i = 0; $i < 56; $i++)
    <tr>
      <th scope="row">{{$i + 1}}</th>
      <td>{{$studN[$i]->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($studN[$i]->surname.", ".$studN[$i]->first_name." ".$studN[$i]->middle_name)}}</td>
    </tr>
    @endfor
  </tbody>
</table>


<p>Day 3 ( Wednessday, 17th March, 2021)</p>
    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($mids as $key => $stud)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    @endforeach

    @for($i = 56; $i < count($studN); $i++)
    <tr>
      <th scope="row">{{$i - 21}}</th>
      <td>{{$studN[$i]->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($studN[$i]->surname.", ".$studN[$i]->first_name." ".$studN[$i]->middle_name)}}</td>
    </tr>
    @endfor
  </tbody>
</table>

<br>
<br>
<p class="text-justify"><strong>1) Venue of the interview for Basic General Nursing candidates is Oyo State College of Nursing and Midwifery, Eleyele Ibadan (Student's Common Room) </strong></p>
        <p>You are advised to come along with the following documents:</p>
            <ul>
                <li>Print out of entrance result slip</li>
                <li>Original Copy of WAEC/NECO result</li>
                <li>Original Copy of Birth Certificate</li>
                <li>Original Copy of Local Government Identification</li>
                <li>HP pencil</li>
            </ul>
        <div>
            <h3>GENERAL INFORMATION</h3>

        <p>Please note that 52% and 60% are being used as cut-off mark for Oyo State Indigene and Non-Indigene respectively.</p>
        </div>-->

<p>The underlisted candidates who wrote entrance examination and called for interview into the College of Nursing and Midwifery, Eleyele, Ibadan have been offered admission into Basic General Nursing programme of the Institution.</p>

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
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
    </tr>
    @endforeach

  </tbody>
</table>

  </div>
  <div class="row">
    <p class="text-justify"><strong>1) The resumption date for the General Nursing Programme is Monday, 12th April 2021 Successful candidates who are on the merit list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter, but must have paid the sum of Fifteen Thousand Naira (N15,000:00) only as Acceptance Fee through the College website. Do not pay through any Bank account <a href="{{asset('admission/login')}}">click here</a> to login for payment </strong></p>
      <p><strong>2) Process of the online acceptance payment is as follows:</strong></p>
      <ul>

        <li>Your registration and pin number you obtained will be used to login to pay the Acceptance fee</li>
        <li>Once you make the online payment, make sure you print out the Acceptance Payment Receipt</li>
        <li>Acceptance payment receipt will be used to collect Admission Letter from the office of the Registrar</li>
        <li>Any candidate who fail to pay the Acceptance Fee before Friday, 30th April 2021 will forfeit the admission for other candidates on waiting list  </li>
        <li>The School fee is expected to be paid latest Friday, 7th May, 2021.</li>
      </ul>

    <p class="text-justify">  <strong>2) Details of the School Fee will be stated and attached to the Admission Letter for each candidate</strong></p>

    <p class="text-justify">  <strong>3) For further enquires, please visit the Admission Office or the Registrar office or call 09138766976 | 08156903399</strong></p>

  </div>-->
  <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
</div>
@stop
