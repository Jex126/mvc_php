function accion(method) {
  switch (method) {
    case 'POST': add(method);
      break;
    case 'PUT': add(method);
      break;
  }
}

async function add(method) {
  //expreción regular para comprobar correos electrónicos
  const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  /*
  obtención de los datos del formulario en un objeto
  */
  const form = document.getElementById('formu');
  const formData = new FormData(form);
  const jsonData = {};
  formData.forEach((value, key) => {
    jsonData[key] = value;
  });
  let url = "http://localhost/formulario";
  let data = JSON.stringify(jsonData);
  // 1.- validación para comprobar que todos los campos estén llenos
  if (jsonData['nombre'] && jsonData['correo'] && jsonData['matricula'] && jsonData['contrasena'] && jsonData['imagen']) {
    // 2.- Si todos están completos, se valida el correo, que cumpla con la expreción regular
    // en caso de no cumplirse envía una alerta al usuario
    if (!regex.test(jsonData['correo'])) {
      alert("Correo inválido");
    } else {
      // si todos los campos son válidos, se realiza la petición
      fetch(url, {
        method: method,
        body: data,
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((res) => res.json())
        .catch((error) => console.error("Error:", error))
        .then((response) => {
          if (method == "POST") {
            statusIns(response);
          }else if(method == "PUT"){
            statusAct(response);
          }
        });
    }
    // si algún campo no se encuentra lleno, se valída uno por uno
  } else {
    if (!jsonData['nombre']) {
      alert("Flata Nombre");
    } else if (!jsonData['correo']) {
      alert("Falta Correo");
    } else if (!jsonData['matricula']) {
      alert("Falta Matricula");
    } else if (!jsonData['contrasena']) {
      alert("Falta Contraseña");
    } else if (!jsonData['imagen']) {
      alert("Falta Ruta de la imagen");
    }
  }
}
function statusIns(response){
  if (response == "0") {
    alert('Se agregó correctamente');
  } else if (response == "1") {
    alert('Error al agregar');
  } else if (response == "2") {
    alert('Matrícula ya registrada');
  } else {
    alert("Ha ocurrido un error, verifique sus datos");
  }
}
function statusAct(response){
  if (response == "0") {
    alert('Se Actualizó correctamente');
  } else if (response == "1") {
    alert('correo ya registrado');
  } else if (response == "2") {
    alert('Matrícula ya registrada');
  } else {
    alert("Ha ocurrido un error, verifique sus datos");
  }
}