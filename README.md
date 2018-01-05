# Sistema-Auditorias

Autor: Luis Enrique Magdaleno de la Cruz
Version: 1.0

El objetivo del Sistema, tomando en cuenta la estructura de una auditoria(pruebas, métricas,controles). El sistema es monousuario, pero cada usuarios hace pruebas, metricas y controles que otros no pueden visualizar las auditorias realizadas por otros. Los formularios tiene los campos validados por lo que se reduce el riesgo de introduccion incorrecta de de datos.
El sistema cuenta con una pantalla en la cual lls usuarios se registran con su nombre de usuario y password, una pagina principal(frame) en donde se pueden acceder al menu con todas funciones las cuales son: Pruebas, Metricas, Controles e Impresion.

El proyecto fue realizado utilizando el Servidor WAMP en su version 2.0 el cual incluye:
  *PHP 5.3
  *MySQL 5.1.36
  *Apache 2.2.11 
  
Instalacion en Windows:
  -Descargar la Version 2.0 de WAMP.
  -Instalar wampserver.
  -Iniciar todos los servicios.
  -Pegar todos los arvhicos en la ruta donde se haya instalado wamp dentro de la carpeta "www" ("C:\wamp\www").
  -Ir a phpMyAdmin.
  -Crear la base de datos auditoria.
  -Ir a la pestaña 'Importar'.
  -Seleccionar el archivo "auditoria.sql".
  -Insertar otro usuario para probar la funcionalidad del sistema con diferentes usuarios.
  -Ir a la direccion "localhost/login.php", para ir al formulario de registro.
  
 Contacto: enrique_magdalenocruz@hotmail.com
