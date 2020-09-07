# robot
robot test

+++++++++++++++++++++++++++++++++++++++++++++++++++ ++++++++++++++++++++++ 

Un robot vive en el punto (0, 0) en una cuadrícula infinita. Hoy se va a pasear. Su ruta consiste en una larga secuencia de tres comandos posibles: 

mover N pasos hacia adelante 
girar 90 grados hacia la izquierda 
girar 90 grados hacia la derecha 

El robot siempre comienza a caminar hacia el Norte. 

Algunas de las coordenadas de la cuadrícula son obstáculos; si el robot intentara avanzar hacia ellos, permanecerá en la coordenada de la cuadrícula anterior (pero seguirá el resto de su ruta). 

Dada la lista de obstáculos y la caminata que el robot está programado para seguir, determine la distancia máxima que el robot viajará desde su casa. 

Entrada

La primera línea del archivo de entrada contendrá dos enteros separados por espacios: el número de obstáculos y el número de comandos en la ruta del robot, respectivamente. 

Las siguientes líneas [número_de_obstáculos] contendrán dos enteros separados por espacios que representan las coordenadas X e Y de un obstáculo, respectivamente (la X positiva es este, la Y positiva es el norte). 

Las siguientes líneas [número_de_comandos] contendrán un comando para el robot, que es uno de los siguientes: 

“L”: gire a la izquierda 90 grados 
“R”: gire a la derecha 90 grados 
“M n”: muévase n pasos adelante 

Salida 

Salida un único punto flotante número redondeado a dos decimales, la distancia máxima (euclidiana) que el robot obtendrá desde su posición inicial. 

Límites: 
1 <= número de obstáculos <= 10
1 <= número de comandos <= 10,000 
1 <= número de pasos adelante en un solo comando <= 10 
-100,000 <= X o Y coordenada del obstáculo <= 100,000 

Muestra de entrada 

1 8 
0 2 
M 5 
R 
M 1 
L 
M 3 
L 
L 
M 3 

Salida de muestra 

4.12 

Descripción de muestra 

El robot intenta caminar 5 casillas hacia el norte, pero hay un obstáculo, por lo que solo puede mover una casilla. Luego gira a la derecha y camina una plaza al este. Luego gira a la izquierda y camina tres plazas hacia el norte. Luego da la vuelta y camina 3 casillas al sur, terminando en (1, 1). La distancia máxima que llegó desde (0, 0) fue cuando estaba en (1, 4), aproximadamente a 4.12 unidades de distancia.
