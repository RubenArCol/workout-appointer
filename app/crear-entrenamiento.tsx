import { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet, FlatList } from 'react-native';

export default function CrearEntrenamiento() {
  const [nombre, setNombre] = useState('');
  const [tipo, setTipo] = useState('');
  const [duracion, setDuracion] = useState('');

  const [entrenamientos, setEntrenamientos] = useState<any[]>([]); // lista local

  const guardarEntrenamiento = () => {
    if (!nombre || !tipo || !duracion) {
    alert('Por favor, completa todos los campos');
    return;
    }

    const nuevo = {
    id: Date.now(), // identificador temporal único
    nombre,
    tipo,
    duracion,
    };

    setEntrenamientos([...entrenamientos, nuevo]);

    // Limpia el formulario
    setNombre('');
    setTipo('');
    setDuracion('');
  };

    const eliminarEntrenamiento = (id: number) => {
    const nuevos = entrenamientos.filter((e) => e.id !== id);
    setEntrenamientos(nuevos);
    };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Crear nuevo entrenamiento</Text>

      <TextInput
        placeholder="Nombre del entrenamiento"
        value={nombre}
        onChangeText={setNombre}
        style={styles.input}
      />
      <TextInput
        placeholder="Tipo de entrenamiento"
        value={tipo}
        onChangeText={setTipo}
        style={styles.input}
      />
      <TextInput
        placeholder="Duración (minutos)"
        keyboardType="numeric"
        value={duracion}
        onChangeText={setDuracion}
        style={styles.input}
      />

      <Button title="Guardar entrenamiento" onPress={guardarEntrenamiento} />

      <Text style={styles.subtitle}>Entrenamientos guardados:</Text>
      <FlatList
        data={entrenamientos}
        keyExtractor={(item) => item.id.toString()}
        renderItem={({ item }) => (
            <View style={styles.card}>
              <Text style={styles.cardTitle}>{item.nombre}</Text>
              <Text>{item.tipo} - {item.duracion} min</Text>
              <Button
                title="Eliminar"
                onPress={() => eliminarEntrenamiento(item.id)}
                color="#d9534f"
              />
            </View>
          )}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 24,
    backgroundColor: '#fff',
    gap: 16,
  },
  title: {
    fontSize: 22,
    fontWeight: 'bold',
    marginBottom: 12,
  },
  input: {
    borderWidth: 1,
    borderColor: '#aaa',
    borderRadius: 8,
    padding: 12,
    fontSize: 16,
  },
  subtitle: {
    fontSize: 18,
    marginTop: 24,
    marginBottom: 8,
    fontWeight: '600',
  },
  card: {
    padding: 12,
    borderWidth: 1,
    borderColor: '#ddd',
    borderRadius: 8,
    marginBottom: 12,
    backgroundColor: '#f9f9f9',
    gap: 4,
  },
  cardTitle: {
    fontWeight: 'bold',
  },
});