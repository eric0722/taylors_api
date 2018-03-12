<?php
require_once('modal/database_connector.php');
require_once('helper_function/library.php');



$action = isset($_GET['action'])?$_GET['action']:NULL;

$dataConnector = new DatabaseConnector();

//Construction of PDO Object
$connector = $dataConnector->pdoObjectRetreiever();

switch ($action) {
	case 'campus_news':

	if (isset($_GET['limit'])) {

		$limit = $_GET['limit'];

		$starting_point = isset($_GET['starting_point'])?$_GET['starting_point']:0;
		
		$query = 'SELECT * FROM campusnews ORDER BY id DESC LIMIT :starting_point,:limitation_num';
		$statement = $connector->prepare($query);
		$statement->bindValue(':starting_point',(int)$starting_point,PDO::PARAM_INT);
		$statement->bindValue(':limitation_num',(int)$limit,PDO::PARAM_INT);
		$statement->execute();
		$products = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();

		echoJsonResult($products,true);

	}else{
		echoJsonResult("limit was not specified", false);
	}
	break;
	
	case 'academic_news':
		
		if (isset($_GET['limit'])) {
	
		$limit = $_GET['limit'];

		$starting_point = isset($_GET['starting_point'])?$_GET['starting_point']:0;

		$query = 'SELECT * FROM academicnews ORDER BY id DESC LIMIT :starting_point,:limitation_num';
		$statement = $connector->prepare($query);
		$statement->bindValue(':starting_point',(int)$starting_point,PDO::PARAM_INT);
		$statement->bindValue(':limitation_num',(int)$limit,PDO::PARAM_INT);
		$statement->execute();
		$products = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		
		echoJsonResult($products,true);

	}else{
		echoJsonResult("limit argument not found",false);
	}

	break;
	case 'clubs_society':
		//This section checks for update of information in any clubs and society
		//DateComparison object must be submitted in order for the request to be processed		

		if (isset($_GET['date_comparison'])) {
		 	
		 	$comparisonTime = $_GET['date_comparison'];
			
		 	$query = 'SELECT * FROM clubsinformation WHERE :comparisonTime < updateTime';
		 	$statement = $connector->prepare($query);
		 	$statement->bindValue(':comparisonTime',$comparisonTime);
		 	$statement->execute();
		 	$products = $statement->fetchAll(PDO::FETCH_ASSOC);
		 	$statement->closeCursor;
		 	
		 	if (count($products) == 0) {
		 		echoJsonResult("All items are up to date",true);	
		 	}else{
		 		echoJsonResult($products,true);
		 	}

		 	
		 	
		 }else{
		 	echoJsonResult("date_comparsion argument not found",false);;
		 }

		break;
	case 'event_calendar':

		if (isset($_GET['present_time'])) {
				
			$present_time = $_GET['present_time'];

			$query = 'SELECT * FROM eventInformation WHERE :present_time < eventStartDate';
			$statement = $connector->prepare($query);
		 	$statement->bindValue(':present_time',$present_time);
		 	$statement->execute();
		 	$products = $statement->fetchAll(PDO::FETCH_ASSOC);
		 	$statement->closeCursor;

		 	if (count($products) == 0) {
		 		echoJsonResult("No Upcoming event",true);	
		 	}else{
		 		echoJsonResult($products,true);
		 	}

		}
		break;
	default:
		# code...
		break;
}


?>