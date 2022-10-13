<?php
  headerAdmin($data);
  getModal('modalPerfil',$data);
 ?>
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
      <div class="profile">
        <div class="info">
          
                <div id="habilitar_imagen" >   
                      <?php  $time = date("H:i:s");?>
                  <div class="col-md-12" id="imagePreview">
                    <img style='border-radius:0 !important; max-width:none' width='300' height='200' src="<?= media();?>/images/<?php echo $_SESSION['idUser']?>.png?time=<?php echo $time ?>">   
                   
                  </div>
                  <form id="subirimagen">
                  <div class="col-md-12">
                     
                        <label for="file" class="btn btn-info"> <i class="fas fa-plus"></i></label>
                        <input type="file" name="file" id="file" style='display: none;' accept="image/*" />

                        <label  class="btn btn-success" onclick="carga_imagen()"> <i class="fas fa-save"></i></label>
                  
                   
                  </div>
                </form>
                </div>
            <h4><?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos']; ?></h4>
            <p><?= $_SESSION['userData']['nombrerol']; ?></p>
        </div>
        
        <div class="cover-image"></div>
      </div>
    </div>

    <div class="col-md-11">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="timeline-post">
            <div class="post-media">
              <div class="content">
                <h5>DATOS PERSONALES &nbsp&nbsp<button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
              </div>
            </div>

            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td style="font-weight:bold">Identificación:</td>
                  <td><?= $_SESSION['userData']['identificacion']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold">Nombres:</td>
                  <td><?= $_SESSION['userData']['nombres']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold">Apellidos:</td>
                  <td><?= $_SESSION['userData']['apellidos']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold">Teléfono:</td>
                  <td><?= $_SESSION['userData']['telefono']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold">Email (Usuario):</td>
                  <td><?= $_SESSION['userData']['email_user']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php footerAdmin($data); ?>

<script>
     (function(){
    function filePreview(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
         reader.onload = function(e){
          $('#imagePreview').html("<img src='"+e.target.result+"' style='border-radius:0 !important; max-width:none' width='300' height='200' >");
         }
         reader.readAsDataURL(input.files[0]);
      }
    }
    $('#file').change(function(){
      filePreview(this);
   
    })
  })();
</script>