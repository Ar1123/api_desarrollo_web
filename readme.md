# Nota
    Este API posee el CRUD para la sección de las bebidas y sus respectivas categorias

 # Endpoint bebida
 
 - GET     http://localhost/Api_desarrollo_web/bebidas       // Obtiene todas la bebidas
 - GET     http://localhost/Api_desarrollo_web/bebidas?id=12 //Obtiene la bebidas por id
 - POST    http://localhost/Api_desarrollo_web/bebidas       //Inserta una nueva bebida 
 - PUT     http://localhost/Api_desarrollo_web/bebidas?id=12 //Actualizar datos
 - DELETE  http://localhost/Api_desarrollo_web/bebidas?id=12 //Eliminar datos
 


      // body para el post y el put
    - body: {
                        "cantidad":10,
                        "cod_categoria":1,    
                        "descripcion":" es una bebida",
                        "descuento":10,
                        "grado_acohol": 50,
                        "marca":"es una marca",
                        "nombre_bebida":"bebida", 
                        "puntuacion":10,
                        "url":"uri",
                        "volumen":10
        }  
 # Endpoint categoria

 - GET     http://localhost/Api_desarrollo_web/categorias       // Obtiene todas la bebidas
 - GET     http://localhost/Api_desarrollo_web/categorias?id=12 //Obtiene la bebidas por id
 - POST    http://localhost/Api_desarrollo_web/categorias       //Inserta una nueva bebida 
 - PUT     http://localhost/Api_desarrollo_web/categorias?id=12 //Actualizar datos
 - DELETE  http://localhost/Api_desarrollo_web/categorias?id=12 //Eliminar datos
 


      // body para el post y el put
    - body: {
                "nombre_categoria":"nombre"
    
            } 

# explicación de carpetas
  
  - CONFIG
    - Posee la conexion a la base de datos
  - REPOSITORY
    - es una clase abstracta que posee los 4 requerimientos de un CRUD 
        - Create
        - Read
        - Update
        - Delete
  - CONTROLLER
    - En esta carpera se implementa la clase abstracta, realiazando las operaciones necesarias segun sea el casos
  - CLASS
    - esta carpeta hace de puente, donde las clases correspondientes reciben los datos proporcionados, y los envia al controller, para que este haga sus respectivas operaciones
  - HELPERS
    - contiene las posibles respuestas que pueden obtenerse segun sea el tipo de solicitud
   
