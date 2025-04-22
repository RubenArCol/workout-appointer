import React from 'react';
import { View, Button, StyleSheet, Alert } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { useRouter } from 'expo-router';

export default function ProfileScreen() {
  const router = useRouter();

  const handleLogout = async () => {
    await AsyncStorage.removeItem('user');
    Alert.alert('Sesión cerrada', 'Has salido de tu cuenta.');
    router.replace('/(auth)/login');
  };

  return (
    <View style={styles.container}>
      <Button title="Cerrar sesión" onPress={handleLogout} color="#d00" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    padding: 20,
    marginTop: 50,
  },
});
