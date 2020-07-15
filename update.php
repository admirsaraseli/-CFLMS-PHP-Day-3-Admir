<?php 
    require_once 'actions/db_conn.php';

    if ($_GET['id']) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM classic_cars WHERE cls_cars_id = {$id}" ;
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
       
        mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Car Rental agency</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Car Rental</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="insertcar.php">Insert Car</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
        </li>
        </ul>
    </div>
    </nav>
    <header>
        <div class="jumbotron main_header" >
            <h1 class="display-4">Car Rental agency</h1>
            <p class="lead">Enjoy your ride.</p>
        </div>
    </header>
    <div class="container w-25 font-weight-bold">
        <form action="actions/a_update.php" method ="post" >
            <div class="form-group " >
                <label for="available" class="mr-3">Available:</label>
                 <?php if ($data['available'] == 1) {
                    echo '
                    <input type="radio"  name="available" checked value="1">Yes
                    <input type="radio"  name="available" value="0"> No';
                 }else {
                    echo '
                    <input type="radio"  name="available"  value="1"> Yes
                    <input type="radio"  name="available" checked value="0">No';
                 }  ?>
                
            </div>
            <div class="form-group ">
                <label for="brand">Brand: </label>
                <input type="text" class="form-control" name="brand" 
                value="<?php echo $data['brand'] ?>">
            </div>
            <div class="form-group ">
                <label for="year">Year: </label>
                <input type="number" class="form-control" name="year" 
                value="<?php echo $data['year'] ?>">
            </div>
            <div class="form-group">
                <label for="price">Price: </label>
                <input type="number" class="form-control" name="price" 
                value="<?php echo $data['price'] ?>">
            </div>
            <div class="form-group">
                <label for="location">Location: </label>
                <input type="text" class="form-control" name="location" 
                value="<?php echo $data['location'] ?>">
            </div>
            <div class="form-group">
                <label for="location">Image Path: </label>
                <input type="text" class="form-control" name="image" 
                value="<?php echo $data['image'] ?>">
            </div>
            <div class="form-group">
                <input type= "hidden" name= "id" value="<?php echo $id ?>" />
                <input type="submit" class="btn btn-warning mx-auto" value="Save data">
                <input type="button" class="btn btn-success mx-auto" value="Back">
            </div>
        </form>
    </div>
</body>
</html>

<?php
}
?>