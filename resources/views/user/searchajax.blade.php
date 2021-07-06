<!DOCTYPE html>
<html>
<head>
    <title>Ajax search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container box">
    <h3 align="center">Gợi ý tìm kiếm với ajax</h3><br />
    <div class="form-group">
        <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
        <div id="countryList"><br>
        </div>
    </div>
    {{ csrf_field() }}
</div>
</body>
</html>
