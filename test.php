<?php 
// "2025年1月1日, 2025年2月2日, 2025年3月3日, 2025年3月4日"
function getDate ($date) {
  $result = array($date.replace(-----));
  // $resutl = ["2025年1月1日", "2025年2月2日", "2025年3月3日", "2025年3月4日"]
}
?>



<html>
  <div>
    <div>
      <?php // evnet01の期間
      $evnet01_date = $this->eventInfo('0', '1', 'name');
      $result = getDate($evnet01_date);
      ehco $result[01] + '~' + $result[02];
      ?>
    </div>

    <div>
      <?php // evnet02の期間
      $evnet02_date = $this->eventInfo('0', '1', 'name');
      $result = getDate($evnet02_date);
      ehco $result[01] + '~' + $result[02];
      ?>
    </div>
    <p></p>
  </div>
</html>