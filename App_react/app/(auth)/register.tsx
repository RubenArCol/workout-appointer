import React, { useState } from 'react';
import { View, TextInput, Button, Text, StyleSheet, Alert } from 'react-native';
import { useColorScheme } from 'react-native';

export default function RegisterScreen() {
  const [nombre, setNombre] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [meta, setMeta] = useState('');
  const theme = useColorScheme();
  

  const handleRegister = async () => {
    try {
      const response = await fetch('http://192.168.18.2:8000/api/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          nombre,
          email,
          password,
          meta,
        }),
      });

      const data = await response.json();

      if (response.ok) {
        Alert.alert('Registro completado', `¡Bienvenido, ${data.name || 'usuario'}!`);
      } else {
        // Laravel te devuelve los errores en data.errors
        if (data.errors && typeof data.errors === 'object') {
            const errores: string[] = Object.values(data.errors).flatMap((e) => e as string[]);
            Alert.alert('❌ Registro inválido', errores[0]);
        } else {
          Alert.alert('❌ Error', data.message || 'No se pudo registrar');
        }
      }
    } catch (error) {
      console.error(error);
      Alert.alert('Error de red', 'No se pudo conectar con el servidor');
    }
  };

  return (
    <View style={styles.container}>
      <TextInput
        placeholder="Nombre"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setNombre}
      />
      <TextInput
        placeholder="Email"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setEmail}
      />
      <TextInput
        placeholder="Contraseña"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        secureTextEntry
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setPassword}
      />
      <TextInput
        placeholder="Meta (fuerza o definicion)"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: theme === 'dark' ? '#fff' : '#000', backgroundColor: theme === 'dark' ? '#1c1c1e' : '#fff' }]}
        onChangeText={setMeta}
      />
      <Button title="Registrarse" onPress={handleRegister} />
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
