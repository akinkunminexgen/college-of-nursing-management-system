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
@if(!count($checkisYES) > 0)
<?php $k = 1;
$dt_ = 1;
?>

  <div class="row">
    <h3><b>INTERVIEW EXERCISE INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN AND SCHOOL OF BASIC MIDWIFERY, KISHI FOR BASIC MIDWIFERY PROGRAMME</b></h3>
<p>1)This is to inform the under listed candidates that the interview exercise for admission into 2023/2024 Academic Session for Basic Midwifery  programme has been scheduled to hold from Tuesday, 14th February, 2023 to Wednesday, 15th February, 2023 by 8am each day for Ibadan and Kishi campuses respectively:

</p>
    @foreach($distinctdate as $date_)
        @if($date_->date_interview != null)
        
            <h3>Day {{$dt_}} ( {{date('D', strtotime($date_->date_interview))}}, {{date('d-M-Y', strtotime($date_->date_interview))}} )</h3>
                
                <table class="table table-striped table-sm">
                  <thead class="thead-info">
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Reg No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Place of Interview</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($students as $key => $stud)
                        @if($stud->date_interview == $date_->date_interview)
                    
                        <tr>
                          <th scope="row">{{$k}}</th>
                          <td>{{$stud->cardapplicant->reg_no}}</td>
                          <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
                          <td>{{strtoupper($stud->campus)}}</td>
                        </tr>
                        <?php $k++; ?>
                        @endif
                        @endforeach
                      </tbody>
                </table>
                
            <?php $dt_++; ?>
        @endif
    
    @endforeach
    
    



<br>



<!--<p class="text-justify"><strong>1) Venue of the interview for Basic General Nursing candidates is Oyo State College of Nursing and Midwifery, Eleyele Ibadan (Student's Common Room) </strong></p>-->
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

        <p>Please note that 50% and 60% are being used as cut-off marks for Oyo State Indigene and Non-Indigene respectively.</p>
        </div>
        </div>
        <br>
        <p class="text-center"> <strong>Signed</strong> <br> <b>Management</b> </p>
        
@else
<!--For Admission List -->
<h3><b>2023 ENTRANCE EXAMINATION RESULT OF BASIC MIDWIFERY INTO THE OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN AND THE SCHOOL OF BASIC MIDWIFERY, KISHI</b></h3>
<p>1) The underlisted candidates who wrote entrance examination and called for interview into Oyo State College of College Nursing and Midwifery, Eleyele, Ibadan and the School of Basic Midwifery, Kishi have been offered admission into Basic Midwifery programme of the Institution.</p>
<?php $key1= 1;
        $key2=1;?>

    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
      <th scope="col">Campus</th>
    </tr>
  </thead>
  <tbody>
    @foreach($checkisYES as $key => $stud)
    
    <tr>
      <th scope="row">{{$key1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{strtoupper($stud->surname.", ".$stud->first_name." ".$stud->middle_name)}}</td>
      <td>{{strtoupper($stud->campus)}}</td>
    </tr>
    <?php $key1++; ?>
    @endforeach

  </tbody>
</table>



  <div class="row">
    <p class="text-justify"><strong>2) Successful candidates on the list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter(s), but must have paid the sum of Twenty Thousand Naira (N20,000:00) only as Acceptance Fee through the College website. Do not pay to any Bank Account, check here to login for payment. <a href="{{asset('admission/login')}}">click here</a> to login for payment </strong></p>
      <p><strong>3) Process of the online acceptance payment is as follows:</strong></p>
      <ul>

        <li>Your registration and pin number will be used to login to pay the Acceptance Fee</li>
        <li>Once you make the online payment, make sure you print out the Acceptance Payment Receipt</li>
        <li>Acceptance payment receipt will be used to collect Admission Letter(s) from the office of the Registrar</li>
      </ul>
      
      <p><strong>4) PLEASE NOTE THAT ANY CANDIDATE WHO FAIL TO PAY THE ACCEPTANCE FEE BEFORE FRIDAY, 10TH  MARCH, 2023 WILL FORFEIT THE ADMISSION.</strong></p>
      <p><strong>5) THE RESUMPTION DATE FOR THE BASIC MIDWIFERY PROGRAMME IS MONDAY, 6TH MARCH 2023.</strong></p>
      <p><strong>6) THE SCHOOL FEE IS EXPECTED TO BE PAID LATEST FRIDAY, 17TH MARCH, 2023.</strong></p>

    <p class="text-justify">  <strong>7) Details of the School Fee will be reflected in the document attached to Admission Letter for each candidate</strong></p>

    <p class="text-justify">  <strong>8) Please visit the Admission Office or call 09138766976 | 08156903399 for further enquiries.</strong></p>

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
