<?php

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

function grstrtoupper($string) {
		$latin_check = '/[\x{0030}-\x{007f}]/u';
		if (preg_match($latin_check, $string))
		{
			$string = strtoupper($string);
		}
		$letters  								= array('α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'θ', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ', 'ο', 'π', 'ρ', 'σ', 'τ', 'υ', 'φ', 'χ', 'ψ', 'ω');
		$letters_accent 						= array('ά', 'έ', 'ή', 'ί', 'ό', 'ύ', 'ώ');
		$letters_upper_accent 					= array('Ά', 'Έ', 'Ή', 'Ί', 'Ό', 'Ύ', 'Ώ');
		$letters_upper_solvents 				= array('ϊ', 'ϋ');
		$letters_other 							= array('ς');
		$letters_to_uppercase					= array('Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω');
		$letters_accent_to_uppercase 			= array('Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω');
		$letters_upper_accent_to_uppercase 		= array('Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω');
		$letters_upper_solvents_to_uppercase 	= array('Ι', 'Υ');
		$letters_other_to_uppercase 			= array('Σ');
		$lowercase = array_merge($letters, $letters_accent, $letters_upper_accent, $letters_upper_solvents, $letters_other);
		$uppercase = array_merge($letters_to_uppercase, $letters_accent_to_uppercase, $letters_upper_accent_to_uppercase, $letters_upper_solvents_to_uppercase, $letters_other_to_uppercase);
		$uppecase_string = str_replace($lowercase, $uppercase, $string);
		return $uppecase_string;
}


if ($_POST["submit"]) {

		//sanity input check	
			
	 	 if (!$_POST['surname']  && !$_POST['afm']) {

			 $error="Παρακαλώ πληκτρολογήστε κάποιο πεδίο";

	 	 } elseif($_POST['afm'] && (strlen($_POST['afm'])!=9 || !is_numeric($_POST['afm']))){
			$error="Μη έγκυρος ΑΦΜ!!";	 	 	
	 	 }
			
	 	 if ($error) {

			 $result='<div class="alert alert-danger"><strong>'.$error.'</div>';

	 	 } else {
	 	 	$surname=grstrtoupper($_POST['surname']);
	 	 	$afm=$_POST['afm'];

	 	 	//query the database

	 	 	$servername = "localhost";
	 	 	$username = "root";
	 	 	$password = "";
	 	 	$dbname = "anaplirotes";


	 	 	// Create connection
	 	 	$conn = new mysqli($servername, $username, $password, $dbname);
	 	 	// Check connection
	 	 	if ($conn->connect_error) {
	 	 	    die("Connection failed: " . $conn->connect_error);
	 	 	}
	 	 	 
	 	 	$sql = "SELECT * FROM anaplirotes where Surname LIKE '%$surname%' OR afm='$afm'   "; 
	 	 	mysqli_set_charset($conn,"utf8");
			
	 	 	$answer = $conn->query($sql);


	 	 	if ($answer->num_rows > 0) {
	 	 	    // output data of each row
	 	 	    // $result='<div class="alert alert-success"> <br>';
	 	 	    $result='	 	 	     
	 	 	     <div class="container">
	 	 	       <h2>Condensed Table</h2>
	 	 	       <p>The .table-condensed class makes a table more compact by cutting cell padding in half:</p>            
	 	 	       <table class="table table-condensed table-bordered table-hover ">
	 	 	         <thead>
	 	 	           <tr>
	 	 	             <th>Επώνυμο</th>
	 	 	             <th>Όνομα</th>
	 	 	             <th>Πατρώνυμο</th>
	 	 	             <th>ΑΦΜ</th>
	 	 	             <th>Τηλέφωνο</th>
	 	 	             <th>Ειδικότητα</th>
	 	 	           </tr>
	 	 	         </thead>
	 	 	         
	 	 	         ';
	 	 	         
	 	 	    while($row = $answer->fetch_assoc()) {
	 	 	    	$result=$result.'<tbody>
	 	 	           <tr>
	 	 	             <td>John</td>
	 	 	             <td>Doe</td>
	 	 	             <td>john@example.com</td>
	 	 	           </tr>
	 	 	           <tr>
	 	 	             <td>Mary</td>
	 	 	             <td>Moe</td>
	 	 	             <td>mary@example.com</td>
	 	 	           </tr>
	 	 	           <tr>
	 	 	             <td>July</td>
	 	 	             <td>Dooley</td>
	 	 	             <td>july@example.com</td>
	 	 	           </tr>
	 	 	         </tbody>
	 	 	       </table>
	 	 	     </div>';

	 	 	      //  $result=$result."Επώνυμο " . $row["Surname"]. " - Όνομα: " . $row["Name"]. " - Πατρώνυμο: " . $row["Father"]. " - ΑΦΜ: " . $row["afm"]. " - Τηλέφωνο: " . $row["Phone"]. " - Ειδικότητα: " . $row["Eidikotita"]. " - Ημερομηνία Έναρξης: " . $row["StartDate"].  " - Έργο: " . $row["Praksi"]. " - Σχολεία Τοποθέτησης: " . $row["Schools"]. " - Υπουργική Απόφαση: " . $row["ypoyrgiki"]. "<br>";
	 	 	    }
	 	 	} else {
	 	 	    $result='<div class="alert alert-danger"><strong> H/O <strong>'.grstrtoupper($_POST['surname']).'  με ΑΦΜ:' .$_POST['afm'].' δεν υπάρχει στην Βάση των Αναπληρωτών Εκπαιδευτικών </div>';
	 	 	}
	 	 	$conn->close();

			

 	} 



 }

 




?>




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
    <form method="post" accept-charset='UTF-8' >

      
      <div class="form-group">
      <label for="surname">Επώνυμο</label>
      <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $_POST['surname']; ?>" />
      </div>

      
      <div class="form-group">
      <label for="surname">ΑΦΜ</label>
      <input type="text" name="afm" id="afm" class="form-control" value="<?php echo $_POST['afm']; ?>"/>
      </div> 
      <br>
      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Υποβολή"" />

<?php echo $result; ?>

     </div>

    
   </form>

</div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
