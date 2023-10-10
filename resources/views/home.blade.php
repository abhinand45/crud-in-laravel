
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <!-- Registration Form -->
    <form id="registrationForm" action="{{url('details/create')}}" method="post" >
      @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form> 


    <!-- Display Page -->

    <h2> Details</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
 
            @foreach($details as $detail)
        <tr>
            <td>{{ $detail->name }}</td>
            <td>{{ $detail->age }}</td>
            <td>{{ $detail->address }}</td>
            <td><form action="{{ route('items.edit', $detail->id) }}" method="POST" >
              @csrf

              <button type="submit" class="btn btn-primary">Update</button>
          </form></td>
            <td><form action="{{ route('items.destroy', $detail->id) }}" method="POST">
              @csrf
              <!-- @method('DELETE') -->
              <!-- <button type="submit">Delete</button> -->
              <button type="submit" class="btn btn-danger">Delete</button>
          </form></td>
            
        </tr>
        @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>


  <!-- Bootstrap JS (Popper.js and jQuery required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom JavaScript -->

</body>

</html>
