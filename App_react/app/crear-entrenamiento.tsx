import React, { useEffect, useState } from 'react';
import { View, Text, Button, ActivityIndicator, StyleSheet, useColorScheme } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';

// Estructura de los ejercicios
type Ejercicio = {
  nombre: string;
  grupo_muscular: string;
  tipo: string;
  descripcion: string;
};

export default function CrearEntrenamientoScreen() {
  // Estado para la meta del usuario (fuerza/definición)
  const [meta, setMeta] = useState('');
  // Lista de ejercicios que mostraremos
  const [ejercicios, setEjercicios] = useState<Ejercicio[]>([]);
  // Estado para mostrar un cargador mientras carga
  const [loading, setLoading] = useState(false);
  // Saber si el móvil está en modo oscuro o claro
  const theme = useColorScheme();

  // Función que pide los ejercicios al backend
  const obtenerEntrenamiento = async () => {
    setLoading(true);
  
    try {
      // Sacamos los datos del usuario guardados (meta, email, etc.)
      const userData = await AsyncStorage.getItem('user');
      const user = JSON.parse(userData || '{}');
      const userMeta = user.meta?.toLowerCase() || 'fuerza'; // por defecto fuerza
      setMeta(userMeta);
  
      const response = await fetch(`http://192.168.18.2:8000/api/entrenamiento/${userMeta}`, {
        headers: {
          'Authorization': `Bearer ${user.token}`,  // usamos el token guardado
          'Content-Type': 'application/json',
        },
      });
  
      const data: Ejercicio[] = await response.json();
  
      // Agrupamos por grupo muscular (pecho, pierna, brazo, etc.)
      const ejerciciosPorGrupo: { [grupo: string]: Ejercicio[] } = {};
      data.forEach((ej) => {
        if (!ejerciciosPorGrupo[ej.grupo_muscular]) {
          ejerciciosPorGrupo[ej.grupo_muscular] = [];
        }
        ejerciciosPorGrupo[ej.grupo_muscular].push(ej);
      });
  
      // Para cada grupo, elegimos uno al azar
      const seleccionados = Object.values(ejerciciosPorGrupo).map((grupo) => {
        const randomIndex = Math.floor(Math.random() * grupo.length);
        return grupo[randomIndex];
      });
  
      setEjercicios(seleccionados);
    } catch (error) {
      console.error('Error al obtener el entrenamiento:', error);
    } finally {
      setLoading(false);
    }
  };

  // Cuando cargue la pantalla, pedimos el entrenamiento automáticamente
  useEffect(() => {
    obtenerEntrenamiento();
  }, []);

  const textColor = theme === 'dark' ? '#fff' : '#000'; // adapto la app al tema del teléfono

  if (loading) {
    return (
      <View style={styles.centered}>
        <ActivityIndicator size="large" />
      </View>
    );
  }

  // Si ya cargó, mostramos los ejercicios en pantalla
  return (
    <View style={[styles.container, { backgroundColor: theme === 'dark' ? '#000' : '#fff' }]}>
      <Text style={[styles.title, { color: textColor }]}>
        Entrenamiento para meta: {meta}
      </Text>
      {ejercicios.map((ej, index) => (
        <View key={index} style={styles.card}>
          <Text style={[styles.name, { color: textColor }]}>{ej.nombre}</Text>
          <Text style={{ color: textColor }}>
            {ej.grupo_muscular} - {ej.tipo}
          </Text>
          <Text style={[styles.desc, { color: theme === 'dark' ? '#ccc' : '#555' }]}>{ej.descripcion}</Text>
        </View>
      ))}
      <Button title="Generar nuevo entrenamiento" onPress={obtenerEntrenamiento} />
    </View>
  );
}

// Estilos de la pantalla
const styles = StyleSheet.create({
  container: { flex: 1, padding: 20 },
  centered: { flex: 1, justifyContent: 'center', alignItems: 'center' },
  title: { fontSize: 20, fontWeight: 'bold', marginBottom: 16 },
  card: {
    padding: 12,
    borderWidth: 1,
    borderRadius: 8,
    marginBottom: 10,
    borderColor: '#888',
  },
  name: { fontSize: 16, fontWeight: 'bold' },
  desc: { marginTop: 4 },
});
