let tableBanners; 
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableBanners = $('#tableBanners').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Banners/getBanners",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"url_image"},
            {"data":"options"}

        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"asc"]]  
    });

	if(document.querySelector("#formBanner")){
        let formBanner = document.querySelector("#formBanner");
        formBanner.onsubmit = function(e) {
            e.preventDefault();
            let image = document.querySelector('#file').value;

            if(image == '' )
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            divLoading.style.display = "flex";
            
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Banners/setBanners'; 
            let formData = new FormData(formBanner);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableBanners.api().ajax.reload();
                        }else{
                           rowTable.cells[1].textContent =  id;
                           rowTable.cells[2].textContent =  url_image;
                           rowTable = "";
                        }
                        $('#modalformBanner').modal("hide");
                        formBanner.reset();
                        swal("Banners", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }


}, false);


function fntViewInfo(idbanner){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Banners/getBannersun/'+idbanner;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
           
            if(Object.keys(objData).length > 0)
            {
                document.querySelector("#celImagen").innerHTML = "<img class='img-fluid' src='"+objData.url_image+"'>";
                $('#modalViewBanner').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}



function fntDelInfo(idbanner ){
    swal({
        title: "Eliminar Banner",
        text: "¿Realmente quiere eliminar al cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Banners/delBanners';
            let strData = "idBanner="+idbanner;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableBanners.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function openModal()
{
    rowTable = "";
    document.querySelector('#idBanner').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Banner";
    document.querySelector("#formBanner").reset();
    
    $('#modalFormBanner').modal('show');
}

(function(){
    function filePreview(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
         reader.onload = function(e){
          $('#imagePreviewbanner').html("<img src='"+e.target.result+"' width='150' heigth='150' >");
         }
         reader.readAsDataURL(input.files[0]);
      }
    }
    $('#file').change(function(){
      filePreview(this);
   
    })
  })();