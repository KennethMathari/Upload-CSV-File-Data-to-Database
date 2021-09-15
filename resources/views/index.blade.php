<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>CSV File Upload</title>
</head>
<body>
    <div class="container">
        <h4>Upload CSV File</h4> 

    <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="file" class="form-control" name="file" placeholder="Search..">
            <div class="input-group-btn">
              <button class="btn btn-primary" type="submit">
                Submit
              </button>
            </div>
          </div>
    
        {{-- <input id="file" type="file" name="file" tyle="margin:15px; width:50%;"  class="form-control" required>
        <input type="submit" name="submit" style="margin:15px; width:50%;"class="btn btn-primary form-control">  --}}
        
    </form>
    <h3 style="text-align:center"><b>Inventory List</b></h3> 

    <div class="row" style="padding-right:25px">
            
        <div class="col-md-6" style="padding-bottom:5px;">       
        </div>

        <div class="col-md-6">
            <form action="/search" method="GET" style="margin: 15px">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Search..">
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                  </div>
            </form>
        </div>

    @if (count($inventories)>0)
    <table class="table table-striped">
        <tr>
            <th>InvoiceNo</th>
            <th>StockCode</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>InvoiceDate</th>
            <th>UnitPrice</th>
            <th>Customer</th>
            <th>Country</th>
        </tr>
        @foreach ($inventories as $inventory)
        <tr>
            <td>{{$inventory->InvoiceNo}}</td>
            <td>{{$inventory->StockCode}}</td>
            <td>{{$inventory->Description}}</td>
            <td>{{$inventory->Quantity}}</td>
            <td>{{$inventory->InvoiceDate}}</td>
            <td>{{$inventory->UnitPrice}}</td>
            <td>{{$inventory->Customer}}</td>
            <td>{{$inventory->Country}}</td>
        </tr>
        @endforeach
    </table>
                
    {{ $inventories->links() }}

 @else
    <p class="alert alert-warning">No inventories found!</p>
@endif
    </div>



</body>
</html>