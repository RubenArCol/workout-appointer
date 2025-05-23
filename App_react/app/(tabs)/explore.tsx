import { StyleSheet } from 'react-native';
import { Collapsible } from '@/components/Collapsible';
import ParallaxScrollView from '@/components/ParallaxScrollView';
import { ThemedText } from '@/components/ThemedText';
import { ThemedView } from '@/components/ThemedView';
import { IconSymbol } from '@/components/ui/IconSymbol';
import { Image, View } from 'react-native';

const preguntasFrecuentes = [
  {
    pregunta: '¿Cómo creo un entrenamiento?',
    respuesta: 'Pulsa el botón de crear entrenamiento y se generará uno automáticamente',
  },
  {
    pregunta: '¿Qué significa la meta "definición"?',
    respuesta: 'Es una rutina enfocada en reducir grasa y tonificar músculos.',
  },
  {
    pregunta: '¿Qué significa la meta "fuerza"?',
    respuesta: 'Es una rutina enfocada en conseguir masa.',
  },
  {
    pregunta: '¿Puedo cambiar mi contraseña?',
    respuesta: 'Actualmente la función no está implementada',
  },
];

export default function PreguntasFrecuentesScreen() {
  return (
    <ParallaxScrollView
      headerBackgroundColor={{ light: '#D0D0D0', dark: '#353636' }}
      headerImage={
        <View style={styles.headerContainer}>
          <Image
            source={require('@/assets/images/gym-bg.jpg')}
            style={styles.headerImageBackground}
            resizeMode="cover"
          />
          <Image
            source={require('@/assets/images/logo.png')}
            style={styles.headerLogo}
            resizeMode="contain"
          />
        </View>
      }>
      <ThemedView style={styles.titleContainer}>
        <ThemedText type="title">Preguntas Frecuentes</ThemedText>
      </ThemedView>

      {preguntasFrecuentes.map((faq, index) => (
        <Collapsible key={index} title={faq.pregunta}>
          <ThemedText>{faq.respuesta}</ThemedText>
        </Collapsible>
      ))}
    </ParallaxScrollView>
  );
}

const styles = StyleSheet.create({
  headerImage: {
    color: '#808080',
    bottom: -90,
    left: -35,
    position: 'absolute',
  },
  headerContainer: {
    position: 'relative',
    width: '100%',
    height: 250,
  },
  headerImageBackground: {
    position: 'absolute',
    width: '100%',
    height: '100%',
  },
  headerLogo: {
    width: 120,
    height: 120,
    alignSelf: 'center',
    marginTop: 60,
    opacity: 0.9,
  },
  titleContainer: {
    flexDirection: 'row',
    gap: 8,
  },
});
