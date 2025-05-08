import React, { useState } from 'react';
import { View, TextInput, Button, Alert, StyleSheet, Text, useColorScheme } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { Picker } from '@react-native-picker/picker';

export default function CreateExerciseScreen() {
  const [nombre, setNombre] = useState('');
  const [grupoMuscular, setGrupoMuscular] = useState('pecho');
  const [tipo, setTipo] = useState('fuerza');
  const [descripcion, setDescripcion] = useState('');
  const theme = useColorScheme();

  const handleSubmit = async () => {
    const userData = await AsyncStorage.getItem('user');
    const user = JSON.parse(userData || '{}');
    const token = await AsyncStorage.getItem('token');
  
    try {
      const response = await fetch('http://192.168.18.2:8000/api/admin/exercises', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${token}`,
        },
        body: JSON.stringify({ nombre, grupo_muscular: grupoMuscular, tipo, descripcion }),
      });
  
      const textData = await response.text();
      let data;
      try {
        data = JSON.parse(textData);
      } catch (e) {
        console.error('Respuesta no es JSON:', textData);
        Alert.alert('Error', 'Respuesta inesperada del servidor');
        return;
      }
  
      if (response.ok) {
        Alert.alert('Éxito', 'Ejercicio creado correctamente');
        setNombre('');
        setGrupoMuscular('pecho');
        setTipo('fuerza');
        setDescripcion('');
      } else {
        Alert.alert('Error', data.message || 'No se pudo crear el ejercicio');
      }
    } catch (error) {
      console.error(error);
      Alert.alert('Error', 'No se pudo conectar con el servidor');
    }
  };
  
  

  const textColor = theme === 'dark' ? '#fff' : '#000';
  const backgroundColor = theme === 'dark' ? '#000' : '#fff';
  const borderColor = theme === 'dark' ? '#555' : '#aaa';

  return (
    <View style={[styles.container, { backgroundColor }]}>
      <Text style={[styles.label, { color: textColor }]}>Nombre</Text>
      <TextInput
        placeholder="Nombre"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: textColor, borderColor }]}
        value={nombre}
        onChangeText={setNombre}
      />

    <Text style={[styles.label, { color: textColor }]}>Grupo muscular</Text>
    <Picker
        selectedValue={grupoMuscular}
        style={[styles.picker, { color: textColor }]}
        dropdownIconColor={textColor}
        onValueChange={(itemValue: string) => setGrupoMuscular(itemValue)}
        >
        <Picker.Item label="Pecho" value="pecho" />
        <Picker.Item label="Espalda" value="espalda" />
        <Picker.Item label="Piernas" value="piernas" />
        <Picker.Item label="Hombro" value="hombro" />
        <Picker.Item label="Brazos" value="brazos" />
    </Picker>

    <Text style={[styles.label, { color: textColor }]}>Tipo de ejercicio</Text>
    <Picker
        selectedValue={tipo}
        style={[styles.picker, { color: textColor }]}
        dropdownIconColor={textColor}
        onValueChange={(itemValue: string) => setTipo(itemValue)}
        >
        <Picker.Item label="Fuerza" value="fuerza" />
        <Picker.Item label="Definición" value="definicion" />
    </Picker>

      <Text style={[styles.label, { color: textColor }]}>Descripción</Text>
      <TextInput
        placeholder="Descripción"
        placeholderTextColor={theme === 'dark' ? '#aaa' : '#666'}
        style={[styles.input, { color: textColor, borderColor }]}
        value={descripcion}
        onChangeText={setDescripcion}
      />

      <Button title="Crear ejercicio" onPress={handleSubmit} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { padding: 20, flex: 1 },
  label: { marginBottom: 4, fontWeight: 'bold' },
  input: {
    borderWidth: 1,
    padding: 10,
    borderRadius: 8,
    marginBottom: 16,
  },
  picker: {
    marginBottom: 16,
    height: 50,
  },
});
