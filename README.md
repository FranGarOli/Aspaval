> Fran García Olivares

> ESPECIFICACIONES TÉCNICAS DEL PROYECTO

> 20 de Febrero del 2023
> 
> ![logo-Aspaval.png](https://i.postimg.cc/g0dvdhz3/logo-Aspaval.png)


## **¡Bienvenido a las especificaciones del proyecto!**

El proyecto consiste en desarrollar una asociación de pádel en la que los administradores de la plataforma puedan crear eventos, en éste caso partidos de pádel o torneos, y los miembros de la plataforma puedan apuntarse a dichos eventos.

Las personas que se registren en la aplicación web formarán parte de los miembros, dónde pueden ser visualizados por los demás miembros y aparecerán al apuntarse a cualquier evento. Así mismo, cada miembro puede editar su propia configuración, mandar mensajes a los administradores de la plataforma o ver información sobre nosotros.

##  TECNOLOGÍAS UTILIZADAS

Primeramente he utilizado **Laravel**, un framework que utiliza **PHP** para desarrollar la aplicación. Laravel se basa en el modelo VISTA-CONTROLADOR para organizar de la mejor manera las diferentes partes de la aplicación, la base de datos gestionada, las vistas que interpreta el navegador y los controladores que son los encargados de unir tanto la base de datos como la parte lógica de la aplicación.

Así mismo, he utilizado **Figma** para desarrollar todas las vistas y componentes que se utilizan en la aplicación y poder llevar un mejor seguimiento y estructuración de cómo iba a estar diseñada la aplicación antes de pasarla a producción.

Las imágenes utilizadas han sido extraídas de plugins de **Figma** como por ejemplo Unsplash o Iconify.

Para el alojamiento en el servidor he utilizado **Apache**, creando un host virtual que direccione a la carpeta “public” del proyecto de Laravel. Con esto conseguimos que el cliente únicamente pueda acceder desde su navegador a los recursos que se encuentran en dicha carpeta, haciendo así que la aplicación se encuentre más segura.

Dicho proyecto ha sido implementado en una máquina virtual con un servidor Apache, pero por el momento no está disponible para el público. 

Para guardar los datos de la aplicación se ha utilizado **mysql** y poder así gestionar los datos de los usuarios.



## **CASOS DE USO**

Las acciones en función del rol del usuario son las siguientes:

Un **usuario sin loguear**:

 - Puede ver los miembros de la aplicación y visualizar la lista de
   todos los eventos sin poder acceder a un evento en concreto.
 - Puede mandar un mensaje añadiendo un nombre con el que será
   representado.
 - Puede acceder a la información de la asociación como a las cookies y
   a la localización donde se encuentra la asociación.

  

Un **usuario logueado**, puede hacer lo mismo que el rol anterior y además puede:

 - Acceder a un evento en concreto y se le permite apuntarse a dicho
   evento.
 - Puede mandar mensajes sin necesidad de añadir su nombre.
 - Puede editar la configuración de su cuenta y agregar una foto de
   perfil.

Un **administrador** , puede hacer todo lo citado anteriormente y además puede:

 - Crear eventos para los miembros.
 - Borrar eventos y sus participantes.
 - Visualizar eventos que no se encuentren visibles.
 - Cambiar el rol de los miembros.
 - Ver todos los mensajes y borrarlos.

## **FUTURAS MEJORAS**

La aplicación está sujeta a cambios futuros así como por ejemplo:

 - Poder añadir un máximo de participantes para cada evento.
 - Poder crear un chat a modo de comentarios en cada evento por si los
   participantes tienen que comentar algo sobre dicho evento.
 - Poder agregar secciones a modo de categorías.
 - Posibilidad de poder crear un directo en cada evento y poder
   retransmitirlo desde ahí.
 - Crear una sección de merchandising dentro de la aplicación.
