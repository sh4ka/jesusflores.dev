---
title: 'Cómo funciona Tensorflow'
date: 2019-06-05
tags:
  - tensorflow
image: image/upload/v1559763122/blog/posts/blog_posts_cerebro_wn6ema-Sharpened_bisuqe.jpg
---

Como vimos en el [anterior artículo](https://www.jesusflores.dev/posts/introduccion-a-tensorflow/),
Tensorflow es un conjunto de funciones para agilizar el desarrollo de aplicaciones de IA. Una de las funciones más 
utilizadas es la de crear capas de neuronas, o *dense layers*.

Estas capas de neuronas siguen una estructura similar a la de una matriz de una dimensión. Se las 
denomina *dense* por que están densamente conectadas a la salida de las capa anterior, 
es decir, cada neurona recibe como entrada la salida de cada una de las neuronas anteriores.

![Neurona en Tensorflow](https://res.cloudinary.com/dervmg1zk/image/upload/v1559761517/blog/posts/neurona0.png)

## Cómo funcionan las redes neuronales de Tensorflow

En un cerebro, una neurona está conectada a muchas otras por medio de sinapsis. Cuando una 
única neurona recibe suficiente estímulo de un número determinado de 'vecinas' se produce 
su activación. Se podría decir, a grosso modo, que esto es pensar.

En Tensorflow, usamos una red de neuronas denominadas *dense*. No son 
más que matrices unidimensionales de una gran cantidad de neuronas 
conectadas entre sí. Puedes ver una explicación en profundidad en este
[artículo](https://towardsdatascience.com/build-your-first-deep-learning-classifier-using-tensorflow-dog-breed-example-964ed0689430).

### Estructura de neurona

El código para una única neurona activada mediante la función *sigmoid*, se presenta a 
continuación:

```python
from numpy import exp, array, random, dot
entrada_de_entrenamiento = array([[0, 0, 1], [1, 1, 1], [1, 0, 1], [0, 1, 1]])
salida_de_entrenamiento = array([[0, 1, 1, 0]]).T
random.seed(1)
pesos = 2 * random.random((3, 1)) - 1
for iteracion in xrange(10000):
    salida = 1 / (1 + exp(-(dot(entrada_de_entrenamiento, pesos))))
    pesos += dot(entrada_de_entrenamiento.T, (salida_de_entrenamiento - salida) * salida * (1 - salida))
print 1 / (1 + exp(-(dot(array([1, 0, 0]), pesos))))
```

[Aquí](https://drive.google.com/open?id=1rL1zFxsVWMgbgmdIx6XpamIRnFVV-kiS) tienes el 
cuaderno de Google Colab. Para saber qué es Google Colab te recomiendo que leas 
[este artículo](https://medium.com/@pau.martinez/google-colab-tips-para-principiantes-e39d6e7051d4)

Analicemos paso a paso el código:
1. Asignamos pesos aleatorios a los datos de entrada.
2. A continuación tomamos los datos de entrada y los ajustamos por su peso (método _dot_). 
Pasamos estos datos a la función que calcula la salida de la neurona (más sobre esta función
más adelante).
3. Calculamos el error teniendo en cuenta la salida de la neurona y su salida esperada.
4. Ajustamos los pesos.
5. En este caso repetimos la operación 10000 veces.

La fórmula para calcular la salida de la neurona no es más que el resultado de dos operaciones:
1. Tomamos el sumatorio de el peso por el valor de entrada.
2. Normalizamos los valores de forma que tengamos una salida entre 0 y 1.
Para ello usamos la función matemática [*Sigmoid*](https://es.wikipedia.org/wiki/Funci%C3%B3n_sigmoide).

### Fórmula para ajustar los pesos
Los pesos se ajustan para que el valor del paso 3 (valor del error) 
modifique el cálculo del siguiente paso. Es decir, que la diferencia 
entre lo que hemos errado en la predicción con respecto al peso va a ser 
tenido en cuenta en la próxima operación.

`ajuste de peso = error * entrada * función sigmoide` 

Te recomiendo también que veas el código desarrollado y comentado [en github](https://github.com/miloharper/simple-neural-network).

Este artículo esta ~~copiado~~ basado en el excelente tutorial que puedes 
leer completo [aquí](https://medium.com/technology-invention-and-more/how-to-build-a-simple-neural-network-in-9-lines-of-python-code-cc8f23647ca1)

Ahora ya estás listo o lista para afrontar el siguiente tutorial en el que
vamos a desarrollar un sistema básico de reconocimiento de imagenes.

