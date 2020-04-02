var lottieAnimation = bodymovin.loadAnimation({
  container: LottieContainer, // ID del div
  path: 'https://assets7.lottiefiles.com/packages/lf20_jAWhUR.json', // Ruta fichero .json de la animación
  renderer: 'svg', // Requerido
  loop: true, // Opcional
  autoplay: true, // Opcional
  name: "Hello World", // Opcional
  })