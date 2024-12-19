function add(){

    /*
    Siguiente actualización: validar campos
    */
    const form = document.getElementById('formu');
    const formData = new FormData(form);

    const jsonData = {};
    formData.forEach((value, key) => {
      jsonData[key] = value;
    });

    var url = "http://localhost/formulario";
    var data = JSON.stringify(jsonData);
    
    fetch(url, {
      method: "POST", 
      body: data, 
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((res) => res.json())
      .catch((error) => console.error("Error:", error))
      .then((response) => {
        if(response=="0"){
            alert('Se agregó correctamente');
        }else if (response=="1"){
            alert('Error al agregar');
        }
      });
    
      
}