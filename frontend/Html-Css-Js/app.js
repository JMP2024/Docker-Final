// Al cargar la página, hacemos la solicitud al backend para obtener los datos
document.addEventListener('DOMContentLoaded', () => {
  fetch('http://localhost:8000/api/alumno')  // Cambia a la URL correcta si es necesario
    .then(response => response.json())
    .then(data => {
      console.log(data);  // Verifica lo que contiene 'data'

      // Obtener el cuerpo de la tabla
      const tableBody = document.getElementById('tableBody');

      // Recorrer los datos y agregar cada fila a la tabla
      data.forEach(item => {
        const row = document.createElement('tr');
        
        const idCell = document.createElement('td');
        idCell.textContent = item.id;  // Asegúrate de que el campo 'id' esté en los datos
        row.appendChild(idCell);
        
        const nameCell = document.createElement('td');
        nameCell.textContent = item.nombre;  // Asegúrate de que 'nombre' esté en los datos
        row.appendChild(nameCell);
        
        const lastNameCell = document.createElement('td');
        lastNameCell.textContent = item.apellido;  // Asegúrate de que 'apellido' esté en los datos
        row.appendChild(lastNameCell);
        
        const emailCell = document.createElement('td');
        emailCell.textContent = item.email;  // Asegúrate de que 'email' esté en los datos
        row.appendChild(emailCell);

        tableBody.appendChild(row);
      });
    })
    .catch(error => {
      console.error('Error al obtener los datos:', error);
    });
});
