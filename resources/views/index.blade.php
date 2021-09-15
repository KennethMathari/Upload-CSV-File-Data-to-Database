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
    <style>
        .input {
            transition: border 0.2s ease-in-out;
            min-width: 280px
        }
    
        .input:focus+.label,
        .input:active+.label,
        .input.filled+.label {
            font-size: .75rem;
            transition: all 0.2s ease-out;
            top: -0.1rem;
            color: #667eea;
        }
    
        .label {
            transition: all 0.2s ease-out;
            top: 0.4rem;
              left: 0;
        }
    </style>
</head>
<body>
    <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="flex p-10 bg-white max-w-xl rounded">
        <div class="mb-4 relative">
        <input id="file" type="file" name="file" autofocus class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600">
        <label for="file" for="email" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Upload CSV File</label>
        </div>
        <input type="submit" name="submit" class="bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6  m-5 rounded"> 

        </div>
    </form>
    <h3 style="text-align:center">Inventory List</h3> 

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





    <script>
        var toggleInputContainer = function (input) {
            if (input.value != "") {
                input.classList.add('filled');
            } else {
                input.classList.remove('filled');
            }
        }
    
        var labels = document.querySelectorAll('.label');
        for (var i = 0; i < labels.length; i++) {
            labels[i].addEventListener('click', function () {
                this.previousElementSibling.focus();
            });
        }
    
        window.addEventListener("load", function () {
            var inputs = document.getElementsByClassName("input");
            for (var i = 0; i < inputs.length; i++) {
                console.log('looped');
                inputs[i].addEventListener('keyup', function () {
                    toggleInputContainer(this);
                });
                toggleInputContainer(inputs[i]);
            }
        });
    </script>
</body>
</html>