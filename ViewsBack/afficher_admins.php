<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>
<?PHP include("include/header.php"); 
       include "../Core/adminC.php";
            

       
      
      
      
           $adminCoreInstance=new adminC();
$listadmins = $adminCoreInstance->afficherListAdmins();
?>
<style>

.divewi{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.enzel{
  width: 110px;
  height: 36px;
  background: #6a89cc;
  margin: 23px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-family: "montserrat",sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  transition: 0.4s;
  transform-style: preserve-3d;
  perspective: 800px;
}

.enzel::after{
  content: '';
  position: absolute;
  background: #4a69bd;
  transition: 0.4s;
}

.enzel1:hover{
  transform: rotateX(-20deg);
}
.enzel1:after{
  width: 100%;
  height: 24px;
  top: -24px;
  left: 0;
  transform-origin: 0 100%;
  transform: rotateX(90deg);
}



</style>

          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des Admins
<br>

<button style="margin-left: 0px;" class="enzel enzel1" onclick="window.location.href='ajouter_admin.php'"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i>ajouter admin</button>


            

          </div>
<!--
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example
            <a href="register.php" >afficher admins </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                 
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                  </tr>
                </tfoot>
                <tbody>
      
      -->


  
         <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                 
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                   

                  </tr>
                </thead>

                <tbody>
                <?php       
                  foreach($listadmins as $row){
                  ?>
                  <tr>
                    <td><?PHP echo $row['nom']; ?></td>
                    <td><?PHP echo $row['prenom']; ?></td>
                    <td><?PHP echo $row['email']; ?></td>
                    
                    
                      </form>
                  </tr>
              <?PHP
               }
               ?> 

                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      ?> 





    <?PHP include("include/footer.php") ;?>  
</body>


  <?php   
}
else {
     header('Location: login.php');
}

?>