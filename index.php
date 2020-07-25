<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPS IOT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- HERE Maps -->
    </script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

    <style>
        td {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">GPS uBlox NEO-6M-V2 Tracker w/ SIM 900 </h1>

        <div class="row">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header"><b>Map</b></div>
                    <div style="width: 540px; height: 360px" id="mapContainer"></div>
                </div>
                <div class="card" style="max-height: 400px;">
                    <div class="card-header"><b>Record</b></div>
                    <div id="card-koordinat" class="card-body" style="overflow-y: scroll;">
                        <div class="table-responsive">
                            <table id="row-coordinates" class="table">
                                <thead>
                                    <!-- <th>ID</th> -->
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Tanggal Dikirim</th>
                                    <th></th>
                                </thead>
                                <tbody id="showData"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card mt-2">
                    <div class="card-header"><b>Lokasi Terakhir</b></div>
                    <div class="card-body">
                        <div id="showDetail">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<!-- <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-database.js"></script>
<script src="includes/maps.js"></script>

</html>