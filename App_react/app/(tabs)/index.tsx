import { useEffect, useState } from 'react';
import { Image, StyleSheet, Button } from 'react-native';
import { useRouter } from 'expo-router';
import ParallaxScrollView from '@/components/ParallaxScrollView';
import { ThemedText } from '@/components/ThemedText';
import { ThemedView } from '@/components/ThemedView';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { View } from 'react-native';

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
        <View style={styles.headerImageWrapper}>
          <Image
            source={require('@/assets/images/gym-bg.jpg')}
            style={styles.headerBackground}
            resizeMode="cover"
          />
          <Image
            source={require('@/assets/images/logo.png')}
            style={styles.headerLogo}
            resizeMode="contain"
          />
        </View>
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
  headerImageWrapper: {
    width: '100%',
    height: 250,
    position: 'relative',
  },
  headerBackground: {
    width: '100%',
    height: '100%',
    position: 'absolute',
    borderBottomLeftRadius: 20,
    borderBottomRightRadius: 20,
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
  stepContainer: {
    gap: 8,
    marginBottom: 8,
  },
});
