<?php 
if(isset($_POST['submit'])){
    $to = 'mkostadinov87@gmail.com';
    $from = $_POST['email']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $subject = "Marsislav.NET:  Запитване";
    $subject2 = "marsislav.NET:  Запитване";
    $message =  $first_name . " " . $last_name . " with email " . $from . "and phone number: " . $phone . " wrote the following:" . "\n\n" . $_POST['message'] ;
    $message2 = "Ето копие от Вашето запитване " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    
    mail($from,$subject2,$message2,$headers2); 
     echo "<p class='text-success bold text-center'>Съобщението е изпратено. Благодаря, $first_name.  Ще се свържа с Вас скоро! </p>";

    }

?>
<form action="" method="post" id="form">
  <div class="row">
    <div class="col-md-6">
    <div class="form-control">
      <label for="first_name">Име: <span class="text-danger bold">*</span></label> 
      <input type="text" name="first_name" class="firstName" placeholder="Въведете Вашето име" required>

  </div>
    </div>
    <div class="col-md-6">
    <div class="form-control">
      <label for="last_name">Фамилия: <span class="text-danger bold">*</span></label>
      <input type="text" name="last_name" class="lastName" placeholder="Въведете Вашата фамилия..." required>

  </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
    <div class="form-control">
        <label for="phone">Телефон:</label>  
        <input type="number" name="phone" class="" placeholder="Въведете Вашият телефонен номер...">
  </div>
     </div> 
    <div class="col-md-6">
    <div class="form-control">
      <label for="email">Email адрес:<span class="text-danger bold">*</span></label>  
      <input type="email" name="email" class="email" placeholder="you@email.com" required>

  </div>
    </div>
  </div>
  <div class="form-control">
<label for="message">Съобщение:<span class="text-danger bold">*</span></label><br>
<textarea rows="8" name="message" placeholder="......" class="letter" required> </textarea><br>

  </div>
<button type="submit" name="submit" class="btn btn-primary">Изпрати...</button>
</form>

<script>

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


</script>



