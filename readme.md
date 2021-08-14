# Nota
    Este API posee el CRUD para la sección de las bebidas y sus respectivas categorias

 # Endpoints

 - GET:http://localhost/Api_desarrollo_web/bebidas       // Obtiene todas la bebidas
 - GET http://localhost/Api_desarrollo_web/bebidas?id=12 //Obtiene la bebidas por id
 - POST http://localhost/Api_desarrollo_web/bebidas      //Inserta una nueva bebida 
    - body: {
                        "cantidad":10,
                        "cod_categoria":1,    
                        "descripcion":"bebida 12",
                        "descuento":10,
                        "grado_acohol": 50,
                        "marca":"marquita",
                        "nombre":"grado_acohosasa", 
                        "puntuacion":10,
                        "url":"https:google.com",
                        "volumen":10
        }    