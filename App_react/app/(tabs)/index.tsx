import { useEffect, useState } from 'react';
import { Image, StyleSheet, Button } from 'react-native';
import { useRouter } from 'expo-router';
import ParallaxScrollView from '@/components/ParallaxScrollView';
import { ThemedText } from '@/components/ThemedText';
import { ThemedView } from '@/components/ThemedView';
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function HomeScreen() {
  const router = useRouter();
  const [isAdmin, setIsAdmin] = useState(false);

  useEffect(() => {
    const checkRole = async () => {
      const userData = await AsyncStorage.getItem('user');
      const user = JSON.parse(userData || '{}');
      if (user.roles && user.roles.includes('admin')) {
        setIsAdmin(true);
      }
    };

    checkRole();
  }, []);

  return (
    <ParallaxScrollView
      headerBackgroundColor={{ light: '#A1CEDC', dark: '#1D3D47' }}
      headerImage={
        <Image
          source={require('@/assets/images/partial-react-logo.png')}
          style={styles.reactLogo}
        />
      }>
      
      <ThemedView style={styles.stepContainer}>
        <ThemedText type="subtitle">¿Listo para empezar?</ThemedText>
        <Button title="Crear entrenamiento" onPress={() => router.push('/crear-entrenamiento')} />
      </ThemedView>

      {isAdmin && (
        <ThemedView style={styles.stepContainer}>
          <ThemedText type="subtitle">Panel de administrador</ThemedText>
          <Button title="Añadir ejercicio" onPress={() => router.push('/crear-ejercicio')} />
        </ThemedView>
      )}
    </ParallaxScrollView>
  );
}

const styles = StyleSheet.create({
  stepContainer: { gap: 8, marginBottom: 8 },
  reactLogo: { height: 178, width: 290, bottom: 0, left: 0, position: 'absolute' },
});
