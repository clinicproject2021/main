    <?php 
    include './layout/header.php';
    ?>


          
            <div class="c-1200">
                <div id="page-title"><h3>BEST CARE & BETTER DOCTOR</h3>
              </div>
            </div>


         




<div class="container">

    <h4>CONTACT US</h4>
    <form role="form">
        
         <div class ="form-group">
        <lable for="name">Name:</lable>
      <i class="fa fa-user icon"></i>
        <input type ="name" class ="form-control" id ="name" placeholder="Enter Your Name"> 
    </div>
        
    <div class ="form-group">
        <lable for="email">Email:</lable>
      <i class="fa fa-envelope icon"></i>
        <input type ="email" class ="form-control" id ="email" placeholder="Enter Email"> 
    </div>
        
        <div class ="form-group">
        
    
    </div>
        
        <div>
        <label for="subject"></label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
        
        </div>
        <div class ="checkbox">
            <lable>  <input type="checkbox"> Remember me</lable>
            
            
        </div>
        
        <button type="submit" class ="btn btn-primary">Submit</button>
        
    </form>
</div>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<ul id="myUL">
    <li><a href="doctors.php">doctors</a></li>
    <li><a href="department.php">department</a></li>

    <li><a href="about-us.php">about us</a></li>
    <li><a href="contact-us.php">contact us</a></li>

 
</ul>
<div class="wrap">
   <div class="container">
    <div class="box box1"></div>
    <div class="box box2"></div>
    <div class="box box3"></div>
    <div class="box box4"></div>
    <div class="box box5"></div>
    <div class="box box6"></div> 
    <div class="box box7"></div>
    <div class="box box8"></div>
  </div>
</div>
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

    <?php 
    include './layout/footer.php';
    ?>