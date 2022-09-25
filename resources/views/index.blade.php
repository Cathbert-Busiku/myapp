<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

 <div class="container">

 <div>
   <a href="/register"> <button> Add Contact </button> </a>
 </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Phone</th>
            <th scope="col">Location</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody> 
         @unless (count($contacts)==0)
         @foreach($contacts as $contact)  
        
          <tr>
            <th scope="row"> {{ $contact->id}} </th>
            <td>{{ $contact->firstname}}</td>
            <td>{{ $contact->lastname}}</td>
            <td>{{ $contact->phone}}</td>
            <td>{{ $contact->location}}</td>
            <td>
                <a href="/contacts/{{$contact->id}}/edit">   
                  <i class="fa fa-pencil-square-o" 
                    aria-hidden="true" style="font-size:24px;color:green;margin-right:10px">
                  </i></a>
                
             
                <form method="POST" action="/contacts/{{$contact->id}}">
                  @csrf
                  @method('DELETE')
                  <button> <i class="fa fa-trash-o" style="font-size:24px;color:red"> </i></button>
               </form>
            
               
            </td> 
          </tr>
        @endforeach
        @endunless
        </tbody>
      </table>
 </div>
</body>
</html>