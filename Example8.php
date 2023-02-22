<?php
//create connection
$conn = new mysqli("localhost","root","","university");


//check connection
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
echo "connection successfull";//ithu potalam illati potamalum utalm

if(!empty($_POST['submit'])){
    if($_POST['pwd'] == $_POST['pwd2']){
        //inserting values
        //very very important inka kudukura name example Student_Name athuhal
        // table create pannumpothu colum name aha eppidi kuduthamo appidi irukanum illati error kaatum 
        //big mistake foun me.
        $sql = "insert into Student(Student_Name,Password,Studnet_Age,Student_ContactNumber,Studnet_Hometown,
        Student_Email) values 
        ('$_POST[sname]', md5('$_POST[pwd]'), '$_POST[age]', '$_POST[contact]',
         '$_POST[htown]', '$_POST[mail]')";
    
              if($conn->query($sql) === true)
              {
                   echo "<br>New record inserted successfully";
              }
               else
              {
                   echo "<br>Error: ",$sql."<br>".$conn->error;
              }
    }
    else
    {
        echo "<br>Password not matched";
    }
}
$conn->close();
?>

<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <form action= "<?php $_PHP_SELF ?>" method = "post">
    <!-- very very important keelukkulla form oru olinkane alignment illa athavathu : <- intha markkkukkiu
     keela ellam sariya varuthu illa in the outputla so table tag use panni border illamal kuduthal ok. <tr>,<td> 
        tags im inka use pannappadumaa
     -->
         <p>
         <label>Student Name     : <input type="text" name = "sname"><br></label>
         </P>
         
         <p>
         <label>Password          : </label><input type="password" name = "pwd"><br>
        </P>
         
         <p>
         <label>Re-Enter Password : </label><input type="password" name = "pwd2"><br>
         </P>
         
         <p>
         <label>Student Age       : </label><input type="number" name = "age"><br>
         </P>
         
         <p>
         <label>Student Contact No : </label><input type="number" name = "contact"><br>
         </P>
         
         <p>
         <label>Student Hometown   : </label><input type="text" name = "htown"><br>
         </P>
         
         <p>
            <label>Student Email   : </label><input type="email" name = "mail"><br>
        </P>
         
         <p>
         <input type = "submit" name = "submit" value = "Complete registration">
         </P>
         
   </form>
</body>
</html>
