<!DOCTYPE html>
<html lang="en">
<head>
  <title>Εφαρμογή Αναζήτησης Αναπληρωτών Εκπαιδευτικών ΕΣΠΑ Δ/νσης Π.Ε. Χανίων</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1000px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h3>Αναζήτηση Με Βάση:</h3>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Επώνυμο-Όνομα-ΑΦΜ</a></li>
        <li><a href="#section2">Σχολείο</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <h3>Εφαρμογή Αναζήτησης Αναπληρωτών Εκπαιδευτικών ΕΣΠΑ</h3>
    
    <hr>
    
      
      <div class="form-group">
      <label for="ap">Επώνυμο</label>
      <input type="text" name="ap" id="ap" class="form-control" value="" />
      </div>

      <div class="form-group">
      <label for="surname" class="owhite">Όνομα</label>
      <input type="text" name="date" id="date" class="form-control" value=""/>
      </div> 

      <div class="form-group">
      <label for="surname" class="owhite">ΑΦΜ</label>
      <input type="text" name="date" id="date" class="form-control" value=""/>
      </div> 

     </div>

    
   

</div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
