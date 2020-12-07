<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    {{-- CSS other --}}
    <link rel="stylesheet" href="{{ asset('css/reports/registeredUser/pdf.css') }}">
    <style>
        @page {
            margin: 0;
        }
    </style>
</head>
<body>
    <div style="width: 90%;" class="center" >
        <div class="text-center" style="font-size: 50px;" >{{ $name }}</div>
        <div class="text-center h1" >{{ $event_date }}</div>
        <div class="text-center h1" >{{ $organizer }}</div>
        <table width="100%" class="border-groove" style="margin-top: 20px;">
            <thead>
                <tr class="border-groove text-center">
                    <td class="border-groove h1" width="10%" >No</td>
                    <td class="border-groove h1" width="10%" >ID</td>
                    <td class="border-groove h1" width="20%" >Name</td>
                    <td class="border-groove h1" width="20%" >Registered Date</td>
                    <td class="border-groove h1" width="20%" >Signature</td>
                    <td class="border-groove h1" width="20%" >Remark</td>
                </tr>   
            </thead>
            <tbody>
                @foreach($data as $key => $row)
                <tr class="border-groove">
                    <th class="border-groove" >{{ $key+1 }}</th>
                    <td class="border-groove text-center" >{{ $row->student_id }}</td>
                    <td class="border-groove" >&nbsp; {{ $row->fname . " " . $row->lname }}</td>
                    <td class="border-groove text-center" >{{ date('d M Y', strtotime($row->registered_date)) }}</td>
                    <td class="border-groove" ></td>
                    <td class="border-groove" ></td>
                </tr>      
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>