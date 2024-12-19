function add(){
    const form = document.getElementById('formu');
    const formData = new FormData(form);

    const jsonData = {};
    formData.forEach((value, key) => {
      jsonData[key] = value;
    });

    var url = "http://localhost/formulario";
    var data = JSON.stringify(jsonData);
    
    fetch(url, {
      method: "POST", // or 'PUT'
      body: data, // data can be `string` or {object}!
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((res) => res.json())
      .catch((error) => console.error("Error:", error))
      .then((response) => console.log("Success:", response));
    
      
}