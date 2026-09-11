
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>LIMS </title>
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <link rel="stylesheet" href="/assets/css/core/libs.min.css">
      <link rel="stylesheet" href="/assets/css/hope-ui.min.css?v=4.0.0">
      <link rel="stylesheet" href="/assets/css/custom.min.css?v=4.0.0">
      <link rel="stylesheet" href="/assets/css/customizer.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
        body.modal-open {
            overflow: hidden;
        }
        body.modal-open::before {
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            background: rgba(0,0,0,0.3);
            z-index: 1040; 
        }
        
      </style>
      
  </head>
  <body class="  ">
    <!-- loader Start -->
    {{-- <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div> 
    </div> --}}
 <main class="main-content">
          <div class="position-relative iq-banner">
   
