# Ejercicio de Laravel para el manejo de objetos con el patrón MVC
## Interfaz
Desarrolle las clases Java necesarias que implemente el patrón arquitectónico: Modelo Vista Controlador, la aplicación debe permitir calcular factorial, Fibonacci y Ackerman. La aplicación debe de mostrar la interfaz de usuario que se muestra a continuación.
<img width="342" height="270" alt="image" src="https://github.com/user-attachments/assets/ea89f59e-3c9f-4ce2-ab00-8d00c5eff119" />
</br>
Debe hacer uso de la persistencia de objetos (utilizando el sistema de archivos de Java o el sistema gestor de objetos DB4O), grabe los objetos que contengan los valores que se hayan calculado, haga uso del siguiente tipo de dato abstracto: </br>
<img width="228" height="134" alt="image" src="https://github.com/user-attachments/assets/d43a61f2-f93a-45ed-a013-ebe1d29e0341" />
</br>
Cuando un usuario solicite el cálculo de un valor, primero debe de checar si ya existe en la persistencia de objetos y regresar el objeto que representa al resultado, de no existir calcularlo y grabar el objeto.

