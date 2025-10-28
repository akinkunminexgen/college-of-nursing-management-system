<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exam Clearance Card</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
        }
        .toMakeTransparent {
              padding: 20px;
              background-color: rgba(255, 255, 255, 0.9); /* optional white overlay */
            }

        .card {
            width: 650px;
            height: 480px;
            border: 2px solid #000;
            border-radius: 10px;
            padding: 15px;
            text-align: center;

            /* Background image applied directly */
            background-image: url("{{ asset('images/Oysconmefaded.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .header {
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 20px;
        }
        .student-info {
            margin: 10px 0;
            text-align: left;
            font-size: 14px;
            padding: 5px;
            border-radius: 5px;
        }
        .photo {
            width: 120px;
            height: 120px;
            border: 1px solid #000;
            margin-bottom: 10px;
        }
        .footer {
            font-size: 12px;
            margin-top: 20px;
            margin-bottom: 35px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
        .makeNoticeable{
            border: 1px solid #000;
            border-color: green;
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="toMakeTransparent">
            <div class="header">Exam Clearance Card</div>

           @if(isset($user->images[0]->url))
          <img class="photo" src="{{$user->images[0]->url}}" alt="Generic placeholder image">
          @else
            <p class='photo'>Contact the Admin to upload your passport</p>
            @endif

        <div class="student-info">
            <p><strong>Name:</strong> {{ $student->last_name .", ".$student->first_name }}</p>
            <p><strong>Matric No:</strong> {{ $student->matric_no }}</p>
            <p><strong>Department:</strong> {{ $student->department_name }}</p>
            <p><strong>Level:</strong> {{ $levelPaid }}</p>
            <h3><strong class="makeNoticeable">{{$halfOrFull == 'Half Paid' ? 'First Semester' : 'First and Second Semester'}}:</strong> Eligible</h3>
        </div>


        <div class="footer">
            Authorized Signature: ___________________
        </div>
        </div>
            

    </div>
</body>
</html>
