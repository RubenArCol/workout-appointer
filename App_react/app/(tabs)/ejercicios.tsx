import React, { useEffect, useState } from 'react';
import { View, Text, FlatList, StyleSheet } from 'react-native';

type Ejercicio = {
  id: number;
  nombre: string;
  tipo: string;
  grupo_muscular: string;
  descripcion: string;
};

export default function Ejercicios() {
  const [ejercicios, setEjercicios] = useState<Ejercicio[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch('http://192.168.18.2:8000/api/ejercicios') // esto se reemplaza por la ip local (ipv4)
      .then((res) => res.json())
      .then((data) => {
        setEjercicios(data);
        setLoading(false);
      })
      .catch((err) => {
        console.error(err);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <Text style={styles.text}>Cargando ejercicios...</Text>;
  }

  return (
    <FlatList
      data={ejercicios}
      keyExtractor={(item) => item.id.toString()}
      renderItem={({ item }) => (
        <View style={styles.card}>
          <Text style={styles.title}>{item.nombre}</Text>
          <Text>{item.descripcion}</Text>
          <Text style={styles.meta}>
            ({item.grupo_muscular} - {item.tipo})
          </Text>
        </View>
      )}
    />
  );
}

const styles = StyleSheet.create({
  text: {
    padding: 20,
    fontSize: 16,
  },
  card: {
    padding: 16,
    marginVertical: 6,
    marginHorizontal: 12,
    backgroundColor: '#f0f0f0',
    borderRadius: 10,
  },
  title: {
    fontWeight: 'bold',
    fontSize: 18,
  },
  meta: {
    marginTop: 6,
    color: 'gray',
  },
});