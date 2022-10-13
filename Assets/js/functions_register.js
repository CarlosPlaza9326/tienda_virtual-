let rowTable = "";

document.addEventListener('DOMContentLoaded', function(){

	if(document.querySelector("#formRegister2")){
        let formRegister = document.querySelector("#formRegister2");
        formRegister.onsubmit = function(e) {
            e.preventDefault();
            let strNombre = document.querySelector('#txtNombreregister').value;
            let strApellido = document.querySelector('#txtApellidoregister').value;
            let strEmail = document.querySelector('#txtEmailClienteregister').value;
            let intTelefono = document.querySelector('#txtTelefonoregister').value;
    
            if(strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' )
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
    
            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 
            
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Tienda/registro'; 
            let formData = new FormData(formRegister);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        window.location.reload(false);
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
               
                return false;
            }
        }
    }


}, false);






function openModalregister()
{
    rowTable = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Registrese";
    document.querySelector("#formRegister2").reset();
    $('#modalFormRegister').modal('show');
}

