from numpy import exp, array, random, dot
entrada_de_entrenamiento = array([[0, 0, 1], [1, 1, 1], [1, 0, 1], [0, 1, 1]])
salida_de_entrenamiento = array([[0, 1, 1, 0]]).T
random.seed(1)
pesos = 2 * random.random((3, 1)) - 1
for iteracion in xrange(10000):
    salida = 1 / (1 + exp(-(dot(entrada_de_entrenamiento, pesos))))
    pesos += dot(entrada_de_entrenamiento.T, (salida_de_entrenamiento - salida) * salida * (1 - salida))
print(1 / (1 + exp(-(dot(array([1, 0, 0]), pesos)))))