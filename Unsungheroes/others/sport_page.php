<?php
session_start();

$query = "SELECT * FROM `sensory_park_and_playground` ORDER BY facility_name";
$db_data = $wpdb->get_results($query);
$selected = "";

$s0 = "";
$s1 = "";
$s2 = "";
$s3 = "";
$s4 = "";


if (isset($_POST['submit'])) {

  $selected = $_POST['area'];

  if ($selected == "Melbourne" || $selected == "") {
    $query = "SELECT * FROM `sensory_park_and_playground` ORDER BY facility_name";
    $db_data = $wpdb->get_results($query);
    $s0 = "selected";
  } else {

    $query = "SELECT * FROM `sensory_park_and_playground` WHERE area_of_Melbourne = \"$selected\" ORDER BY facility_name";
    $db_data = $wpdb->get_results($query);


    if ($selected == "Central Melbourne") {
      $s1 = "selected";
    }
    if ($selected == "Melbourne North East Region") {

      $s2 = "selected";
    }
    if ($selected == "Melbourne South East Region") {

      $s3 = "selected";
    }
    if ($selected == "Melbourne South West Region") {

      $s4 = "selected";
    }
  }
}


?>
 
<style type="text/css">
  /* Set the size of the div element that contains the map */
  #map {
    height: 600px;
    /* The height is 400 pixels */
    width: 100%;
    /* The width is the width of the web page */
  }



  /* Element style of the accordion */
  .elementor-931 .elementor-element.elementor-element-d9b231 .eael-adv-accordion .eael-accordion-list .eael-accordion-header .eael-accordion-tab-title {
    color: #333;
  }

  .elementor-931 .elementor-element.elementor-element-d9b231 .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa-toggle {
    color: #444;
  }

  .elementor-931 .elementor-element.elementor-element-d9b231 .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover {
    background-color: #61ce70;
  }

  .elementor-931 .elementor-element.elementor-element-d9b231 .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .eael-accordion-tab-title {
    color: #fff;
  }

  .elementor-931 .elementor-element.elementor-element-d9b231 .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .fa-toggle {
    color: #fff;
  }

    /* Hover for pointer*/
    .list-href:hover {
      cursor: pointer;

    }
</style>

<head>
  <script type="text/javascript">
    //Set the Cookie for the posistion
    function SetCookie(sName, sValue) {
      document.cookie = sValue;

    }

    //Get the Cookie for the posistion numbers
    function GetCookie(sName) {
      var aCookie = document.cookie.split(";");

      aCookie = aCookie.toString();


      var rValue = "";
      var index = 0;

      //Detect the fourth char inside acookie is number or not
      //is number which rvalue got four digits
      for(var i = 0; i < aCookie.length; i++){      
        if(aCookie.charAt(i)==","){
          index = i;
          break;
        }
      }

      rValue = aCookie.substring(0, index);

      

      return rValue;         
      
    }
  </script>
</head>


<body onscroll="SetCookie(scroll,document.documentElement.scrollTop)" onload="goPage(1,10)">


  <div class="elementor-widget-wrap elementor-element-populated">
    <div class="elementor-element elementor-element-b0aa2c9 elementor-tabs-alignment-center elementor-tabs-view-horizontal elementor-widget elementor-widget-tabs" data-id="b0aa2c9" data-element_type="widget" data-widget_type="tabs.default">
      <div class="elementor-widget-container">
        <div class="elementor-tabs">
          <div class="elementor-tabs-wrapper" role="tablist">
            <div id="elementor-tab-title-1851" class="elementor-tab-title elementor-tab-desktop-title elementor-active" aria-selected="true" data-tab="1" role="tab" tabindex="0" aria-controls="elementor-tab-content-1851" aria-expanded="true">Parks and playgrounds</div>
            <div id="elementor-tab-title-1852" class="elementor-tab-title elementor-tab-desktop-title" aria-selected="false" data-tab="2" role="tab" tabindex="-1" aria-controls="elementor-tab-content-1852" aria-expanded="false">Let's watch it on map</div>
          </div>
          <div class="elementor-tabs-content-wrapper" role="tablist" aria-orientation="vertical">


            <div class="elementor-tab-title elementor-tab-mobile-title elementor-active" id="list" aria-selected="true" data-tab="1" role="tab" tabindex="0" aria-controls="elementor-tab-content-1851" aria-expanded="true">Parks and playgrounds</div>
            <div id="elementor-tab-content-1851" class="elementor-tab-content elementor-clearfix elementor-active" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-1851" tabindex="0" style="display: block;outline:none;">

              <h3>Find parks and playgrounds here:</h3>

              <?php


              echo '   <form name="my-form" method="post" style="margin-bottom:50px;">
      
              <select name="area">
              <option value="" selected disabled hidden>Select region here:</option>
              <option ' . $s0 . ' value="Melbourne">All</option>
              <option ' . $s1 . ' value="Central Melbourne">Central Melbourne</option>
              <option ' . $s2 . ' value="Melbourne North East Region">Melbourne North East Region</option>
              <option ' . $s3 . ' value="Melbourne South East Region">Melbourne South East Region</option>
              <option ' . $s4 . ' value="Melbourne South West Region">Melbourne South West Region</option>
              </select>
            


              <input type="submit" name="submit" value="Let\'s find" style="text-align:center;margin-left:20px;width: 100px;padding: 2px 0px 2px 0; οnclick="javascript:window.location.hash=\'https://unsungheroes.tk/sport#add\' ">
        
             </form>
           '; ?>



              <?php //Show the location list
              if ($selected == "") {
                echo '<h3>List of parks and playgrounds inside melbourne:</h3>';
              } else {
                echo '<h3>List of Parks and playgrounds inside ' . $selected . ':</h3>';
              }
 
         
              echo ' <table id="idData">';
              for ($i = 0; $i <= count($db_data) - 1; $i++) {
                echo "
                <tr><td>
                <div class='elementor-element elementor-element-d8874b9 elementor-widget elementor-widget-eael-adv-accordion' data-id='d8874b9' data-element_type='widget' data-widget_type='eael-adv-accordion.default'>
                <div class='elementor-widget-container'>
                      <div class='eael-adv-accordion' id='eael-adv-accordion-3d5691d' data-accordion-id='3d5691d' data-accordion-type='accordion' data-toogle-speed='300'>
            <div class='eael-accordion-list'>
                     
                        <div id='elementor-tab-title-6431' class='elementor-tab-title eael-accordion-header' tabindex='6431' data-tab='1' role='tab' aria-controls='elementor-tab-content-6431' style='border-radius: 20px;'>
                        <span class='eael-accordion-tab-title' style='font-family:Custom-font-Milk;font-size: 20px;text-align:center'>" . $db_data[$i]->facility_name . "</span>
                        <i aria-hidden='true' class='fa-toggle fas fa-angle-right'></i></div>
                        <div id='elementor-tab-content-6431' class='eael-accordion-content clearfix' data-tab='1' role='tabpanel' aria-labelledby='elementor-tab-title-6431' style='border-radius: 20px;'>
                        <div style='float:left;text-align:left'>
                        <h4>Address: <span style=\"color:#6f6e6e;font-size:15px\"> " . $db_data[$i]->address . " </span></h4>
                        <h4>Features: <span style=\"color:#6f6e6e;font-size:15px\">" . $db_data[$i]->facility_features . "</span></h4>
                        </div>
  
                        <div style='float:right' class='swing'>
                        <a href='#' id='" . $db_data[$i]->facility_name . "' class='map-href" . $db_data[$i]->facility_id . " 'onclick='myFunction(this.id);return false;'>
                        <img src='https://unsungheroes.tk/wp-content/uploads/2021/05/google-maps.png' alt='HTML tutorial' style='width: 60px;height: 60px;'>
                        </a>
                        </div>
                        
                        </div>
                        </div></div></div>
                </div>
                </td></tr>
                        ";

              }

              echo ' </table>';

              echo "<div id='pagination'></div>"

          


              ?>
            </div>




            <div class="elementor-tab-title elementor-tab-mobile-title" id="map-tab" aria-selected="false" data-tab="2" role="tab" tabindex="-1" aria-controls="elementor-tab-content-1852" aria-expanded="false">Let's watch it on map</div>
            <div id="elementor-tab-content-1852" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-1852" tabindex="0" style="outline: none;">
              <!--The div element for the map -->
              <div id="map"></div>

              <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANM6GXI_vOSAcGTFiOu7t_DRApnFUz5qs&language=en&callback=initMap&libraries=&v=weekly" async></script>

              <script>
                var allMarkers = [];

                function initMap() {
                  window.map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: {
                      lat: -37.817035,
                      lng: 144.946457
                    },
                  });


                  var db_data = <?php echo json_encode($db_data); ?>;
                  var infowindow = new google.maps.InfoWindow();



                  for (var i = 0; i < db_data.length; i++) {
                    const contentString =
                      '<div id="content">' +
                      '<h4 id="firstHeading" class="firstHeading">' + db_data[i].facility_name + '</h4>' +
                      '<div id="bodyContent">' +
                      "<p>Address:" + db_data[i].address + "</p>"
                    "</div>";

                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(parseFloat(db_data[i].latitude), parseFloat(db_data[i].longitude)),
                      text: db_data[i].facility_name,
                      map: map
                    });



                    allMarkers.push(marker);

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                      return function() {
                        infowindow.setContent(contentString);
                        infowindow.open(map, marker);
                      }
                    })(marker, i));
                  }



                }


                function myFunction(id) {

                  for (var i = 0; i < allMarkers.length; i++) {

                    if (id == allMarkers[i].text) {
                      //set map location
                      map.setZoom(15);
                      map.setCenter(allMarkers[i].getPosition());

                      //switch the tab menus
                      document.getElementById("map-tab").click();
                      new google.maps.event.trigger(allMarkers[i], 'click');
                      window.scrollTo(0, 700);
                    }
                  }
                }
              </script>




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
function goPage(pageIndex,psize){

    //Scroll the pages on load
    if (GetCookie("scroll") != null) {
        window.scrollTo(0, GetCookie("scroll"));

        console.log(GetCookie("scroll"));
    }
  
  
  //Pagination function for tables
  var locationTable = document.getElementById("idData");
  var num = locationTable.rows.length;
  var totalPage = 0;
  var pageSize = psize;


  
  //How many pages for the table
  if(num/pageSize > parseInt(num/pageSize)){
      totalPage=parseInt(num/pageSize)+1;
    }else{
      totalPage=parseInt(num/pageSize);
    }
  var currentPage = pageIndex;
  //index of start rows
  var startRow = (currentPage - 1) * pageSize + 1; 
    //Index of end rows
    var endRow = currentPage * pageSize;
    endRow = (endRow > num)? num : endRow; 
    
    //Set the row width based on switch DIV width
    rowWidth = document.getElementById("elementor-tab-content-1851").offsetWidth/1.05;
    //loop the table
  for(var i=1;i<(num+1);i++){
    var irow = locationTable.rows[i-1];

    if(i>=startRow && i<=endRow){
      irow.style.display = "grid";
      irow.style.width = rowWidth+"px";    
    }else{
      irow.style.display = "none";
    }
  }
  var tempStr = "";
  
  if(currentPage>1){  

    tempStr += "<div style=\"float:left\"><a class=\"list-href\" onClick=\"goPage("+(currentPage-1)+","+psize+")\"><img src=\"https://unsungheroes.tk/wp-content/uploads/2021/04/left.png\" style=\"width:50px\" ></a></div>"

  }else{
  }
  if(currentPage<totalPage){
    tempStr += "<div style=\"float:right\"><a class=\"list-href\" onClick=\"goPage("+(currentPage+1)+","+psize+")\"><img src=\"https://unsungheroes.tk/wp-content/uploads/2021/04/right.png\" style=\"width:50px\" ></a></div>";
  }else{
  }
  document.getElementById("pagination").innerHTML = tempStr;
}

</script>