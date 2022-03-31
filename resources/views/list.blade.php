<html>
<head>
	<title>Laravel 8 Ajax Image Upload with validation: Real Programmer</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<style>

</style>
<body>

<div class="container">
  <h1> Ajax Image Upload </h1>
     <div class="alert" id="message" style="display:none"></div>


     <form method="post" id="upload_form" enctype="multipart/form-data">
    @csrf
      	<div class="alert alert-danger print-error-msg" style="display:none">
         <ul></ul>
     </div>
             <input type="hidden" name="_token" value="{{csrf_token() }}">
    <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
	<div class="form-group">
         <label>Image</label>
        <input type="file" name="image" class="form-control" required>

    </div>
    <div class="form-group">
         <button class="btn btn-success upload-image" type="submit">Upload Image</button>
    </div>
  </form>
        <span id="uploaded_image"></span>

    </div>
    <div class="container">

    <h2>Show All Image from public folder</h2>

    <table>
          <div class="row">

                <tbody>


                </tbody>

</div>
</table>
</div>

<script src="{{asset('image.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-localScroll/2.0.0/jquery.localScroll.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-localScroll/2.0.0/jquery.localScroll.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

</body>
</html>
