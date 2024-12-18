let data = fetch('http://localhost/usuarios')
  .then(response => response.json())
  .then(data =>{
    let tabla = document.getElementById('tabla');
data.forEach(element => {
    let tr = document.createElement('tr');
    let th_id = document.createElement('th');
    let th_nom = document.createElement('th');
    let th_corr = document.createElement('th');
    let th_mat = document.createElement('th');
    let th_cont = document.createElement('th');
    let th_img = document.createElement('th');
    th_id.textContent = element['id_usuario'];
    th_nom.textContent = element['nombre'];
    th_corr.textContent = element['correo'];
    th_mat.textContent = element['matricula'];
    th_cont.textContent = element['contrasena'];
    th_img.textContent = element['imagen'];
    tr.appendChild(th_id);
    tr.appendChild(th_nom);
    tr.appendChild(th_corr);
    tr.appendChild(th_mat);
    tr.appendChild(th_cont);
    tr.appendChild(th_img);
    tabla.appendChild(tr);
});
});