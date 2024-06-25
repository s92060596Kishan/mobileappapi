<!DOCTYPE html>
<html>
<head>
    <title>Skill Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
       POST Form
    </div>
    <div class="card-body">
      <form name="post-form" id="post-form" method="post" action="{{url('store-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">sales</label>
          <textarea name="sales" class="form-control" required=""></textarea>
          <label for="exampleInputEmail1">cost</label>
          <textarea name="cost" class="form-control" required=""></textarea>
          <label for="exampleInputEmail1">profit</label>
          <textarea name="profit" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
