# Nota
    Este API posee el CRUD para la sección de las bebidas y sus respectivas categorias

 # Endpoints

 - GET:http://localhost/Api_desarrollo_web/bebidas       // Obtiene todas la bebidas
 - GET http://localhost/Api_desarrollo_web/bebidas?id=12 //Obtiene la bebidas por id
 - POST http://localhost/Api_desarrollo_web/bebidas      //Inserta una nueva bebida 
 - PUT http://localhost/Api_desarrollo_web/bebidas?id=12
 


      // body para el post y el put
    - body: {
                        "cantidad":10,
                        "cod_categoria":1,    
                        "descripcion":"bebida ssss111",
                        "descuento":10,
                        "grado_acohol": 50,
                        "marca":"marquitaaaaaaa",
                        "nombre_bebida":"sgse", 
                        "puntuacion":10,
                        "url":"https:google.com",
                        "volumen":10
        }  