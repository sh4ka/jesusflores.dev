---
title: 'Cómo funciona Tensorflow'
date: 2019-06-05
tags:
  - tensorflow
image: https://res.cloudinary.com/dervmg1zk/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1559762194/blog/posts/cerebro_wn6ema.jpg
---
## Cómo funciona Tensorflow

Tensorflow es un conjunto de funciones para agilizar el desarrollo de aplicaciones de IA. Una de las funciones más 
utilizadas es la de crear capas de neuronas, o *dense layers*.

Éstas capas de neuronas siguen una estructura similar a la de una matriz de una dimensión. Se las 
denomina *dense* por que están densamente conectadas a la salida de las capa anterior, 
es decir, cada neurona recibe como entrada la salida de cada una de las neuronas anteriores.

![Neurona](https://res.cloudinary.com/dervmg1zk/image/upload/v1559761517/blog/posts/neurona0.png)

### Ejemplo de neurona

En un cerebro, una neurona está conectada a muchas otras por medio de sinapsis. Cuándo una 
única neurona recibe suficiente estímulo de un número determinado de 'vecinas' se produce 
su activación. Se podría decir, a grosso modo, que ésto es pensar.

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
[éste artículo](https://medium.com/@pau.martinez/google-colab-tips-para-principiantes-e39d6e7051d4)


