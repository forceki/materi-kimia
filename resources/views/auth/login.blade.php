@extends('layouts.main')

@section('content-main')
    <div class="container my-5">
      <div class="row">
        <div class="col-md-4 my-5">
          <form action="/login-store" method="post">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" onclick="myPassword()">
              <label class="form-check-label" for="exampleCheck1">Show password</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
  function myPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }
</script>
@endsection