<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <title>PTA Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    
    <main role="main" class="main-container">
        <div class="container">
            <div class="form-group mt-3">
                <div class="icon-container">
                    <i class="bi bi-book-half"></i>
                </div>
                <h5 class="custom-heading"> PTA SEARCH </h5>
            </div>
            <br><br>
            <form action="#" method="GET" onsubmit="return false" class="search-form">
                <div class="input-group">
                    <input style="border-bottom-left-radius: 15px; border-top-left-radius: 15px; width: 300px;" type="text" class="form-control" placeholder="Cari tugas akhir" name="q" id="cari">
                    <div>
                        <select class="form-control" id="rank">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="search" type="submit" ><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </main>
    <div class="container mt-4">
        <div class="row" id="content">
          
        </div>
    </div>

</body>
</html>

<script>
    $(document).ready(function () {
        $("#search").click(function () {
            var cari = $("#cari").val();
            var rank = $("#rank").val();
            $.ajax({
                url: '/search?q=' + cari + '&rank=' + rank,
                dataType: "json",
                success: function (data) {
                    $('#content').html(data);
                },
                error: function (data) {
                    alert("Please insert your command");
                }
            });
        });
    });
</script>
