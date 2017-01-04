<?php
//db connection
require_once('inc/db.php');
//import functions.php
require_once('inc/functions.php');

//get slug
$a_id = $_GET['athlete'];

// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM athletes
LEFT JOIN exercises ON athletes.a_id=exercises.athleteID WHERE athletes.a_id=$a_id
";

$sql2 = "SELECT * FROM exercises
JOIN athletes ON exercises.athleteID=athletes.a_id WHERE athletes.a_id=$a_id
";


$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);

$data_array = array();
if ($result2->num_rows > 0) {
  // output data of each row
  while($a = $result2->fetch_assoc()) {	  
	 $dt = date('Y-m-d', strtotime($a['e_date']));
	 $data_array[$dt] = '<a href=workout-detail.php?workout=' . $a['e_id'] .'>' . $a['exercise']. '</a>';	
  }
} else {
  echo "There are no workouts";
}
$conn->close();


checkSession('userna');
$pageTitle = "athletes-detail";
include("inc/header-detail.php");

function getIsoWeeksInYear($year) {
    $date = new DateTime;
    $date->setISODate($year, 53);
    return ($date->format("W") === "53" ? 53 : 52);
}

// number of week row in calendar
$week_row = 3;

// set year, week month default current
$year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
$month = (isset($_GET['month'])) ? $_GET['month'] : date("m");
$week = (isset($_GET['week'])) ? $_GET['week'] : date('W');

// get total week of year
$weeks = getIsoWeeksInYear($year);


$athlete = (isset($_GET['athlete'])) ? $_GET['athlete'] : 0;


if (($week + $week_row) > $weeks) {	
    $next_week = (($week + $week_row) - $weeks);
	$next_year = $year + 1;
	
	$prev_week =  (($week - $week_row) < 1) ? $weeks : ($week - $week_row);
	$prev_year = (($week - $week_row) < 1) ? $year-1 : $year;	
	
} else {
	$next_week = ($week + $week_row);
	$next_year = $year;
	
	$prev_year = (($week - $week_row) < 1) ? $year-1 : $year;	
	$prev_year_weeks = getIsoWeeksInYear($prev_year);
	$prev_week = (($week - $week_row) < 1) ? ($prev_year_weeks + ($week - $week_row)) : ($week - $week_row);	
}

?>

	
    <div class="list">	
    
        <div class="cal-nav">
            <h3>Workout Plan</h3>
            
            <div>
            <span>
            <?php 
            $wkt = sprintf("%02d", $week);
            $wkt2 = sprintf("%02d", $week + ($week_row - 1));	
            $sd = strtotime($year ."W". $wkt . '1');
            $ld = strtotime($year ."W". $wkt2 . '7'); 	
            if (($week + $week_row) > $weeks) {
				
				$tmpy = ($year+1);
				$yrwk = getIsoWeeksInYear($tmpy);
				$nwk = ($week_row - ($weeks - $week))-1;	
				//echo ($weeks - $week).'==='.$weeks;
				if ($nwk == 0) {
					$wkt2 = sprintf("%02d", $week + ($week_row - 1));
					$ld = strtotime($year ."W". $wkt2 . '7'); 					
				} else {
					$wkt2 = sprintf("%02d", $nwk); 
					$ld = strtotime($tmpy ."W". $wkt2 . '7');            
				}
				
				//echo ($week_row - ($yrwk - $week)).'===='.$yrwk.'=='.$week;
				
            }
            echo date('M d, Y', $sd).' - '.date('M d, Y', $ld);
            ?>
            </span>
            <a class="next" href="<?php echo $_SERVER['PHP_SELF'].'?athlete='.$athlete.'&week='.$next_week.'&year='.$next_year; ?>">&gt;</a> <!--Next week-->
            <a class="prev" href="<?php echo $_SERVER['PHP_SELF'].'?athlete='.$athlete.'&week='.$prev_week.'&year='.$prev_year; ?>">&lt;</a> <!--Previous week-->
            </div>
        </div>

		<br /><br /><br />

      <ul>
        <?php
			
			// print days name
			for($day= 1; $day <= 7; $day++) {
				$wk1 = sprintf("%02d", $week);
				$d = strtotime($year ."W". $wk1 . $day);			
				echo '<li class="day">'. date('l', $d) .'</li>';
			}
			
			// print date block			
			for ($k = 0; $k < $week_row; $k++) {
				
				for($day= 1; $day <= 7; $day++) {
					
					$wk1 = sprintf("%02d", $week);
					$d = strtotime($year ."W". $wk1 . $day);
				
					$dbdate = date('Y-m-d', $d);
					$link = isset($data_array[$dbdate]) ? $data_array[$dbdate] : '';
					echo '<li><p class="date">'. date('d', $d) .'<p><br />'.$link.'</li>';
					
					
				}
				echo '<li class="week">Week '.(int)$week.'</li>';
				
				$year = ($week >= $weeks) ? $year+1 : $year;
				$week = ($week >= $weeks) ? 1 : $week+1;
								
			}
		
              ?>
      </ul>

    </div><!-- End of list -->

<?php include("inc/footer.php"); ?>
