<?php

include_once("connection.php");
include_once("header.php");

?>
<section id="que1" class="contact">
  <div class="container">
    <div id="box_main_title" class="row">
      <div class="col-md-12">
        <div class="coffret">
          <h3> CONTACT US </h3>
          <form>
            <ul class="left-form">
              
              <li>
                <input type="text" placeholder="Name" required="">
                <a href="#" class="icon ticker"> </a>
                <div class="clear"> </div>
              </li> 
              <li>
                <input type="email" placeholder="Email" required="">
                <a href="#" class="icon ticker"> </a>
                <div class="clear"> </div>
              </li> 
              <li>
                <input type="text" placeholder="Subject" required="">
                <a href="#" class="icon into"> </a>
                <div class="clear"> </div>
              </li> 
              <li>
                <textarea name="message">Message</textarea>
                <div class="clear"> </div>
              </li> 
               <input type="submit" onclick="myFunction()" value="Submit">
                <div class="clear"> </div>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- END QUE SECTION -->


<!-- START brands SECTION -->


<section id="que">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="domicile">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5953.510193245899!2d153.02404968716056!3d-27.469933666883385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a1d064dcb2f%3A0x7f3aed61f0bfd9e3!2sJames+Cook+University%2C+Brisbane+Campus!5e0!3m2!1sen!2sau!4v1548030290866" width="100%" height="400" frameborder="0" style="border:0"></iframe>
       

      </div>
    </div>
  </div>
</section>



<!-- END brands SECTION -->

<div class="row space50"></div>
<?php
include_once("footer.php");
?>


