import React, { useState } from 'react';
import { View, TextInput, Button, StyleSheet, Alert } from 'react-native';
import { Tabs, useRouter } from 'expo-router';
import { useColorScheme } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function LoginScreen() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const theme = useColorScheme();
  const router = useRouter();

  const handleLogin = async () => {
    console.log('Intentando iniciar sesión...');
  
    try {
      const response = await fetch('http://192.168.18.183:8000/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, password }),
      });

      console.log('STATUS:', response.status);
  
      const data = await response.json();
      console.log('📦 DATA:', data);
  
      if (response.ok) {
        await AsyncStorage.setItem('user', JSON.stringify(data));
        await AsyncStorage.setItem('token', data.token);
        router.replace('/(tabs)');

      } else {
        // si no culillo de mono
        const errores: string[] = Object.values(data.errors || {}).flatMap((e) => e as string[]);
        Alert.alert('Login incorrecto', errores[0] || data.message || 'Credenciales inválidas');
      }
    } catch (error) {
      console.error('Error de red:', error);
      Alert.alert('Error de red', 'No se pudo conectar con el servidor');
    }
  };
  

  return (
    <View style={styles.container}>
      <TextInput
        placeholder="Email"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setEmail}
      />
      <TextInput
        placeholder="Contraseña"
        secureTextEntry
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setPassword}
      />
      <Button title="Iniciar sesión" onPress={handleLogin} />
      <Button
        title="¿No tienes cuenta? Regístrate"
        onPress={() => router.push('/(auth)/register')}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    padding: 20,
    gap: 10,
  },
  input: {
    borderWidth: 1,
    borderColor: '#aaa',
    padding: 10,
    borderRadius: 8,
  },
});
